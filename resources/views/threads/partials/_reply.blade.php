<div class="thread-reply">

    <div class="panel panel-default">

        <div class="panel-heading">

            <a href="{{ route('threads.index', ['', set_filter('user', $reply->user->name)]) }}">
                {{ $reply->user->name }}
            </a>

            posted {{ $reply->formatted_created }}</div>

        <div class="panel-body">
            {{ $reply->body }}
        </div>

    </div>

</div>