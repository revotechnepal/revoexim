<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'site_name',    'site_logo',    'site_favicon',     'email',    'phone',
        'facebook',     'twitter',      'linkedin',         'instagram',    'youtube',
        'about', 'service', 'address'
    ];
}
