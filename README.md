# README #

### Passo a passo ###

- docker-composer up -d --build (primeira vez)
- docker-composer up -d
 
##### Para rodar um comando dentro do container #####

- docker-compose exec (Ex: docker-compose exec composer update ou ./bin/console/)

OBS: Sempre que for intalar uma lib apagar a pasta vendor e ai rodar o composer require
