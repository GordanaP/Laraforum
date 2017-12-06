@extends('layouts.app')

@section('title', '| New Thread')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- Errors list -->
            <div class="errors-list">
                @include('errors._list')
            </div>

            <div class="thread-create">
                <h2>New Thread</h2>

                <hr>

                <div class="well">
                    <form action="{{ route('threads.store') }}" method="POST">

                        @include('threads.partials._form', [
                            'title' => old('title'),
                            'thread_body' => old('thread_body'),
                            'button' => 'Create a thread',
                        ])

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection