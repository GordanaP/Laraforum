<article>

    <h4>
        <a href="{{ route('threads.show', [$thread->category, $thread]) }}">
            {{ $thread->body }}
        </a>
    </h4>

    <p>
        <span class="text-uppercase">
            <a href="{{ route('threads.index', $thread->category) }}">
                {{ $thread->category->name }}
            </a>
        </span>

        Started by {{ $thread->user->name }}, {{ $thread->formatted_created }}
    </p>

</article>

<hr>