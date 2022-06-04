<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Mail\Events\MessageSent as EventsMessageSent;
use Symfony\Component\Console\Input\Input;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->messages()
                     ->where(function ($query) {
                         $query->bySender(request()->input('sender_id'))
                     ->byReceiver(auth()->user()->id);
                     })
                     ->orWhere(function ($query){
                         $query->bySender(auth()->user()->id)
                         ->byReceiver(request()->input('sender_id'));
                     })->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = Message::create([
            'sender_id' => $request->input('sender_id'),
            'reseiver_id' => $request->input('reseiver_id'),
            'message' => $request->input('message'),
        ]);

        broadcast(new MessageSent($messages));
        return $messages->fresh();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
