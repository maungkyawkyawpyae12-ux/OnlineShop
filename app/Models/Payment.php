<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\Hasfactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     use Hasfactory;
    use softDeletes;
    protected $table='payments';
    protected $fillable=[
        
        'name',
        'logo',
        
    ];
}
