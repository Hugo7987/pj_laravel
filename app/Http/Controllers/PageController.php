<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Models\Epreuve;

class PageController extends Controller
{
    public function home(){
        return view('accueil');
    }

    public function tab_epreuveCategorie($id){
        $epreuves = Epreuve::aff_epreuve($id);
        $categories = Categorie::aff_categorie($id);
        return view('modification_concours', compact('epreuves', 'categories'));
    }

    public function crea_epreuve(){
        $categories = Categorie::all();
        $concours = DB::table('concours')->select('id','nom')->first();
        return view('form_epreuve', compact('categories', 'concours'));
    }

    public function modif_epreuve($id){
        $epreuve = DB::table('epreuves')->where('id', $id)->first();
        $concours = DB::table('concours')->select('id','nom')->first();
        $categories = Categorie::all();
        return view('modif_epreuve', compact('epreuve', 'categories', 'concours'));
    }

    public function concours(){
        $concours = DB::table('concours')->select('id','nom')->first();
        return view('gestion_concours', compact('concours'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'nom_epreuve' => 'required|string|max:255',
            'code_epreuve' => 'required|string|max:50',
            'coefficient' => 'nullable|numeric',
            'score_max' => 'nullable|numeric',
            'commentaire' => 'nullable|string',
            'id_concours' => 'required|integer',
            'id_categorie' => 'required|integer',
        ]);

        DB::table('epreuves')->insert([
            'nom' => $data['nom_epreuve'],
            'code' => $data['code_epreuve'],
            'coefficient' => $data['coefficient'] ?? null,
            'score_max' => $data['score_max'] ?? null,
            'commentaire' => $data['commentaire'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
            'id_concours' => $data['id_concours'],
            'id_categorie' => $data['id_categorie'],
        ]);

        return redirect()->route('modification_concours', ['id' => $data['id_concours']])->with('success', 'Épreuve ajoutée.');
    }

    public function majEpreuve(Request $request, $id){
        $data = $request->validate([
            'nom_epreuve' => 'required|string|max:255',
            'code_epreuve' => 'required|string|max:50',
            'coefficient' => 'nullable|numeric',
            'score_max' => 'nullable|numeric',
            'commentaire' => 'nullable|string',
            'id_concours' => 'required|integer',
            'id_categorie' => 'required|integer',
        ]);

        DB::table('epreuves')
            ->where('id', $id)
            ->update([
                'nom' => $data['nom_epreuve'],
                'code' => $data['code_epreuve'],
                'coefficient' => $data['coefficient'] ?? null,
                'score_max' => $data['score_max'] ?? null,
                'commentaire' => $data['commentaire'] ?? null,
                'id_concours' => $data['id_concours'],
                'id_categorie' => $data['id_categorie'],
                'updated_at' => now(),
            ]);

        return redirect()->route('modification_concours', ['id' => $data['id_concours']])->with('success', 'Épreuve modifiée.');
    }

    public function supp_epreuve($id){
        $epreuve = DB::table('epreuves')->where('id', $id)->first();
        DB::table('epreuves')->where('id', $id)->delete();
        return redirect()->route('modification_concours', ['id' => $epreuve->id_concours])
            ->with('success', 'Épreuve supprimée.');
        return redirect()->back()->with('error', 'Épreuve non trouvée.');
    }




    //Faire pareil pour les catégories




    public function crea_categorie(){
        //$categories = Categorie::all();
        $concours = DB::table('concours')->select('id','nom')->first();
        return view('form_categorie', compact('concours'));
    }

    public function modif_categorie($id){
        $categories = DB::table('categories')->where('id', $id)->first();
        $concours = DB::table('concours')->select('id','nom')->first();
        return view('modif_categorie', compact('categories', 'concours'));
    }

    public function storeCategorie(Request $request){
        $data = $request->validate([
            'nom_categorie' => 'required|string|max:255',
            'code_categorie' => 'required|string|max:50',
            'commentaire' => 'nullable|string',
            'id_concours' => 'required|integer',
            //'id_categorie' => 'required|integer',
        ]);

        DB::table('categories')->insert([
            'nom' => $data['nom_categorie'],
            'code' => $data['code_categorie'],
            'commentaire' => $data['commentaire'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
            'id_concours' => $data['id_concours'],
            //'id_categorie' => $data['id_categorie'],
        ]);

        return redirect()->route('modification_concours', ['id' => $data['id_concours']])->with('success', 'Catégorie ajoutée.');
    }

    public function majCategorie(Request $request, $id){
        $data = $request->validate([
            'nom_categorie' => 'required|string|max:255',
            'code_categorie' => 'required|string|max:50',
            'commentaire' => 'nullable|string',
            'updated_at' => now(),
            'id_concours' => 'required|integer',
            //'id_categorie' => 'required|integer',
        ]);

        DB::table('categories')
            ->where('id', $id)
            ->update([
                'nom' => $data['nom_categorie'],
                'code' => $data['code_categorie'],
                'commentaire' => $data['commentaire'] ?? null,
                'id_concours' => $data['id_concours'],
                //'id_categorie' => $data['id_categorie'],
                'updated_at' => now(),
            ]);

        return redirect()->route('modification_concours', ['id' => $data['id_concours']])->with('success', 'Catégorie modifiée.');
    }

    public function supp_categorie($id){
        $categories = DB::table('categories')->where('id', $id)->first();
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('modification_concours', ['id' => $categories->id_concours])
            ->with('success', 'Categorie supprimée.');
    }

}

?>
