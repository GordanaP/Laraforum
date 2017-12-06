@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $thread->title }}</div>
                <div class="panel-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>
@endsection