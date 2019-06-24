<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable  = ['user_id', 'master_username', 'date_created', 'date_updated'];
}