<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinces = [
            ['name' => 'Aceh'],
            ['name' => 'North Sumatra'],
            ['name' => 'West Java'],
            ['name' => 'East Java'],
            // Add all 38 Indonesian provinces
        ];

        if ($request->query('q')) {
            $provinces = array_filter($provinces, function($province) use ($request) {
                return stripos($province['name'], $request->query('q')) !== false;
            });
        }

        return response()->json(array_values($provinces));
    }

    public function getCities(Request $request)
    {
        $province = $request->query('province');
        $cities = [
            'West Java' => [
                ['name' => 'Bandung'],
                ['name' => 'Bogor'],
            ],
            'East Java' => [
                ['name' => 'Surabaya'],
                ['name' => 'Malang'],
            ],
            // Add cities for other provinces
        ];

        $result = $province && isset($cities[$province]) ? $cities[$province] : [];
        if ($request->query('q')) {
            $result = array_filter($result, function($city) use ($request) {
                return stripos($city['name'], $request->query('q')) !== false;
            });
        }

        return response()->json(array_values($result));
    }

    public function getDistricts(Request $request)
    {
        $province = $request->query('province');
        $city = $request->query('city');
        $districts = [
            'West Java' => [
                'Bandung' => [
                    ['name' => 'Cibeunying Kaler'],
                    ['name' => 'Cibeunying Kidul'],
                    ['name' => 'Bandung Wetan'],
                ],
                'Bogor' => [
                    ['name' => 'Bogor Selatan'],
                    ['name' => 'Bogor Tengah'],
                ],
            ],
            'East Java' => [
                'Surabaya' => [
                    ['name' => 'Gubeng'],
                    ['name' => 'Tegalsari'],
                ],
                'Malang' => [
                    ['name' => 'Klojen'],
                    ['name' => 'Lowokwaru'],
                ],
            ],
            // Add districts for other cities
        ];

        $result = ($province && $city && isset($districts[$province][$city])) ? $districts[$province][$city] : [];
        if ($request->query('q')) {
            $result = array_filter($result, function($district) use ($request) {
                return stripos($district['name'], $request->query('q')) !== false;
            });
        }

        return response()->json(array_values($result));
    }

    public function getVillages(Request $request)
    {
        $province = $request->query('province');
        $city = $request->query('city');
        $district = $request->query('district');
        $villages = [
            'West Java' => [
                'Bandung' => [
                    'Cibeunying Kaler' => [
                        ['name' => 'Cihapit'],
                        ['name' => 'Cihaur Geulis'],
                        ['name' => 'Neglasari'],
                    ],
                    'Cibeunying Kidul' => [
                        ['name' => 'Padasuka'],
                        ['name' => 'Sukamaju'],
                        ['name' => 'Cicadas'],
                    ],
                ],
                'Bogor' => [
                    'Bogor Selatan' => [
                        ['name' => 'Batutulis'],
                        ['name' => 'Bondongan'],
                        ['name' => 'Muarasari'],
                    ],
                ],
            ],
            'East Java' => [
                'Surabaya' => [
                    'Gubeng' => [
                        ['name' => 'Kertajaya'],
                        ['name' => 'Pucang Sewu'],
                        ['name' => 'Airlangga'],
                    ],
                ],
            ],
            // Add villages for other districts
        ];

        $result = ($province && $city && $district && isset($villages[$province][$city][$district])) ? $villages[$province][$city][$district] : [];
        if ($request->query('q')) {
            $result = array_filter($result, function($village) use ($request) {
                return stripos($village['name'], $request->query('q')) !== false;
            });
        }

        return response()->json(array_values($result));
    }
}