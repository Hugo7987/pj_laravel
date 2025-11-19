<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property int $id
 * @property string $queue
 * @property string $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property int $created_at
 *
 * @package App\Models\Base
 */
class Job extends Model
{
	protected $table = 'mcd_jobs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'attempts' => 'int',
		'reserved_at' => 'int',
		'available_at' => 'int'
	];
}
