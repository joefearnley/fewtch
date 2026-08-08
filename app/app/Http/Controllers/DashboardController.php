<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMessages = auth()->user()->messages->sortByDesc('created_at');
        $sentMessages = auth()->user()->sentMessages;
        $queuedMessages = auth()->user()->queuedMessages;
        $cancelledMessages = auth()->user()->cancelledMessages;

        return view('dashboard')->with([
            'totalMessages' => $totalMessages,
            'sentMessages' => $sentMessages,
            'queuedMessages' => $queuedMessages,
            'cancelledMessages' => $cancelledMessages,
        ]);
    }
}
