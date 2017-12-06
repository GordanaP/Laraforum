@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- Errors list -->
            <div class="errors-list">
                @include('errors._list')
            </div>

            <div class="thread-title">

                <!-- Thread title -->
                <h3>{{ $thread->title }}
                    <p class="small">
                        Started by <a href="#">{{ $thread->user->name }} </a>
                        {{ $thread->formatted_created }}
                    </p>
                </h3>

                <!-- Reply form -->
                <p>
                    @auth
                        <a data-toggle="collapse" href="#replyForm" aria-expanded="false" aria-controls="replyForm">Leave a reply</a>

                        <div class="collapse" id="replyForm">
                            <div class="well">
                                @include('replies.partials._form')
                            </div>
                        </div>
                    @endauth
                    @guest
                        <a href="/login">Log in to reply</a>
                    @endguest
                </p>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- Thread -->
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

            <!-- Replies -->
            @each ('threads.partials._reply', $thread->replies, 'reply')

        </div>
    </div>

@endsection