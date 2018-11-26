<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('affect', 'AffectsController@affect');

Route::post('map-marker', 'PlacesController@mapMarker');

Route::post('places-geocode', 'PlacesController@geocode');
