<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Message::create($validatedData);

        $request->session()->flash('status', __('Your message has been prepared to be sent!'));

        return auth()->check() ? redirect()->route('dashboard') : redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        Gate::authorize('update', $message);

        $message = Message::findOrFail($message->id);

        return view('messages.edit')->with([
            'message' => $message,
        ]);
    }

    /**
     * Update the message in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        Gate::authorize('update', $message);

        $validatedData = $request->validated();

        $message->update($validatedData);

        return redirect()->route('dashboard')->with('status', __('Message has been updated successfully.'));
    }

    /**
     * Remove the message from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('dashboard')->with('status', __('Message has been deleted successfully.'));
    }

    /**
     * Cancel the message from being sent.
     */
    public function cancel(Message $message)
    {
        if ($message->user_id !== auth()->id()) {
            abort(403);
        }

        $message->update(['cancelled' => true]);

        return redirect()->route('dashboard')->with('status', __('Message has been cancelled successfully.'));
    }

    /**
     * Requeue the message.
     */
    public function requeue(Message $message)
    {
        if ($message->user_id !== auth()->id()) {
            abort(403);
        }

        $message->update(['cancelled' => false]);

        return redirect()->route('dashboard')->with('status', __('Message has been requeued successfully.'));
    }
}
