<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

  /**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = ['name','description'];

	/**
	 * [$hidden description]
	 * @var [type]
	 */
	protected $hidden = ['created_at'];

  /**
	 * Mutator -> Primera letra de cada palabra en mayusculas
	 */
	public function setNameAttribute($value) {

    $this->attributes['name'] = ucfirst(strtolower($value));
  }
}
