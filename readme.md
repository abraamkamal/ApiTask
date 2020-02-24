# Trufla Task

* Schedule movie seeder API Service from https://www.themoviedb.org
* Create schedule that runs every five Mins to Seed the “recently
  movies” and “top rated movies” including the movie “genres”
* Store the movies and categories using mysql database
* Create endpoint to list the movies
* Can filter the result by some parameters for example filter by id
* Can sort the result by some parameters for example sort by most popular movies and
  highest rated

## Installation

All the code required to get started
## Clone
Clone this repo to your local machine using https://github.com/abraamkamal/TruflaTask.git
## Database
Setup new Database named "task"
## Migration

```bash
php artisan migrate:fresh 
```

## Run First Queue and Job

```bash
php artisan queue:work
php artisan job:dispatch MoviesJob
```
## Schedule
```php
 protected function schedule(Schedule $schedule)
    {
        $schedule->job(new MoviesJob())->everyFiveMinutes();
    }
```

## APIs
* GET fetch data (Store Movies To Database)
 'http://127.0.0.1:8000/api/get'
* GET index (Endpoint list Of Movies)
  'http://127.0.0.1:8000/api/index'
* GET index recently (Recent Movies) 
  'http://127.0.0.1:8000/api/recently'
* GET index rated (Top Rated Movies)
  'http://127.0.0.1:8000/api/rated'
* GET index {Id} (List Movie By Specific Id)
 'http://127.0.0.1:8000/api/index/$id'
* Postman Docs Url https://documenter.getpostman.com/view/4644672/SzKVRdxo
  

