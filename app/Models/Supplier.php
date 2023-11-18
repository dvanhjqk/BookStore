<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    use HasFactory;
    protected $table = "supplier";
    protected $fillable = ['id','sup_name','sup_email','sup_address','sup_phone'];
}
