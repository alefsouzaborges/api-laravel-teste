<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('/usuarios',[UsuarioController::class, 'store']);
Route::post('/usuarios/delete/{id}', [UsuarioController::class, 'destroy']);

