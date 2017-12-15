<?php

namespace App\Http\Controllers;

use Auth;
use App\{User, Reply, Thread};
use App\Http\Requests\ReplyRequest;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');

        $this->authorizeResource(Reply::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request, Thread $thread)
    {
        // Add a reply
        $reply = $thread->addReply(Reply::new($request));

        // Notify subscribers
        $thread->notifySubscribersAbout($reply);

        return back()->with('flash', 'Your reply has been published.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(ReplyRequest $request, Reply $reply)
    {
        $reply->update([
            'body' => $request->body
        ]);

        if (request()->expectsJson()) {
            return response ([
                'message' => 'Good'
            ]);
        }

        return back()->with('flash', 'Your reply has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();

        if(request()->expectsJson()) {
            return response([
                'message' => 'Your reply has been deleted.'
            ]);
        }

        return back()->with('flash', 'Your reply has been deleted.');
    }

    protected function resourceAbilityMap()
    {
         return [
            'update'  => 'access',
            'destroy' => 'access',
        ];
    }
}