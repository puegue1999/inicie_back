# inicie_back

Este é um projeto Laravel chamado inicie_back com suporte a Docker feito para o teste na Inicie.

## Pré-requisitos

Certifique-se de ter os seguintes softwares instalados em sua máquina local antes de prosseguir:

- Docker: [Instalação do Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Instalação do Docker Compose](https://docs.docker.com/compose/install/)

## Executando o Projeto com Docker

1. Clone o repositório:

    ```bash
    git clone https://github.com/seu-usuario/inicie_back.git
    ```

2. Navegue até o diretório do projeto:
    ```bash
    cd inicie_back
    ```

3. Crie um arquivo .env baseado no arquivo .env.example:
    ```bash
    cp .env.example .env
    ```

4. Execute o comando Docker Compose para construir e iniciar o contêiner:
    ```bash
    docker-compose up -d --build
    ```

5. Para parar o contêiner Docker, execute:
    ```bash
    docker-compose down
    ```

## Executando o Projeto diretamente

Para construir o projeto execute os comando abaixo:

```shell
php artisan serve
```

O comando irá começar um server local [http://127.0.0.1:8000], isso mostrará que seu back está funcionando.

## Features

O projeto foi desenvolvido para requisitar para uma api externa o pokemon dado. Com a resposta recebida, é devolvido ao front o json que foi obtido.