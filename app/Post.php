<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use softDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [

        'title',
        'body'
    ];

    public function user(){ // one to one
        return $this->belongsTo('App\User');
    }
}
