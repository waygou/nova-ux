<?php

namespace Waygou\NovaUX\Http\Controllers;

use Laravel\Nova\Http\Requests\NovaRequest;
use Zttp\Zttp;

class PlacesController
{
    protected $address;
    protected $result;

    public function mapMarker(NovaRequest $request)
    {
        return response()->json(['result' => 'ok']);
    }

    public function geocode(NovaRequest $request)
    {
        $geocode = Zttp::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address'   => $request->address,
            'libraries' => 'places',
            'key'       => env('ADDRESS_AUTOCOMPLETE_API_KEY'),
        ]);

        // Verify response, and compute place fields if response is not empty.
        $address = json_decode($geocode->body(), true);

        if ($address['status'] == 'ZERO_RESULTS') {
            return response()->json(['status' => 'ZERO_RESULTS']);
        }

        if ($address['status'] == 'OK') {
            // Retrieve first address component.
            $this->address = $address['results'][0];

            // Construct address response json.
            $response = [];
            $response['postal_code'] = $this->addressComponent('postal_code');
            $response['city'] = $this->addressComponent('administrative_area_level_1');
            $response['locality'] = $this->addressComponent('locality');
            $response['country_code'] = $this->addressComponent('country', 'short_name');
            $response['country'] = $this->addressComponent('country');
            $response['latitude'] = data_get($this->address, 'geometry.location.lat');
            $response['longitude'] = data_get($this->address, 'geometry.location.lng');
            $response['formatted_address'] = data_get($this->address, 'formatted_address');
            $response['place_id'] = data_get($this->address, 'place_id');
        }

        return response()->json(['geocode' => $response,
                                 'status'  => 'OK', ]);
    }

    public function addressComponent($type, $key = 'long_name')
    {
        $this->result = null;

        collect(data_get($this->address, 'address_components'))
               ->each(function ($item) use ($type, $key) {
                if (in_array($type, $item['types'])) {
                    $this->result = $item[$key];
                }
               });

        return $this->result;
    }

    //https://maps.googleapis.com/maps/api/place/autocomplete/json?input=rua%20da%20penha%20de%20franca&libraries=places&key=AIzaSyDRUKfw1Oa1ti0RigdiXGnQgOg1PcYWNE0
    ////https://maps.googleapis.com/maps/api/geocode/json?address=Rua%20da%20Penha%20de%20Franca%20138,%20Lisboa,%20Portugal&key=AIzaSyDRUKfw1Oa1ti0RigdiXGnQgOg1PcYWNE0
}
