@component('partials.components.thread')
    @slot('well_class') component-well-reply
    @endslot
    @slot('media_user')
        <a href="{{ route('profiles.show', $reply->user) }}">
            <b>{{ $reply->user->name }}</b>
        </a>
    @endslot
    @slot('media_img') {{ asset('images/avatar.png') }}
    @endslot
    @slot('media_title') Re: #{{ $i++ }}
    @endslot
    @slot('calendar') <b>Posted:</b> {{ $reply->formatted_created }}
    @endslot
    @slot('inclusion')
        @include('likes.partials._form', [
        'model' => $reply,
        'icon' => 'glyphicon-thumbs-up'
        ])

        {{ $reply->likes_count }}
    @endslot
    @slot('count')
    @endslot
    @slot('media_body') {{ $reply->body }}
    @endslot
@endcomponent
