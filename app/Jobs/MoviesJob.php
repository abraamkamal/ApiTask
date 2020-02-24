<?php

namespace App\Jobs;


use App\Movies;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MoviesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $top_rated = $client->get('https://api.themoviedb.org/3/movie/top_rated?api_key=1414acc11d32c1bccf01631a957785f6&language=en-US&page=1');
        $result = json_decode($response = $top_rated->getBody());

        foreach ($result->results as $result) {

            $ids = json_encode($result->genre_ids);

            Movies::updateOrCreate([
                'title' => $result->title],
                ['popularity' => $result->popularity,
                    'vote_count' => $result->vote_count,
                    'video' => $result->video,
                    'genre_ids' => $ids,
                    'adult' => $result->adult,
                    'original_language' => $result->original_language,
                    'poster_path' => $result->poster_path,
                    'original_title' => $result->original_title,
                    'vote_average' => $result->vote_average,
                    'overview' => $result->overview,
                    'release_date' => $result->release_date,

                ]);
        }
        $recent = $client->get('https://api.themoviedb.org/3/movie/popular?api_key=1414acc11d32c1bccf01631a957785f6&language=en-US&page=1');
        $pop_movies = json_decode($response = $recent->getBody());
        foreach ($pop_movies->results as $pop_movie) {
            $ids = json_encode($pop_movie->genre_ids);

            Movies::updateOrCreate([
                'title' => $pop_movie->title],
                ['popularity' => $pop_movie->popularity,
                    'vote_count' => $pop_movie->vote_count,
                    'video' => $pop_movie->video,
                    'genre_ids' => $ids,
                    'adult' => $pop_movie->adult,
                    'original_language' => $pop_movie->original_language,
                    'poster_path' => $pop_movie->poster_path,
                    'original_title' => $pop_movie->original_title,
                    'vote_average' => $pop_movie->vote_average,
                    'overview' => $pop_movie->overview,
                    'release_date' => $pop_movie->release_date,

                ]);
        }

    }
}
