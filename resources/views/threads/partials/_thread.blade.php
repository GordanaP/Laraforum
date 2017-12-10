@component('partials.components.thread')
    @slot('well_class') component-well-thread
    @endslot
    @slot('media_user')
        <a href="{{ route('profiles.show', $thread->user) }}">
            <b>{{ $thread->user->name }}</b>
        </a>
    @endslot
    @slot('media_img') {{ asset('images/avatar.png') }}
    @endslot
    @slot('media_title') {{ $thread->title }}
    @endslot
    @slot('calendar') <b>Started:</b> {{ $thread->formatted_created }}
    @endslot
    @slot('inclusion')
    @endslot
    @slot('count')
        <i class="fa fa-comments"></i>
        <b>{{ str_plural('Reply', $thread->replies_count) }}</b>: {{ $thread->replies_count }}
    @endslot
    @slot('media_body') {{ $thread->body }}
    @endslot
@endcomponent
