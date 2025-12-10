<?php

namespace App\Models;

use App\Models\Base\Categorie as BaseCategorie;
use Illuminate\Support\Facades\DB; // ajouté


class Categorie extends BaseCategorie
{
	protected $fillable = [
		'id',
		'code',
		'nom',
		'commentaire',
		'id_concours'
	];

	public static function aff_categorie($idConcours){
		return DB::select('select id, nom, code, commentaire from mcd_categories 
					where id_concours = :idconcours',['idconcours' => $idConcours]);
	}
}
