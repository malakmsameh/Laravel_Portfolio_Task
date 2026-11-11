<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
		'developer_id',
    'title',
    'description',
	'status',
];


	public function developer()
	{
		return $this->belongsTo(Developer::class);
	}
}
