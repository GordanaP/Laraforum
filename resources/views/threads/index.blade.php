@extends('layouts.app')

@section('title', '| Threads')

@section('content')
    <div class="row">

        <div class="col-md-3">
            @auth
                @include('partials.sidebar._button')
            @endauth
            @include('partials.sidebar._filters')
            @include('partials.sidebar._categories')
        </div>

        <div class="col-md-8 col-md-offset-1">

            <!-- Threads list -->
            @if ($threads)
                @each ('threads.partials._thread_single', $threads, 'thread')
            @else
                No results at present.
            @endif

            <!-- Pagination -->
            <div class="text-center">
                {{ $threads->appends(Request::input())->links() }}
            </div>

        </div>

    </div>
@endsection