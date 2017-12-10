    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('threads.show', [$thread->category, $thread->slug]) }}">
                {{ $thread->title }}
            </a>
        </div>

        <div class="panel-body">
            <p>
                <span class="text-uppercase">
                    <a href="{{ route('threads.index', $thread->category) }}">
                        {{ $thread->category->name }}
                    </a>
                </span>

                Started by
                <a href="{{ route('threads.index', ['', set_filter('user', $thread->user->name)]) }}">
                    {{ $thread->user->name }}
                </a>
                {{ $thread->formatted_created }}
                <i class="fa fa-comments" aria-hidden="true"></i> {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
            </p>
        </div>
    </div>


