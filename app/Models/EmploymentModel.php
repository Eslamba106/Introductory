<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentModel extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'application_code' , "verify_code"  ,'phone' , 'job_code', 'email', 'attachments' , 'email_verified_at']; 
}
