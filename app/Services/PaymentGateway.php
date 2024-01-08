<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;
use App\Exceptions\FailedCurlException;
use App\Exceptions\FailedPaymentException;
use App\Exceptions\SuccessfulPaymentException;
use App\Exceptions\PendingPaymentException;

class PaymentGateway implements PaymentGatewayInterface
{
    public function __construct(
        protected array $credentials
    ){}

    /**
     * @throws FailedCurlException
     */
    public function createPayment($invoiceId, $amount, $currency="KZT"): object
    {
        $terminalId = $this->credentials['terminal_id'];
        $jsLibUrl = $this->credentials['js_lib_url'];

        $fields = [
            'invoiceID'=>$invoiceId,
            'amount'=>$amount,
            'currency'=>$currency,
            'postLink'=>route('payment.check')
        ];

        return (object) [
            'jsLibUrl' => $jsLibUrl,
            'fields' => json_encode([
                'invoiceId'=>$invoiceId,
                'amount'=>$amount,
                'currency'=>$currency,
                'postLink'=>route('payment.check'),
                'backLink'=>route('payment.check'),
                'failureBackLink'=>route('payment.check'),
                'language'=>'rus',
                'description'=>'Pay for videodedmoroz video',
                'accountId'=>'1',
                'terminal'=>$terminalId,
                'auth'=>$this->getToken($fields),
                'cardSave'=>true
            ])
        ];
    }

    /**
     * @throws FailedCurlException
     */
    public function getToken($additionalParams=[])
    {
        $data = array_merge([
            'grant_type'=>'client_credentials',
            'scope'=>'webapi usermanagement email_send verification statement statistics payment',
            'client_id'=>$this->credentials['client_id'],
            'client_secret'=>$this->credentials['client_secret'],
            'terminal'=>$this->credentials['terminal_id']
        ], $additionalParams);

        $ch = curl_init($this->credentials['token_url']);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_POST=>true,
            CURLOPT_POSTFIELDS=>$data
        ]);

        $result = json_decode(curl_exec($ch));

        if (curl_errno($ch))
            throw new FailedCurlException(curl_error($ch));

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE!=200))
            throw new FailedCurlException(__("messages.curl.failed"));

        return $result;
    }

    /**
     * @throws FailedCurlException
     */
    public function getOrderStatus($invoiceId)
    {
        $token = $this->getToken();

        $ch = curl_init($this->credentials['status_url'].'/'.$invoiceId);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer '.$token->access_token
            ]
        ]);

        $result = json_decode(curl_exec($ch));

        if (curl_errno($ch))
            throw new FailedCurlException(curl_error($ch));

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE!=200))
            throw new FailedCurlException(__("messages.curl.failed"));

        return $result;
    }

    /**
     * @throws SuccessfulPaymentException
     * @throws FailedPaymentException|FailedCurlException|PendingPaymentException
     */
    public function handlePaymentResponse($invoiceId): bool
    {
        $result = $this->getOrderStatus($invoiceId);

        if ($result->resultCode == 100)
            throw new SuccessfulPaymentException();

        if ($result->resultCode == 107)
            throw new PendingPaymentException(__('messages.payment.pending'));

       throw new FailedPaymentException(__("messages.payment.failed"));
    }
}
