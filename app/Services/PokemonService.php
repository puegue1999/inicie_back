<?php

namespace App\Services;

use App\Repositories\Interfaces\PokemonRepositoryInterface;
use App\Services\Interfaces\PokemonServiceInterface;

class PokemonService implements PokemonServiceInterface
{
    private PokemonRepositoryInterface $pokemonRepository;

    // Construtor que injeta uma instância de PokemonRepositoryInterface
    public function __construct(PokemonRepositoryInterface $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    // Função para pesquisar informações de um Pokémon
    public function pesquisaPokemon($busca)
    {
        // Utiliza o repositório para buscar informações do Pokémon
        $pokemon = $this->pokemonRepository->buscaPokemon($busca);

        return $pokemon;
    }

    // Função para listar Pokémon com base em um offset
    public function listaPokemon($offset)
    {
        // Utiliza o repositório para obter a lista de Pokémon
        $listaPokemon = $this->pokemonRepository->listarPokemon($offset);

        return $listaPokemon;
    }

    // Função para obter os últimos Pokémon procurados
    public function ultimosProcurados($ultimos)
    {
        // Utiliza o repositório para obter os últimos Pokémon procurados
        $listaPokemon = $this->pokemonRepository->ultimosProcurados($ultimos);

        return $listaPokemon;
    }

    // Função para obter a descrição de um Pokémon
    public function descricaoPokemon($pokemon)
    {
        // Utiliza o repositório para obter a descrição do Pokémon
        $descricaoPokemon = $this->pokemonRepository->descricaoPokemon($pokemon);

        return $descricaoPokemon;
    }
}
