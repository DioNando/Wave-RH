<?php

use App\Http\Controllers\CertificationController;
use App\Http\Controllers\CollaborateurController;
use App\Http\Controllers\CompetenceTechniqueController;
use App\Http\Controllers\ContactUrgenceController;
use App\Http\Controllers\ContratTravailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\DocumentAdministratifController;
use App\Http\Controllers\HistoriqueCongeController;
use App\Http\Controllers\JourFerieController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VilleController;
use App\Models\HistoriqueConge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/ui', [DashboardController::class, 'example'])->name('examples.ui');
    Route::get('/diagrams', function () {
        return view('pages.diagrams.index');
    })->name('examples.diagrams');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Diagrammes
    Route::get('/diagrammes/classes', function () {
        return view('pages.diagrams.classes');
    })->name('examples.diagrams.classes');

    Route::get('/diagrammes/sequences', function () {
        return view('pages.diagrams.sequences');
    })->name('examples.diagrams.sequences');

    Route::get('/diagrammes/packages', function () {
        return view('pages.diagrams.packages');
    })->name('examples.diagrams.packages');

    Route::get('/diagrammes/use-cases', function () {
        return view('pages.diagrams.use-cases');
    })->name('examples.diagrams.use-cases');
});

// Routes pour la gestion des utilisateurs (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UserController::class);
});

// Routes pour la gestion des pays, régions et villes
Route::middleware(['auth'])->group(function () {
    Route::resource('/pays', PaysController::class);
    Route::resource('/regions', RegionController::class);
    Route::resource('/villes', VilleController::class);
    Route::resource('/departements', DepartementController::class);
    Route::resource('/postes', PosteController::class);
    Route::resource('/types-documents', TypeDocumentController::class);
    Route::resource('/collaborateurs', CollaborateurController::class);
    Route::resource('/documents-administratifs', DocumentAdministratifController::class);
    Route::resource('/diplomes', DiplomeController::class);
    Route::resource('/certifications', CertificationController::class);
    Route::resource('/contacts-urgences', ContactUrgenceController::class);
    Route::resource('/contrats-travails', ContratTravailController::class);
    Route::resource('/conges', HistoriqueCongeController::class);
    Route::resource('/jours-feries', JourFerieController::class);
    Route::resource('/langues', LangueController::class);
    Route::resource('/competences-techniques', CompetenceTechniqueController::class);
});

// Gestion des erreurs personnalisée
Route::fallback(function () {
    $errorCode = 404;
    return response()->view("errors.{$errorCode}", [], $errorCode);
});

require __DIR__ . '/auth.php';
