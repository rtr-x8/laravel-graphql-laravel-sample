<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTaxonomy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'taxonommy_id',
    ];
}
