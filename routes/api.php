<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

/**
 * api de convidado para usar pokemon/showEndereco;
 */
Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'guest'
], function () {
    Route::get('pokemon/pesquisaPokemon', 'PokemonController@pesquisaPokemon');
    Route::get('pokemon/listagemPokemon', 'PokemonController@listagemPokemon');
    Route::get('pokemon/descricaoPokemon', 'PokemonController@descricaoPokemon');
    Route::get('pokemon/ultimosProcurados', 'PokemonController@ultimosProcurados');
    Route::apiResource('pokemon', PokemonController::class);
});
