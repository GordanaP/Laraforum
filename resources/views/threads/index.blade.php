@extends('layouts.app')

@section('title', '| Threads')

@section('content')
    <div class="row">

        <div class="col-md-3">
            @include('partials.sidebar._filters')
            @include('partials.sidebar._categories')
        </div>

        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-heading text-uppercase">
                    Forum Threads
                </div>

                <div class="panel-body">
                    <div class="threads">
                        @each ('threads.partials._thread', $threads, 'thread')
                    </div>
                </div>
            </div>

            <div class="text-center">
                {{ $threads->appends(Request::input())->links() }}
            </div>

        </div>

    </div>
@endsection