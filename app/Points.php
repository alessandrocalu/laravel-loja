<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'points';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'motivo', 'pontos'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
