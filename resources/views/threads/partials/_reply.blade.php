<div class="thread-reply">

    <div class="panel panel-default">

        <div class="panel-heading flex align-center">

            <div class="flex-1">
                <a href="{{ route('threads.index', ['', set_filter('user', $reply->user->name)]) }}">
                    {{ $reply->user->name }}
                </a>
                posted {{ $reply->formatted_created }}
            </div>

            @include('likes.partials._form', [
                'model' => $reply,
                'icon' => 'glyphicon-thumbs-up'
            ])

            {{ $reply->likes_count }}

        </div>

        <div class="panel-body">
            {{ $reply->body }}
        </div>

    </div>

</div>