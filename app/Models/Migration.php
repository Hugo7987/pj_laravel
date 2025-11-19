<?php

namespace App\Models;

use App\Models\Base\Migration as BaseMigration;

class Migration extends BaseMigration
{
	protected $fillable = [
		'id',
		'migration',
		'batch'
	];
}
