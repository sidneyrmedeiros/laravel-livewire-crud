<p align="center"><a href="https://github.com/sidneyrmedeiros" target="_blank"><img src="https://infynno.com/wp-content/uploads/2020/08/laravel_livewire.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/sidneyrmedeiros/laravel-livewire-crud/actions"><img src="https://github.com/sidneyrmedeiros/laravel-livewire-crud/actions/workflows/laravel.yml/badge.svg?branch=master" alt="Build Status"></a>
<a href="https://github.com/sidneyrmedeiros/laravel-livewire-crud/blob/master/LICENSE"><img src="https://img.shields.io/github/license/sidneyrmedeiros/laravel-livewire-crud.svg" alt="License MIT"></a>
</p>

# About

Crud developed in *PHP/Laravel + Livewire + MySQL* with the purpose of demonstrating the use of this stack..

This CRUD has the following features:

- CRUD Tasks
- CRUD Projects
- Reorder tasks/projects using drag and drop
- Project Select Filter
- Authentication
- Dashboard

## Stack
The following stack was used:

- Laravel
- Livewire
- MySQL
- Docker
- GitHub Actions

## Installation

1. Clone/Download the repo: `git clone https://github.com/sidneyrmedeiros/laravel-livewire-crud.git`
2. Copy *.env.dev* file to *.env*: `cd laravel-livewire-crud && cp .env.dev .env`
3. To install composer dependencies `composer install`
4. To build docker-compose containers `./vendor/bin/sail up -d`
5. To run migrate and run seeder `./vendor/bin/sail artisan migrate --seed`
6. To install npm dependencies `./vendor/bin/sail npm install`
7. To build vite `./vendor/bin/sail npm run build`

Once everything is installed, you are ready to go.

## Usage

- To run `./vendor/bin/sail up -d`
- To authenticate: [http://0.0.0.0:8000/login](http://0.0.0.0:8000/login)
```json
{
  "email": "admin@example.com",
  "password": "12345678"
}
```
- To access the Tasks CRUD: [http://0.0.0.0:8000/tasks](http://0.0.0.0:8000/tasks)
- To access the Projects CRUD: [http://0.0.0.0:8000/projects](http://0.0.0.0:8000/projects)
- To down the containers `./vendor/bin/sail down`

## Test

1. Run tests by `./vendor/bin/sail artisan test`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

##### by Sidney Ricardo Medeiros

### Follow Me

<a href="https://www.linkedin.com/in/sidney-ricardo-medeiros/"><img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white" alt="LinkedIn Sidney Ricardo Medeiros"></a>

