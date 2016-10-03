<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

	public function users()
	{	
		return $this->belongsTo('App\User','user','id');
	}

}
