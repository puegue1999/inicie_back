<?php

namespace App\Services\Interfaces;

interface PokemonServiceInterface
{
    // Função para pesquisar informações de um Pokémon
    public function pesquisaPokemon($busca);

    // Função para listar Pokémon com base em um offset
    public function listaPokemon($offset);

    // Função para obter a descrição de um Pokémon
    public function descricaoPokemon($pokemon);

    // Função para obter os últimos Pokémon procurados
    public function ultimosProcurados($ultimos);
}
