<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /** Lista eventów
     * 
     * @api
     * @return object - json z id, nazwa wydarzenia, data rozpoczęcia, slug wydarzenia, nazwę Usera.
     */
    public function index()
    {
        $events = Event::with('user')
            ->select(['id', 'name', 'started_at', 'slug', 'user.name'])
            ->get();

        return response()->json($events, 200);
    }
}
