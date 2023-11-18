<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['id','o_fullname','o_email','o_phone','o_address','o_note','o_user_id','o_payment_id','o_coupon','o_status','o_total'];

}
