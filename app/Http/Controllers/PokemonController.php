<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Services\Interfaces\PokemonServiceInterface;

class PokemonController extends BaseController
{
    private PokemonServiceInterface $pokemonService;

    // Construtor que injeta uma instância de PokemonServiceInterface
    public function __construct(PokemonServiceInterface $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    // Método para pesquisar informações de um Pokémon
    public function pesquisaPokemon(Request $request): JsonResponse
    {
        $pokemon = $this->pokemonService->pesquisaPokemon($request->input('busca'));

        // Verifica se ocorreu um erro na pesquisa do Pokémon
        if ($pokemon['erro'] ?? false) {
            return $this->sendError('Pokemon enviado de forma incorreta.', ['error' => 'Pokemon enviado de forma incorreta'], 404);
        } else {
            return $this->sendResponse($pokemon, 'Pokemon retornado.');
        }
    }

    // Método para listar Pokémon com base em um offset
    public function listagemPokemon(Request $request): JsonResponse
    {
        $listaPokemon = $this->pokemonService->listaPokemon($request->input('offset'));

        // Verifica se ocorreu um erro na listagem dos Pokémon
        if ($listaPokemon['erro'] ?? false) {
            return $this->sendError('Não foi possível listar os Pokemon.', ['error' => 'Não foi possível listar os Pokemon'], 404);
        } else {
            return $this->sendResponse($listaPokemon, 'Listagem retornados.');
        }
    }

    // Método para obter os últimos Pokémon procurados
    public function ultimosProcurados(Request $request): JsonResponse
    {
        $lista = $request->input('ultimos');
        $listaPokemon = $this->pokemonService->ultimosProcurados(explode(",", $lista));

        // Verifica se ocorreu um erro na obtenção dos últimos Pokémon procurados
        if ($listaPokemon['erro'] ?? false) {
            return $this->sendError('Não foi possível listar os Pokemon.', ['error' => 'Não foi possível listar os Pokemon'], 404);
        } else {
            return $this->sendResponse($listaPokemon, 'Listagem retornados.');
        }
    }

    // Método para obter a descrição de um Pokémon
    public function descricaoPokemon(Request $request): JsonResponse
    {
        $listaPokemon = $this->pokemonService->descricaoPokemon($request->input('pokemon'));

        // Verifica se ocorreu um erro na obtenção da descrição do Pokémon
        if ($listaPokemon['erro'] ?? false) {
            return $this->sendError('Descrição do Pokemon não encontrada.', ['error' => 'Descrição do Pokemon não encontrada'], 404);
        } else {
            return $this->sendResponse($listaPokemon, 'Descrição retornada.');
        }
    }
}

