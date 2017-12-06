<article>

    <h4>
        <a href="{{ route('threads.show', $thread) }}">
            {{ $thread->body }}
        </a>
    </h4>

    <p>
        Started by {{ $thread->user->name }}, {{ $thread->formatted_created }}
    </p>

</article>

<hr>