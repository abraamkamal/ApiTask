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
 
 responce :
 ```json
 {
    "message": "data stored successfully"
}
 ```
* GET index (Endpoint list Of Movies)
  'http://127.0.0.1:8000/api/index'
  
  responce : 
  ```json
  "message": "all movies viewed successfully",
    "movies": [
        {
            "id": 1,
            "popularity": 18.13,
            "vote_count": 2210,
            "genre_ids": "[35,18,10749]",
            "video": 0,
            "poster_path": "/2CAL2433ZeIihfX1Hb2139CX0pW.jpg",
            "adult": 0,
            "original_language": "hi",
            "original_title": "दिलवाले दुल्हनिया ले जायेंगे",
            "title": "Dilwale Dulhania Le Jayenge",
            "vote_average": 9,
            "overview": "Raj is a rich, carefree, happy-go-lucky second generation NRI. Simran is the daughter of Chaudhary Baldev Singh, who in spite of being an NRI is very strict about adherence to Indian values. Simran has left for India to be married to her childhood fiancé. Raj leaves for India with a mission at his hands, to claim his lady love under the noses of her whole family. Thus begins a saga.",
            "release_date": "1995-10-20",
            "created_at": "2020-02-24 03:54:52",
            "updated_at": "2020-02-24 06:42:52"
        },
          ```
* GET index recently (Recent Movies) 
  'http://127.0.0.1:8000/api/recently'
  
  responce :
  ```json
  "message": "all recent movies viewed ",
    "movies": [
        {
            "id": 37,
            "popularity": 72.93,
            "vote_count": 6,
            "genre_ids": "[80,18]",
            "video": 0,
            "poster_path": "/ji1JO9bZX3pQ15lhU96dj0gZO74.jpg",
            "adult": 0,
            "original_language": "en",
            "original_title": "The Night Clerk",
            "title": "The Night Clerk",
            "vote_average": 8,
            "overview": "Hotel night clerk Bart Bromley is a highly intelligent young man on the Autism spectrum. When a woman is murdered during his shift, Bart becomes the prime suspect. As the police investigation closes in, Bart makes a personal connection with a beautiful guest named Andrea, but soon realises he must stop the real murderer before she becomes the next victim.",
            "release_date": "2020-02-21",
            "created_at": "2020-02-24 03:54:52",
            "updated_at": "2020-02-24 06:42:52"
        },
  ```
* GET index rated (Top Rated Movies)
  'http://127.0.0.1:8000/api/rated'
  
  responce : 
  ```json
   "message": "all movies viewed by rate",
    "movies": [
        {
            "id": 22,
            "popularity": 259.91,
            "vote_count": 366,
            "genre_ids": "[28,35,878,10751]",
            "video": 0,
            "poster_path": "/aQvJ5WPzZgYVDrxLX4R6cLJCEaQ.jpg",
            "adult": 0,
            "original_language": "en",
            "original_title": "Sonic the Hedgehog",
            "title": "Sonic the Hedgehog",
            "vote_average": 7,
            "overview": "Based on the global blockbuster videogame franchise from Sega, Sonic the Hedgehog tells the story of the world’s speediest hedgehog as he embraces his new home on Earth. In this live-action adventure comedy, Sonic and his new best friend team up to defend the planet from the evil genius Dr. Robotnik and his plans for world domination.",
            "release_date": "2020-02-12",
            "created_at": "2020-02-24 03:54:52",
            "updated_at": "2020-02-24 06:42:52"
        },
  ```
* GET index {Id} (List Movie By Specific Id)
 'http://127.0.0.1:8000/api/index/$id'
 
 responce :
 ```json
  "message": "Movie Viewed Successfully",
    "Movie": {
        "id": 5,
        "popularity": 24.55,
        "vote_count": 9137,
        "genre_ids": "[18,36,10752]",
        "video": 0,
        "poster_path": "/yPisjyLweCl1tbgwgtzBCNCBle.jpg",
        "adult": 0,
        "original_language": "en",
        "original_title": "Schindler's List",
        "title": "Schindler's List",
        "vote_average": 9,
        "overview": "The true story of how businessman Oskar Schindler saved over a thousand Jewish lives from the Nazis while they worked as slaves in his factory during World War II.",
        "release_date": "1993-11-30",
        "created_at": "2020-02-24 03:54:52",
        "updated_at": "2020-02-24 06:42:52"
    }
 ```
* Postman Docs Url https://documenter.getpostman.com/view/4644672/SzKVRdxo
  

