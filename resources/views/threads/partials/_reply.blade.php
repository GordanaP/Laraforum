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

    @slot('buttons')
        @can('access', $reply)
            <a href="#" class="btn btn-warning btn-xs btn-thread-edit square ml-12">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <form action="{{ route('replies.destroy', $reply) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger btn-xs square">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </form>
        @endcan
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
