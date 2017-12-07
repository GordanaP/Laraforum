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

                <h2><i class="fa fa-commenting" aria-hidden="true"></i> New Thread</h2>

                <hr>

                <!-- Thread form -->
                <div class="well">
                    <form action="{{ route('threads.store') }}" method="POST">

                        {{ csrf_field() }}

                        @include('threads.partials._form', [
                            'category_id' => old('category'),
                            'title' => old('title'),
                            'body' => old('body'),
                            'button' => 'Create a thread',
                        ])

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection