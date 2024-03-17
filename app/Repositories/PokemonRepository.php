<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PokemonRepositoryInterface;
use GuzzleHttp\Client;

class PokemonRepository implements PokemonRepositoryInterface
{
    // Função para buscar informações de um Pokémon específico
    public function buscaPokemon($busca)
    {
        $client = new Client();
        $url = "https://pokeapi.co/api/v2/pokemon/$busca/";

        $response = $client->get($url);

        return json_decode($response->getBody(), true);
    }

    // Função para listar Pokémon com base em um offset
    public function listarPokemon($offset)
    {
        $client = new Client();
        $url = "https://pokeapi.co/api/v2/pokemon/?limit=10&offset=$offset";

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        $pokemonResponses = [];

        // Iterar sobre os resultados e buscar informações detalhadas de cada Pokémon
        foreach ($data['results'] as $pokemon) {
            $pokemonUrl = $pokemon['url'];

            $pokemonResponse = $client->get($pokemonUrl);

            $pokemonResponses[] = json_decode($pokemonResponse->getBody(), true);
        }

        return $pokemonResponses;
    }

    // Função para obter informações dos últimos Pokémon procurados
    public function ultimosProcurados($ultimos)
    {
        $client = new Client();

        $pokemonResponses = [];

        // Iterar sobre os últimos Pokémon procurados e buscar informações de cada um
        foreach ($ultimos as $ultimo) {
            $url = "https://pokeapi.co/api/v2/pokemon/$ultimo/";

            $pokemonResponse = $client->get($url);
            $pokemonResponses[] = json_decode($pokemonResponse->getBody(), true);
        }

        return $pokemonResponses;
    }

    // Função para obter a descrição de um Pokémon em inglês
    public function descricaoPokemon($pokemon)
    {
        $client = new Client();
        $url = "https://pokeapi.co/api/v2/pokemon-species/$pokemon/";

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        $pokemonResponses = [];

        // Iterar sobre as entradas de texto e selecionar apenas aquelas em inglês
        foreach ($data['flavor_text_entries'] as $pokemon) {
            $pokemonLanguage = $pokemon['language']['name'];

            if ($pokemonLanguage == 'en') {
                $pokemonResponses[] = $pokemon;
            }
        }

        return $pokemonResponses;
    }
}
