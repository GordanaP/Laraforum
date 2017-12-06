@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="thread-title">
                <h3>{{ $thread->title }}
                    <p class="small">
                        Started by <a href="#">{{ $thread->user->name }} </a>
                        {{ $thread->formatted_created }}
                    </p>
                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <article class="thread">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">{{ $thread->user->name }}</a>
                    </div>
                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </article>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @each ('threads.partials._reply', $thread->replies, 'reply')
        </div>
    </div>

@endsection