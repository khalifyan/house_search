<?php

namespace App\Http\Controllers\API;

use App\Action\HouseSearchAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Http\Resources\HouseResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HouseController extends Controller
{
    public function search(HouseSearchAction $action, HouseRequest $request): AnonymousResourceCollection
    {
        return HouseResource::collection($action->execute($request->dto()));
    }
}
