<?php

namespace App\Models;

use App\Models\Base\Epreuve as BaseEpreuve;
use Illuminate\Support\Facades\DB;


class Epreuve extends BaseEpreuve
{
	protected $fillable = [
		'code',
		'nom',
		'score_max',
		'coefficient',
		'commentaire',
		'id_concours',
		'id_categorie'
	];

	public static function aff_epreuve($idConcours){
		return DB::select('select ep.id, ep.nom, ep.code, cat.nom as categorie, ep.coefficient, ep.score_max, ep.commentaire from mcd_epreuves ep
							join mcd_categories cat on ep.id_categorie = cat.id
							where ep.id_concours = :idconcours',['idconcours' => $idConcours]);
	}
}
