# SemanaOmnistack10
Projeto desenvolvido em conjunto com a Semana Omnistack com algumas alterações, utilizando PHP para a Restful API, ReactJS para o Front-end Web, e React Native para a aplicação mobile.

# Pré-requisitos
- PHP
- Composer
- Laravel

# Instalação
#### PHP
Instale o PHP de acordo com o seu sistema operacional.
Edite o arquivo php.ini dentro da pasta do PHP em Dynamic Extensions coloque
`extension=php_fileinfo.dll`

Habilite também a extensão de PDO_MYSQL
`extension=pdo_mysql.so`

#### Composer
Instale o composer pelo site oficial https://getcomposer.org/ e reinicie o computador.

#### Laravel
Com o PHP e Composer instalados execute o comando :
`composer global require laravel/installer`

# Utilização
#### Arquivo de ambiente
Crie uma cópia do arquivo .env.example com o nome de .env com as informações do seu projeto.

#### Backend (Rest Api)
Com um `cd` dentro da pasta do backend faça o comando
`composer i`
Logo será instalado todos os packages e dependências.

Para iniciar o servidor de desenvolvimento:
`php artisan serve`
