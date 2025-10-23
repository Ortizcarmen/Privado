<?php   

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/question/{question}',[QuestionController::class,'show'])->name('question.show');
Route::post('/answers/{question}',[AnswerController::class,'store'])->name('answers.store');
Route::delete('/questions/{question}',[QuestionController::class,'destroy'])->name('questions.destroy');


// routes/web.php
// Ruta para mostrar el formulario de creación de pregunta (solo si está logueado)
Route::middleware('auth')->get('/preguntar', [QuestionController::class, 'create'])->name('preguntar');

// Ruta para crear una pregunta (solo si está logueado)
Route::middleware('auth')->post('/preguntas', [QuestionController::class, 'store'])->name('preguntas');



Route::get('/question/{question}', [QuestionController::class, 'show'])->name('question.show');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
