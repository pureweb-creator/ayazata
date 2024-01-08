<x-layout>
    <x-slot:title>Pay</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-center">
                @if (@session('error'))
                    <div class="alert alert-danger mt-4">
                        {{session('error')}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-slot:customjs>
        @if (!@session('error'))
            <script src="{{$paymentObject->jsLibUrl}}"></script>
            <script>
                halyk.pay({!! $paymentObject->fields !!});
            </script>
        @endif;
    </x-slot:customjs>
</x-layout>
