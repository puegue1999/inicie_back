<?php

namespace App\Repositories\Interfaces;

interface PokemonRepositoryInterface
{
    // Função para buscar informações de um Pokémon pelo nome
    public function buscaPokemon($nome);

    // Função para listar Pokémon com base em um offset
    public function listarPokemon($offset);

    // Função para obter a descrição de um Pokémon
    public function descricaoPokemon($pokemon);

    // Função para obter os últimos Pokémon procurados
    public function ultimosProcurados($ultimos);
}
