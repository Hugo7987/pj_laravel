<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Migration
 * 
 * @property int $id
 * @property string $migration
 * @property int $batch
 *
 * @package App\Models\Base
 */
class Migration extends Model
{
	protected $table = 'mcd_migrations';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'batch' => 'int'
	];
}
