# API de Produtos com Laravel

Esta aplicação Laravel implementa uma API para gerenciar produtos, permitindo operações básicas como criar, listar, atualizar e excluir produtos, além de suportar o upload de imagens para os produtos.

## Configuração Inicial

Para começar a desenvolver, você precisará configurar o ambiente de desenvolvimento.   
Certifique-se de ter o [XAMPP](https://www.apachefriends.org/pt_br/index.html) e o [Composer](https://getcomposer.org/download/) instalados na sua máquina.  
Para verificar se o [Composer] esta instalado, execute no terminal `composer -v`.  
Para verificar a instalação do [PHP] execute no terminal `php -v`.   

Após clonar o projeto, duplique o arquivo `env.example` e renomeie a cópia como `.env`.  
Execute no terminal o comando `php artisan key:generate` e dentro do arquivo .env recem criado, cole a key gerada no campo APP_KEY que está em branco.  
Neste mesmo arquivo duplicado - .ENV - remova os comentários na configuração de banco de dados.  
Lembre-se também de instalar as dependencias do Laravel - `composer install` - e rodas as migrações - `php artisan migrate`.  

O projeto utilizou como banco de dados o SQLite, que já vem configurado para uso no Laravel.  
Caso o banco não seja criado, execute `touch database/database.sqlite`.   

## Endpoints da API

`GET /api/produtos` -> Retorna todos os produtos cadastrados.  
`GET /api/products/{productId}` -> Retorna um produto específico pelo ID e uma url para da imagem. Caso o produto não possua imagem, um padrão é enviada.  
`POST /api/products` -> Cria um novo produto.  
`POST /api/products/{productId}` -> Atualiza os dados de um produto, se existir, pelo ID.  
`DELETE /api/products/{productId}` -> Remove os dados de um produto, se existir, pelo ID.  

## Executando a Aplicação

Para executar a aplicação, na pasta raiz do projeto, execute no terminal `php artisan serve`

## Documentação Adicional

Para mais informações sobre, consulte a documentação oficial do [Laravel](https://laravel.com/docs/11.x).
