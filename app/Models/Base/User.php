<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Utilisateur;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Utilisateur|null $utilisateur
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'mcd_users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	public function utilisateur()
	{
		return $this->hasOne(Utilisateur::class, 'id');
	}
}
