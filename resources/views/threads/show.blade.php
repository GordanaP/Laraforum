@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    <div class="row">
        <div class="col-md-3">
            @include('partials.sidebar._filters')
            @include('partials.sidebar._categories')
        </div>

        <div class="col-md-9">

            <!-- Errors list -->
            <div class="errors-list">
                @include('errors._list')
            </div>

            <div class="thread-title">

                <!-- Thread title -->
                <h3>{{ $thread->title }}
                    <p class="small">
                        Started by <a href="{{ route('threads.index', ['', set_filter('user', $thread->user->name)]) }}">
                            {{ $thread->user->name }}
                        </a>
                        {{ $thread->formatted_created }}

                        <i class="fa fa-comments" aria-hidden="true"></i> {{ $thread->reply_count }} {{ str_plural('reply', $thread->reply_count) }}
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

                <!-- Thread -->
                <article class="thread">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('threads.index', ['', set_filter('user', $thread->user->name)]) }}">
                                {{ $thread->user->name }}
                            </a>
                        </div>
                        <div class="panel-body">
                            {{ $thread->body }}
                        </div>
                    </div>
                </article>

                <!-- Replies -->
                @each ('threads.partials._reply', $replies, 'reply')

                {{ $replies->links() }}

            </div>
        </div>
    </div>

@endsection