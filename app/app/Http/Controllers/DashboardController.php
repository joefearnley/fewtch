<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMessages = auth()->user()->messages->count();
        $queuedMessages = auth()->user()->messages->where('sent', false)->count();

        return view('dashboard')->with([
            'totalMessages' => $totalMessages,
            'queuedMessages' => $queuedMessages,
        ]);
    }
}
