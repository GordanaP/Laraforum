@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    <!-- Errors list -->
    <div class="errors-list">
        @include('errors._list')
    </div>

    <div class="row">
        <div class="col-md-3">
            @auth
                @include('partials.sidebar._button')
            @endauth
            @include('partials.sidebar._filters')
            @include('partials.sidebar._categories')
        </div>

        <div class="col-md-9">
            <div class="panel panel-default panel-thread-replies">
                <div class="panel-body">

                    <!-- Reply form -->
                    @auth
                        @include('replies.partials._form')
                    @endauth
                    @guest

                        <a href="/login">Log in to reply</a>

                    @endguest

                    <!-- Thread component -->
                    @include('threads.partials._thread')

                    <!-- Reply components -->
                    @php $i = 1; @endphp

                    @foreach ($replies as $reply)
                        @include('threads.partials._reply', ['i' => $i])
                    @endforeach

                    <div class="text-center">
                        {{ $replies->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection