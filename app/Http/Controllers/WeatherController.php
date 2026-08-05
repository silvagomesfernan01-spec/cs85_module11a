<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeatherController extends Controller
{
    public function index()
    {
        $weatherData = Storage::json('weather.json');

        return view('weather.index', ['weather' => $weatherData]);
    }
}