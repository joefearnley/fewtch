<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMessages = auth()->user()->messages;
        $sentMessages = auth()->user()->messages->where('sent', true);
        $queuedMessages = auth()->user()->messages->where('sent', false);
        $cancelledMessages = auth()->user()->messages->where('cancelled', true);

        return view('dashboard')->with([
            'totalMessages' => $totalMessages,
            'sentMessages' => $sentMessages,
            'queuedMessages' => $queuedMessages,
            'cancelledMessages' => $cancelledMessages,
        ]);
    }
}
