<reply :reply="{{ $reply }}" inline-template v-cloak>

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
                <button class="btn btn-xs btn-thread-edit square ml-12" style="border: 1px solid #aaa; background: #f9f9f9"
                    @click="editing = true"
                >
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
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

        @slot('media_body')
            <div v-if="editing">
                <small v-if="errors.body" class="has-text-danger">
                    @{{ errors.body[0] }}
                </small>

                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" rows="3" v-model="body"></textarea>
                </div>

                <button class="btn btn-xs square btn-success" @click="update">Update</button>
                <button class="btn btn-xs square btn-link" @click="editing = false">Cancel</button>
            </div>

            <div v-else v-text="body"></div>
        @endslot

    @endcomponent

</reply>
