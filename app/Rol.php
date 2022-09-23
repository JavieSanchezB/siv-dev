<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

	protected $table = 'for_roles';

	protected $fillable = ['rol'];

	protected $guarded = ['id'];

	public $timestamps = false;


 public function users()
    {
        return $this->hasMany('App\User','for_roles_id');
    }


}
