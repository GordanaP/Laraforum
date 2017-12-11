<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Reply;
use App\Thread;
use App\Category;
use App\Filters\Thread\ThreadFilters;
use App\Http\Requests\ThreadRequest;

class ThreadController extends Controller
{
    public function __construct()
    {
        // Auhtenticate
        $this->middleware('auth')->only('create', 'store');

        // Authorize
        $this->authorizeResource(Thread::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category = null, ThreadFilters $filters)
    {
        if($category)
        {
            $threads = Thread::with('category')
                ->where('category_id', $category->id)
                ->latest()
                ->filter($filters)
                ->paginate(5);

            // if (request()->exists('user'))
            // {
            //     $user = User::whereName('Gordana')->first();

            //     return view('profiles.show')->with([
            //         'user' => $user,
            //         'userThreads' => $threads
            //     ]);
            // }

            // return view('threads.index', compact('threads'));
        }

        $threads = Thread::with('category')
            ->latest()
            ->filter($filters)
            ->paginate(5);

        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        Auth::user()->saveThread(Thread::new($request));

        return redirect()->route('threads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Thread $thread)
    {
        // load user with .every reply to avoid N+1 or Reply::where('thread_id', $thread->id)
        $replies = $thread->replies()->latest()->paginate(10);

        return view('threads.show', compact('thread', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Thread $thread)
    {
        return view('threads.edit', compact('thread', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadRequest $request, Category $category, Thread $thread)
    {
        Auth::user()->saveThread($thread->changed($request));

        return redirect()->route('threads.edit', [$thread->category, $thread]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return back();
    }

    protected function resourceAbilityMap()
    {
         return [
            'edit'    => 'access',
            'update'  => 'access',
            'destroy' => 'access',
        ];
    }

}
