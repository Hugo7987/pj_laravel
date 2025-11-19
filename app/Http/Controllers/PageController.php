<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Models\Epreuve;

class PageController extends Controller
{
    // Accueil
    public function home() {
        return view('accueil');
    }

    // Gestion Concours - affichage épreuves et catégories
    public function tab_epreuveCategorie($id) {
        $epreuves = Epreuve::aff_epreuve($id);
        $categories = Categorie::aff_categorie($id);

        return view('modification_concours', compact('epreuves', 'categories'));
    }

    public function concours() {
        $concours = DB::table('concours')->get();
        return view('gestion_concours', compact('concours'));
    }

    // Création épreuve
    public function crea_epreuve() {
        $categories = Categorie::all();
        $concours = DB::table('concours')->select('id','nom')->first();

        return view('form_epreuve', compact('categories', 'concours'));
    }

    // Modification épreuve
    public function modif_epreuve($id) {
        $epreuve = DB::table('epreuves')->where('id', $id)->first();
        $concours = DB::table('concours')->select('id','nom')->first();
        $categories = Categorie::all();

        return view('modif_epreuve', compact('epreuve', 'categories', 'concours'));
    }

    // Ajout épreuve
    public function store(Request $request) {
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

    // Mise à jour épreuve
    public function majEpreuve(Request $request, $id) {
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

    // Suppression épreuve
    public function supp_epreuve($id) {
        $epreuve = DB::table('epreuves')->where('id', $id)->first();

        DB::table('epreuves')->where('id', $id)->delete();
        return redirect()->route('modification_concours', ['id' => $epreuve->id_concours])
                         ->with('success', 'Épreuve supprimée.');
        }
    

    // ---------- CATEGORIES ----------

    // Création catégorie
    public function crea_categorie() {
        return view('form_categorie');
    }

    // Ajout catégorie
    public function storeCategorie(Request $request) {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'commentaire' => 'nullable|string',
        ]);

        DB::table('categories')->insert([
            'nom' => $data['nom'],
            'code' => $data['code'],
            'commentaire' => $data['commentaire'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('modification_concours', ['id' => 1])->with('success', 'Catégorie ajoutée.');
    }

    // Modification catégorie
    public function modif_categorie($id) {
        $categorie = DB::table('categories')->where('id', $id)->first();
        return view('modif_categorie', compact('categorie'));
    }

    // Mise à jour catégorie
    public function majCategorie(Request $request, $id) {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'commentaire' => 'nullable|string',
        ]);

        DB::table('categories')
            ->where('id', $id)
            ->update([
                'nom' => $data['nom'],
                'code' => $data['code'],
                'commentaire' => $data['commentaire'] ?? null,
                'updated_at' => now(),
            ]);

        return redirect()->route('modification_concours', ['id' => 1])->with('success', 'Catégorie modifiée.');
    }

    // Suppression catégorie
    public function supp_categorie($id) {
        $categorie = DB::table('categories')->where('id', $id)->first();

        if ($categorie) {
            DB::table('categories')->where('id', $id)->delete();
            return redirect()->route('modification_concours', ['id' => 1])->with('success', 'Catégorie supprimée.');
        }

        return redirect()->back()->with('error', 'Catégorie non trouvée.');
    }
}
