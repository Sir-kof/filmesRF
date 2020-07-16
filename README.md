# FilmesRF
## Informações sobre esse repositório
O repositório tem a finalidade de executar o cadastro de filmes contendo informações sobre o mesmo e ainda podendo conter informações complementares sobre terceiros.

É escrito utilizando o Laravel Framework alinhada com o banco de dados Mysql, portanto utiliza tecnologias como composer, symfony, csfr, etc.

A aplicação é bem simples, utiliza a estrutura de um formulário para a adição e edição, e rotas GET com poucos parametros para consultas.
### Conjunto chave/valor
#### Filmes
* key: nome, value: nome do filme.
* key: sinopse, value: sinopse do filme.
* key: diretor, value: diretor do filme.
* key: atores, value: atores presentes no filme.
* key: classificacao, value: classificação do filme.
* key: date, value: data de lançamento do filme.

#### Diretor
* key: nome, value: nome do diretor.
* key: idade, value: idade do diretor. *opcional

#### Ator
* key: nome, value: nome do ator.
* key: idade, value: idade do ator. *opcional
### Passos para utilizar esse Repositório
* Fazer o download do repositório.
* Criar um banco de dados Mysql e configurar a conexão no arquivo .env que está na raiz do repositório.
* Fazer as migrações utilizando o comando "php artisan migrate".
* Configurar a conexão com o seu servidor e utilizar a aplicação.
### Passos testar com Postman 
* Fazer o download do repositório.
* Criar um banco de dados Mysql e configurar a conexão no arquivo .env que está na raiz do repositório.
* Fazer as migrações utilizando o comando "php artisan migrate".
* Subir o servidor com o comando "php artisan serve".
* Baixar e executar o Postman.
* Com o Postman já aberto, fazer a exportação do arquivo FilmesRF.postman_collection.json presente na raiz desse repositório.
* Fazer seus testes de acordo com a sua necessidade.
### Guia de Rotas:
#### Rotas de adição
* `./filmes`, juntamente com o método POST -> cadastra um novo filme no banco de dados.
* `./diretores`, juntamente com o método POST -> cadastra um novo diretor no banco de dados.
* `./atores`, juntamente com o método POST -> cadastra um novos atores no banco de dados.

#### Rotas de edição
* `./filmes/{id}`, juntamente com o método POST -> edita um novo filme no banco de dados.
* `./diretores/{id}`, juntamente com o método POST -> edita um novo diretor no banco de dados.
* `./atores/{id}`, juntamente com o método POST -> edita um novos atores no banco de dados.

#### Rotas de exibição
* `./filmes`, juntamente com o método GET -> exibe todos os filmes que estão cadastrados no banco de dados.
* `./diretores`, juntamente com o método GET -> exibe todos os diretores que foram adicionados manualmente no banco de dados.
* `./atores`, juntamente com o método GET -> exibe todos os atores que foram adicionados manualmente no banco de dados.
* `./filmes/{id}`, juntamente com o método GET -> exibe apenas o filme no qual o "id" está especificado na rota.
* `./diretores/{id}`, juntamente com o método GET -> exibe apenas o diretor no qual o "id" está especificado na rota.
* `./atores/{id}`, juntamente com o método GET -> exibe apenas o ator no qual o "id" está especificado na rota.

#### Rotas de exclusão
* `./filmes/deletar/{id}`, juntamente com o método POST -> edita um novo filme no banco de dados.
* `./diretores/deletar/{id}`, juntamente com o método POST -> edita um novo diretor no banco de dados.
* `./atores/deletar/{id}`, juntamente com o método POST -> edita um novos atores no banco de dados.

### Mais informações sobre a manipulação da API
#### Adição
Para a adição, foi construída consoante o padrao chave/valor, isto é, para a adição de informações, foi utilizada a estrutura de formulário.

#### Edição
Para a edição das informações, também é consoante a estrutura de formulário.

#### Consulta
Para a consulta é somente necessário acessar: a rota não parametrizada, para exibir todos os registros; e parametrizada, para exibir apenas um registro específico. Leia as seção de Rotas.

#### Apagar
Para apagar registros, basta apenas, em posse do id referente ao registro desejado, parametrizalo junto com a rota deletar. Por exemplo: Quero apagar o registro filme de id 2, então escrevo minha rota da seguinte forma `./filmes/deletar/2`.
