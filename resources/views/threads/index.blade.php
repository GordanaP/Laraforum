@extends('layouts.app')

@section('title', '| Threads')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading text-uppercase">Forum Threads</div>

                <div class="panel-body">
                    @each ('threads.partials._thread', $threads, 'thread')
                </div>

            </div>

        </div>
    </div>
@endsection