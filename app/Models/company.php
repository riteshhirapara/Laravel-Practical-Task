<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $primaryKey='company_id';

    protected $table='companies';

    public $timestamps=true;

    protected $fillable= [
        'company_name','company_email','company_status','company_website','created_at','updated_at'
    ];
}
