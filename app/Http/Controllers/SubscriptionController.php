<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Thread;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Thread $thread, User $user)
    {
        $thread->subscribe(Subscription::new($user ?: Auth::User()));

        if (request()->expectsJson())
        {
            return response([
                'message' => 'You have subscribed to the thread.'
            ]);
        }

        return back()->with('flash', 'You have subscribed to the thread.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread, User $user=null)
    {
        $thread->unsubscribe($user ?: Auth::User());

        if (request()->expectsJson())
        {
            return response([
                'message' => 'You have unsubscribed from the thread.'
            ]);
        }

        return back()->with('flash', 'You have unsubscribed from the thread.');
    }
}
