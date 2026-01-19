<?php

use App\Http\Controllers\PontoEletronico\AcompanhamentoController;
use App\Http\Controllers\PontoEletronico\DashboardController;
use App\Http\Controllers\PontoEletronico\DashboardPainelController;
use App\Http\Controllers\PontoEletronico\IndexController;
use App\Http\Controllers\PontoEletronico\IndexPainelController;
use App\Http\Controllers\PontoEletronico\LoginController;
use App\Http\Controllers\PontoEletronico\LoginPainelController;
use App\Http\Controllers\PontoEletronico\PontoAjusteController;
use App\Http\Controllers\PontoEletronico\PontoController;
use App\Http\Controllers\PontoEletronico\PontoPainelController;
use App\Http\Controllers\PontoEletronico\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/registrar', [PontoController::class, 'registrar_validando']);
Route::get('/registrar', [PontoController::class, 'registrar']);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/sair', [LoginController::class, 'sair']);

Route::prefix('painel')->group(function() {
    Route::post('/login', [LoginPainelController::class, 'login']);
    
    Route::get('/', [IndexPainelController::class, 'index']);
    
    Route::get('/dashboard', [DashboardPainelController::class, 'index']);
    
    Route::get('/usuarios', [UsuarioController::class, 'index']);
    Route::get('/usuario/novo', [UsuarioController::class, 'novo']);
    Route::get('/usuario/editar/{id}', [UsuarioController::class, 'editar']);
    Route::get('/usuario/excluir/{id}', [UsuarioController::class, 'excluir']);
    Route::get('/usuario/desabilitar/{id}', [UsuarioController::class, 'desabilitar']);
    Route::get('/usuario/habilitar/{id}', [UsuarioController::class, 'habilitar']);
    Route::post('/usuario/salvar', [UsuarioController::class, 'salvar']);
    
    Route::get('/acompanhamento', [AcompanhamentoController::class, 'index']);
    Route::post('/acompanhamento', [AcompanhamentoController::class, 'index']);
    Route::post('/ponto/salvar', [PontoPainelController::class, 'ajuste']);
    Route::post('/ponto/periodo/salvar', [PontoAjusteController::class, 'salvar']);
    Route::get('/ajuste', [PontoAjusteController::class, 'index']);
    Route::get('/ajuste/excluir/{id}', [PontoAjusteController::class, 'delete']);
    Route::get('/certificacao', [PontoAjusteController::class, 'index']);
    Route::post('/certificacao/salvar', [PontoAjusteController::class, 'certificar']);
    Route::get('/excel-acompanhamento/{usuario}/{inicio}/{fim}', [AcompanhamentoController::class, 'index_download']);
    
    Route::get('/sair', [LoginPainelController::class, 'sair']);
});

