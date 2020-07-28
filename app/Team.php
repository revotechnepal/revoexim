<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = ['name', 'post', 'details', 'facebook', 'twitter', 'instagram', 'linkedin', 'image', 'status'];
}
