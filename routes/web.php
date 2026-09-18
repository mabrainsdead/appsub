<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\ValidacaoController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AdminPasswordResetController;
use App\Http\Controllers\Admin\InscricaoManualController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/inscricao', [InscricaoController::class, 'create'])
    ->name('inscricao.create');

Route::post('/inscricao', [InscricaoController::class, 'store'])
    ->name('inscricao.store');

Route::post('/inscricao/solicitar', [InscricaoController::class, 'solicitar'])
    ->name('inscricao.solicitar');
Route::get('/inscricao/pagamento/{token}', [InscricaoController::class, 'pagamento'])
    ->name('inscricao.pagamento');
Route::post(
    '/inscricao/pagamento/{token}/comprovante',
    [InscricaoController::class, 'enviarComprovante']
)->name('inscricao.comprovante');

Route::get('/admin/solicitacoes', [SolicitacaoController::class, 'index'])
    ->middleware('auth')
    ->name('admin.solicitacoes.index');
Route::get(
    '/admin/solicitacoes/{token}/aprovar',
    [SolicitacaoController::class, 'confirmarAprovacao']
)->name('admin.solicitacoes.confirmar-aprovacao');

Route::post(
    '/admin/solicitacoes/{token}/aprovar',
    [SolicitacaoController::class, 'aprovar']
)->name('admin.solicitacoes.aprovar');

Route::get(
    '/admin/solicitacoes/{token}/recusar',
    [SolicitacaoController::class, 'confirmarRecusa']
)->name('admin.solicitacoes.confirmar-recusar');

Route::post(
    '/admin/solicitacoes/{token}/recusar',
    [SolicitacaoController::class, 'recusar']
)->name('admin.solicitacoes.recusar');

Route::get(
    '/admin/solicitacoes/{token}/resultado',
    [SolicitacaoController::class, 'resultado']
)->name('admin.solicitacoes.resultado');
Route::get(
    '/admin/solicitacoes/{token}/comprovante',
    [SolicitacaoController::class, 'comprovante']
)->name('admin.solicitacoes.comprovante');
Route::get(
    '/validar/{codigo}',
    [ValidacaoController::class, 'validar']
)->name('validar');
Route::get(
    '/validar/{codigo}/qr',
    [ValidacaoController::class, 'qr']
)->name('validar.qr');
Route::get(
    '/carteirinha/{codigo}',
    [ValidacaoController::class, 'carteirinha']
)->name('carteirinha');
Route::get('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'autenticar'])
    ->name('admin.autenticar');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

Route::get('/admin/recuperar-senha', [
    AdminPasswordResetController::class,
    'request'
])->name('admin.password.request');

Route::post('/admin/recuperar-senha', [
    AdminPasswordResetController::class,
    'email'
])->name('admin.password.email');

Route::get('/admin/redefinir-senha/{token}', [
    AdminPasswordResetController::class,
    'resetForm'
])->name('admin.password.reset');

Route::post('/admin/redefinir-senha', [
    AdminPasswordResetController::class,
    'reset'
])->name('admin.password.update');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.index');

Route::get('/admin/solicitacoes/historico', [SolicitacaoController::class, 'historico'])
    ->middleware('auth')
    ->name('admin.solicitacoes.historico');
Route::get('/admin/associados', [AssociadoController::class, 'index'])
    ->middleware('auth')
    ->name('admin.associados.index');
Route::get('/admin/associados/{associado}', [AssociadoController::class, 'show'])
    ->middleware('auth')
    ->name('admin.associados.show');
Route::get('/admin/associados/{associado}/editar', [AssociadoController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.associados.edit');

Route::put('/admin/associados/{associado}', [AssociadoController::class, 'update'])
    ->middleware('auth')
    ->name('admin.associados.update');
Route::get('/admin/configuracoes', [ConfiguracaoController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.configuracoes.edit');

Route::put('/admin/configuracoes', [ConfiguracaoController::class, 'update'])
    ->middleware('auth')
    ->name('admin.configuracoes.update');
Route::get('/admin/campeonatos', [CampeonatoController::class, 'index'])
    ->middleware('auth')
    ->name('admin.campeonatos.index');

Route::get('/admin/campeonatos/criar', [CampeonatoController::class, 'create'])
    ->middleware('auth')
    ->name('admin.campeonatos.create');

Route::post('/admin/campeonatos', [CampeonatoController::class, 'store'])
    ->middleware('auth')
    ->name('admin.campeonatos.store');
Route::get('/admin/campeonatos/{campeonato}/editar', [CampeonatoController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.campeonatos.edit');

Route::put('/admin/campeonatos/{campeonato}', [CampeonatoController::class, 'update'])
    ->middleware('auth')
    ->name('admin.campeonatos.update');
Route::patch(
    '/admin/campeonatos/{campeonato}/alternar-ativo',
    [CampeonatoController::class, 'alternarAtivo']
)
    ->middleware('auth')
    ->name('admin.campeonatos.alternar-ativo');
Route::get('/admin/administradores', [AdministradorController::class, 'index'])
    ->middleware('auth')
    ->name('admin.administradores.index');

Route::get('/admin/administradores/criar', [AdministradorController::class, 'create'])
    ->middleware('auth')
    ->name('admin.administradores.create');

Route::post('/admin/administradores', [AdministradorController::class, 'store'])
    ->middleware('auth')
    ->name('admin.administradores.store');
Route::get('/admin/administradores/{administrador}/editar', [AdministradorController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.administradores.edit');

Route::put('/admin/administradores/{administrador}', [AdministradorController::class, 'update'])
    ->middleware('auth')
    ->name('admin.administradores.update');

Route::delete(
    '/admin/solicitacoes/{solicitacao}',
    [SolicitacaoController::class, 'excluir']
)
    ->middleware('auth')
    ->name('admin.solicitacoes.excluir');

Route::get('/admin/inscricao-manual', [
    InscricaoManualController::class,
    'create'
])
    ->middleware('auth')
    ->name('admin.inscricoes-manual.create');

Route::post('/admin/inscricao-manual', [
    InscricaoManualController::class,
    'store'
])
    ->middleware('auth')
    ->name('admin.inscricoes-manual.store');

Route::get('/admin/inscricao-manual/sucesso/{associacao}', [
    InscricaoManualController::class,
    'sucesso'
])
    ->middleware('auth')
    ->name('admin.inscricoes-manual.sucesso');
