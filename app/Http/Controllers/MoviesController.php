<?php

namespace App\Http\Controllers;

use App\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tmdb\Repository\MovieRepository;


class MoviesController extends Controller
{
    private $movies;

    function __construct(MovieRepository $movies)
    {
        $this->movies = $movies;
    }

    function index()
    {
        $movies = Movies::all();
        return  response()->json([
            'message' => 'all movies viewed successfully',
            'movies' => $movies
        ],
            200);
    }
    function show($id){
        $movie = Movies::find($id);
        if (is_null($movie))
        {
            return $this->sendError('Movie Not Found ! ');
        }
        return response()->json([
            'message' => 'Movie Viewed Successfully',
            'Movie' => $movie,
        ],200);
    }
    function rated(){
        $movies = Movies::orderBy('popularity','DESC')->get();
        return  response()->json([
            'message' => 'all movies viewed by rate',
            'movies' => $movies
        ],
            200);
    }
    function recently(){
        $movies = Movies::orderBy('release_date','DESC')->get();
        return  response()->json([
            'message' => 'all movies viewed by rate',
            'movies' => $movies
        ],
            200);
    }
}
