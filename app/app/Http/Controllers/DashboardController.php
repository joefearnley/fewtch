<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMessages = auth()->user()->messages;
        $queuedMessages = auth()->user()->messages->where('sent', false);

        return view('dashboard')->with([
            'totalMessages' => $totalMessages,
            'queuedMessages' => $queuedMessages,
        ]);
    }
}
