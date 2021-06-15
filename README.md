# Booj Reading List
*Beware of the person of one book. -- Thomas Aquinas*

## Setup Instructions
You can use your preferred dev environment (homestead/valet) or the included docker-compose.yml in the docker directory which will spin up nginx & mysql and forward their respective ports.

To bash into the container to run artisan/composer commands you can run this command: **docker-compose exec php-fpm bash**

Copy .env.example to .env then run composer install/artisan migrate

## Assignment
A programmer has been tasked with creating a reading list app with basic CRUD functionality (Create, Read, Update, Delete) using the Laravel framework. They are new to the Laravel framework and have made some mistakes in the process. **Please review their code and point out any issues you see. You do not have to fix their code, just go into detail about what needs to be fixed.** Some of the mistakes will be quite obvious, others will require a bit of digging.

An additional feature has been requested by the customer: they want to be able to tag books & authors. Please implement tags into the api. Users should be able to create/update/delete tags, along with tagging books and authors. Include tests if time permits.
