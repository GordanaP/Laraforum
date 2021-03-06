@extends('layouts.app')

@section('title', '| '.$user->name)

@section('content')

    @include('errors._list')

    <div class="row flex page-header">
        <div class="col-md-3">

            @can('access', $user)
                <form action="{{ route('avatars.store', $user) }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <input type="file" name="avatar" id="avatar">
                    <button type="submit" class="btn btn-default btn-sm">
                        Upload Avatar
                    </button>
                </form>
            @endcan

            <img src="{{ asset('storage/'.$user->profile->avatar()) }}" alt="" width="100px" height="100px">

        </div>

        <div class="col-md-9">
            <h1>
                {{ $user->name }}
                <small>Member since {{ $user->formatted_created }}</small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset text-center">
                <h4>About</h4>

                <img src="{{ asset('images/avatar.png') }}" alt="no-image-avatar" width="60%" style="margin-bottom: 12px;">

                <p>{{ $user->profile->bio }}</p>
            </div>
        </div>

        <div class="col-md-9">
            @foreach ($userThreads as $thread)
                <div class="panel panel-default">
                    <div class="panel-heading flex align-center">
                        <a href="{{ route('threads.show', [$thread->category, $thread]) }}" class="flex-1">
                            {{ $thread->title }}
                        </a>

                        @can('access', $thread)
                            <a href="{{ route('threads.edit', [$thread->category, $thread]) }}" class="btn btn-warning btn-sm btn-thread-edit square">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <form action="{{ route('threads.destroy', $thread) }}" method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-warning btn-sm square">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        @endcan
                    </div>

                    <div class="panel-body">
                        <p>
                            <b>Category</b>:
                            <span class="text-uppercase">
                                <a href="{{ route('profiles.show', [$thread->user, set_filter('category', $thread->category->name)]) }}">
                                    {{ $thread->category->name }}
                                </a>
                            </span>
                            <b>Started</b>: {{ $thread->formatted_created }}
                            <b>{{ str_plural('Reply', $thread->replies_count) }}</b>: {{ $thread->replies_count }}
                        </p>
                        {{ $thread->body }}
                    </div>
                </div>
            @endforeach

            <div class="text-center">
                {{ $userThreads->appends(Request::input())->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        if ("{{ session('message') }}")
        {
            $.notify({
                title: "<strong>{{ session('type') === 'success' ? 'Success!' : 'Error!' }}</strong> ",
                message: "{{ session('message') }}"
            }, {
                type: "{{ session('type') }}"
            });
        }
    </script>
@endsection