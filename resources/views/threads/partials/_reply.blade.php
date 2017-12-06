<div class="thread-reply">

    <div class="panel panel-default">

        <div class="panel-heading">

            <a href="#">{{ $reply->user->name }}</a>

            posted {{ $reply->formatted_created }}</div>

        <div class="panel-body">
            {{ $reply->body }}
        </div>

    </div>

</div>