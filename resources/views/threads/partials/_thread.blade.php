@component('partials.components.thread')

    @slot('media_user')
        <a href="{{ route('profiles.show', $thread->user) }}">
            <b>{{ $thread->user->name }}</b>
        </a>
    @endslot

    @slot('media_img') {{ asset('storage/'.$thread->user->profile->avatar()) }}
    @endslot

    @slot('media_title') <i class="fa fa-thumb-tack"></i> {{ $thread->title }}
    @endslot

    @slot('calendar') <b>Started:</b>&nbsp; {{ $thread->formatted_created }}
    @endslot

    @slot('buttons')
    @endslot

    @slot('inclusion')
    @endslot

    @slot('subscribe')
        <subscribe :thread="{{ $thread->load('subscriptions') }}"></subscribe>
    @endslot

    @slot('count')
        <i class="fa fa-comments"></i>
        <b>{{ str_plural('Reply', $thread->replies_count) }}</b>:&nbsp; {{ $thread->replies_count }}
    @endslot

    @slot('media_body') {{ $thread->body }}
    @endslot

@endcomponent
