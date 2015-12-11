<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'music';



    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['name', 'last', 'user', 'email', 'password','userlevel', 'remember_token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

}
