## Candidatura
**Nome:** Rodrigo Severino Heredia  
**CPF:** 736.416.501-00  
**Vaga:** ANALISTA DE TI - DESENVOLVEDOR PHP PLENO  

## Instalação

### 1. Construir containers Docker

*Para construir as imagens dos container*:

Navegar até a pasta raiz do projeto e rodar:

- `docker compose build --no-cache`

Em seguida, inicie o Docker Compose no modo desanexado:

- `docker compose up --wait`

*Entrar no bash do container*

- `docker exec -it api-php-php-1 bash`

Comando rodar as migration:

- `bin/console doctrine:migrations:migrate`

Comando para rodar os Datafixture:

- `php bin/console doctrine:fixtures:load`

<h1 align="center">Acessar o localhost: <a>https://localhost/</a></h1>

# Vai ter um alguns menus
* **Menu Endpoint** Contem todos os endpoint criados.
*  **Menu crug**: Contem os cruds 
