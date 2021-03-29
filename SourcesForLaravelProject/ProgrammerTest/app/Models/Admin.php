<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Notifiable;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['Email', 'Pass'];
    

    protected $table = 'admins';
    protected $guarded = array();
}
