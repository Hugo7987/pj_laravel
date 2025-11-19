<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Livewire\Volt\Volt;

// Accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Collèges
Route::get('/colleges/eleves', [PageController::class, 'eleves'])->name('colleges.eleves');
Route::get('/colleges/equipe', [PageController::class, 'equipe'])->name('colleges.equipe');

// Épreuves
Route::get('/epreuves', [PageController::class, 'epreuves'])->name('epreuves.index');

// Classement
Route::get('/classement', [PageController::class, 'classement'])->name('classement.index');

// Édition
Route::get('/edition/2024', [PageController::class, 'show2024'])->name('edition.2024');
Route::get('/edition/2025', [PageController::class, 'show2025'])->name('edition.2025');

// Saisie Note
Route::get('/saisie-note', [PageController::class, 'saisie-note'])->name('saisieNote.index');

// Page Gestion
Route::prefix('gestion')->group(function () {
    Route::get('/epreuves', [PageController::class, 'epreuves'])->name('gestion.epreuves');
    Route::get('/colleges', [PageController::class, 'colleges'])->name('gestion.colleges');
    Route::get('/abonnement', [PageController::class, 'abonnement'])->name('gestion.abonnement');
    Route::get('/role', [PageController::class, 'role'])->name('gestion.role');
    Route::get('/edition', [PageController::class, 'edition'])->name('gestion.edition');
    Route::get('/exportation', [PageController::class, 'exportation'])->name('gestion.exportation');
    Route::get('/modification', [PageController::class, 'modification'])->name('gestion.modification');
});

// Page Admin
Route::prefix('admin')->group(function () {
    Route::get('/genre', [PageController::class, 'genre'])->name('admin.genre');
    Route::get('/pays', [PageController::class, 'pays'])->name('admin.pays');
    Route::get('/utilisateurs', [PageController::class, 'utilisateurs'])->name('admin.utilisateurs');
});

// Connexion
Volt::route('login', 'pages.auth.login')->name('login');
Volt::route('register', 'pages.auth.register')->name('register');
Volt::route('logout', 'pages.auth.logout')->name('logout');

Route::resource('users', UserController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Gestion Concours
Route::get('gestion_concours', [PageController::class, 'concours'])->name('gestion_concours');
Route::get('modification_concours/{id}', [PageController::class, 'tab_epreuveCategorie'])->name('modification_concours');

// Épreuves
Route::get('form_epreuve', [PageController::class, 'crea_epreuve'])->name('form_epreuve');
Route::post('form_epreuve', [PageController::class, 'store'])->name('form_epreuve.store');
Route::get('modif_epreuve/{id}', [PageController::class, 'modif_epreuve'])->name('modif_epreuve');
Route::put('form_epreuve/{id}', [PageController::class, 'majEpreuve'])->name('majEpreuve');
Route::get('supp_epreuve/{id}', [PageController::class, 'supp_epreuve'])->name('supp_epreuve');

// Catégories
Route::get('form_categorie', [PageController::class, 'crea_categorie'])->name('form_categorie');
Route::post('form_categorie', [PageController::class, 'storeCategorie'])->name('form_categorie.store');
Route::get('modif_categorie/{id}', [PageController::class, 'modif_categorie'])->name('modif_categorie');
Route::put('form_categorie/{id}', [PageController::class, 'majCategorie'])->name('majCategorie');
Route::get('supp_categorie/{id}', [PageController::class, 'supp_categorie'])->name('supp_categorie');
