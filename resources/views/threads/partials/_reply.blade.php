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

        @slot('media_title') Re: {{ $reply->thread->title }}
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

                <button class="btn btn-xs btn-danger square"
                    @click="destroy"
                >
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            @endcan
        @endslot

        @slot('subscribe')
        @endslot

        @slot('inclusion')
            @auth
                <like :reply="{{ $reply }}"></like>
            @endauth
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
