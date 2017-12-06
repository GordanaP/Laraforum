<article class="threads">
    <h4>
        <a href="{{ route('threads.show', $thread) }}">
            {{ $thread->body }}
        </a>
    </h4>
    <p>
        Started by {{ $thread->user->name }}, {{ $thread->created_at->diffForHumans() }}
    </p>
</article>

<hr>