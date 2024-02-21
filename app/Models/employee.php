<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $primaryKey='employee_id';

    protected $table='employees';

    public $timestamps=true;

    protected $fillable=[
        'first_name','last_name','employee_email','employee_status','image','company_id','phone','created_at','updated_at'
    ];
}
