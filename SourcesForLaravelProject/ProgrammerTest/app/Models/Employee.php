<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['Firstname', 'LastName', 'Email', 'Phone','Company'];
    public function Company()
    {
        return $this->belongsTo(Company::class,'CompanyID');
    }
    
    
}
