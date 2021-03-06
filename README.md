# SemanaOmnistack10
Projeto desenvolvido em conjunto com a Semana Omnistack com algumas alterações, utilizando PHP para a Restful API, ReactJS para o Front-end Web, e React Native para a aplicação mobile.

# Pré-requisitos
- PHP
- Composer
- Laravel
- NPM ou Yarn
- Expo Cli

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

#### Expo
Use o comando `yarn global add expo-cli`

#### Yarn e NPM
Instale o Yarn ou o NPM pelos seus sites oficiais, entre na pasta `frontend` e `mobile` e execute os comandos
`yarn` ou `npm` dentro das pastas para instalar as dependências

# Utilização
#### Arquivo de ambiente
Crie uma cópia do arquivo .env.example com o nome de .env com as informações do seu projeto.

#### Backend (Rest Api)
Com um `cd` dentro da pasta do backend faça o comando
`composer i`
Logo será instalado todos os packages e dependências.

Para iniciar o servidor de desenvolvimento:
`php artisan serve`

#### Frontend (React)
Inicie o servidor de desenvolvimento usando `yarn start` dentro da pasta `frontend`

#### Mobile (React-Native)
Inicie o servidor de desenvolvimento Expo usando `yarn start` dentro da pasta `mobile`