@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <!-- Errors list -->
        <div class="errors-list">
            @include('errors._list')
        </div>

        <h2><i class="fa fa-commenting" aria-hidden="true"></i> Edit Thread</h2>

        <hr>

        <!-- Thread form -->
        @can('access', $thread)
            <div class="well">
                <form action="{{ route('threads.update', [$thread->category, $thread]) }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('threads.partials._form', [
                        'category_id' => $thread->category_id,
                        'title' => $thread->title,
                        'body' => $thread->body,
                        'button' => 'Save changes',
                    ])

                </form>
            </div>
        @endcan

    </div>

@endsection