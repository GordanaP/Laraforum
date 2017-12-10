@extends('layouts.app')

@section('title', '| '.$user->name)

@section('content')

    <h1 class="page-header">
        {{ $user->name }}
        <small>Member since {{ $user->formatted_created }}</small>
    </h1>

    <div class="col-md-3 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset text-center">
            <h4>About</h4>

            <img src="{{ asset('images/avatar.png') }}" alt="no-image-avatar" width="60%" style="margin-bottom: 12px;">

            <p>{{ $user->profile->bio }}</p>
        </div>
    </div>

    <div class="col-md-9">
        @foreach ($userThreads as $thread)
            <div class="panel panel-default">
                <div class="panel-heading flex align-center">
                    <a href="{{ route('threads.show', [$thread->category, $thread]) }}" class="flex-1">
                        {{ $thread->title }}
                    </a>

                    @can('access', $thread)
                        <a href="#" class="btn btn-warning btn-sm btn-thread-edit square">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <form action="{{ route('threads.destroy', $thread) }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="btn btn-warning btn-sm square">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>
                    @endcan
                </div>

                <div class="panel-body">
                    <p>
                        <b>Category</b>: <span class="text-uppercase">
                            <a href="{{ route('threads.index', [$thread->category, set_filter('user', $user->name)]) }}">
                                {{ $thread->category->name }}
                            </a>
                        </span>
                        <b>Started</b>: {{ $thread->formatted_created }}
                        <b>{{ str_plural('Reply', $thread->replies_count) }}</b>: {{ $thread->replies_count }}
                    </p>
                    {{ $thread->body }}
                </div>
            </div>
        @endforeach

        <div class="text-center">
            {{ $userThreads->links() }}
        </div>
    </div>


@endsection