<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
	//
	protected $fillable =[
		'name',
		'job title',
		'skills'
	];

	protected $casts = [
		'skills' => 'array',
	];

	public function projects()
	{
		return $this->hasMany(Project::class);
	}

}
