<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CacheLock
 * 
 * @property string $key
 * @property string $owner
 * @property int $expiration
 *
 * @package App\Models\Base
 */
class CacheLock extends Model
{
	protected $table = 'mcd_cache_locks';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'expiration' => 'int'
	];
}
