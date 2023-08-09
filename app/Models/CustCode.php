<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustCode extends Model
{
    use HasFactory;
    protected $table = 'cust_codes'; 
    protected $guarded = [];
}