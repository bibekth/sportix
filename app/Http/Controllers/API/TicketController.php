<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = User::find(Auth::id());
        $tickets = Ticket::where('user_id', $auth->id)->get();
        return $this->sendResponse($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ticket::create([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
        ]);

        return $this->sendResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
