<reply :reply="{{ $reply }}" inline-template v-cloak>

    @component('partials.components.thread')

        @slot('media_user')
            <a href="{{ route('profiles.show', $reply->user) }}">
                <b>{{ $reply->user->name }}</b>
            </a>
        @endslot

        @slot('media_img') {{ asset('images/avatar.png') }}
        @endslot

        @slot('media_title') Re: {{ $reply->thread->title }}
        @endslot

        @slot('calendar') <b>Posted:</b>&nbsp; {{ $reply->formatted_created }}
        @endslot

        @slot('buttons')
            @can('access', $reply)
                <div class="panel-footer">
                    <div class="pull-right">
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
                    </div>
                    <div class="clearfix"></div>
                </div>
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
                <small class="has-text-danger"
                    v-if="errors.body"
                    v-text="errors.body[0]"
                ></small>

                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" rows="3"
                        v-model="body"
                        @keydown="clearErrors"
                    ></textarea>
                </div>

                <button class="btn btn-xs square btn-success"
                    @click="update"
                    :disabled="hasErrors"
                >
                    Update
                </button>
                <button class="btn btn-xs square btn-link"
                    @click="cancel"
                >
                    Cancel
                </button>
            </div>

            <div v-else v-text="body"></div>
        @endslot

    @endcomponent

</reply>
