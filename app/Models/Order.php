<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Order extends Model
{
    public const STATUS_FAILED = "failed";
    public const STATUS_PAID = "paid";
    public const STATUS_READY = "ready";

    protected $fillable = [
        'invoice_id',
        'video_id',
        'video_status',
        'url_540p_mp4',
        'url_1080p_mp4',
        'pay_status'
    ];

    public function scopeVideo(Builder $query, $videoId): void
    {
        $query->where('video_id', $videoId);
    }

    public function referring_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referral_code','referral_code');
    }
}
