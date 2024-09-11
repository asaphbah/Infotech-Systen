## Requisitos

*   PHP 8.2 ou superior
*   Composer
*   Git

## Como rodar o projeto
*   Clonar o repositorio
    git clone https://github.com/asaphbah/Infotech-Systen.git

*   Acessar diretório do projeto
    cd infotech-systen-test

*   Instalar as dependências
    composer install

*   Configurar arquivos
    cp .env.example .env
    depois disso gere a chave de aplicação
    php artisan key:generate

*   Executar as migration
    php artisan migrate

*   Rodar o servidor
    php artisan serve