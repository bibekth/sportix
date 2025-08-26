<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $auth = User::find(Auth::id());

        // Update expired tickets before fetching
        $this->checkTicketStatus($auth);

        if ($request->status == 'active') {
            $tickets = Ticket::with('event')
                ->where('user_id', $auth->id)
                ->where('status', 1)
                ->get();
        } elseif ($request->status == 'inactive') {
            $tickets = Ticket::with('event')
                ->where('user_id', $auth->id)
                ->where('status', 0)
                ->get();
        } else {
            $tickets = Ticket::with('event')->where('user_id', $auth->id)->get();
        }

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

    private function checkTicketStatus($auth)
    {
        // Get all tickets of user with related event
        $tickets = Ticket::with('event')->where('user_id', $auth->id)->get();

        foreach ($tickets as $ticket) {
            if ($ticket->event && Carbon::parse($ticket->event->starts_on)->lt(now()->startOfDay())) {
                // If event started before today, mark ticket as inactive (0)
                if ($ticket->status != 0) {
                    $ticket->update(['status' => 0]);
                }
            }
        }
    }
}
