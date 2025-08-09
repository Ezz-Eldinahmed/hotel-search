<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchHotelRequest;
use App\Http\Resources\HotelResource;
use App\Services\HotelService;

class HotelController extends Controller
{

    public function __construct(private HotelService $hotelService) {}
    public function search(SearchHotelRequest $request)
    {
        return HotelResource::collection($this->hotelService->search($request->validated()));
    }
}
