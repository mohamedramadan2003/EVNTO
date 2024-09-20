<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizerResource;
use App\Models\Organizer\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index(Request $request)
    {
        $organizers = Organizer::with(['events','profile'])
            ->filter($request->query())->get();

        return OrganizerResource::collection($organizers);
    }

}
