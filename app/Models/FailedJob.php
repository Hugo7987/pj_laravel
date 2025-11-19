<?php

namespace App\Models;

use App\Models\Base\FailedJob as BaseFailedJob;

class FailedJob extends BaseFailedJob
{
	protected $fillable = [
		'id',
		'uuid',
		'connection',
		'queue',
		'payload',
		'exception',
		'failed_at'
	];
}
