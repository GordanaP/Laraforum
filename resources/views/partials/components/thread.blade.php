<div class="well component-well {{ $well_class }}">
    <div class="row">

        <div class="col-md-2">
            <div class="panel panel-default component-well-panel">
                <div class="panel-body">
                    <p class="text-center">
                        {{ $media_user }}
                    </p>

                    <a href="#">
                        <img class="media-object image" src="{{ $media_img }}" alt="no-image-avatar">
                    </a>
                </div>
            </div>

        </div>

        <div class="col-md-10">
            <div class="media-body component-well-media">
                <h4 class="media-heading">
                    <b>{{ $media_title }}</b>
                </h4>

                <div class="flex align-center calendar-media">
                    <span class="flex align-center flex-1">
                        <i class="fa fa-calendar"></i> {{ $calendar }}
                        {{ $buttons }}
                    </span>

                    {{ $inclusion }}
                </div>

                <div class="count-media flex align-center">
                    <div class="flex-1">
                        {{ $count }}
                    </div>
                    {{ $subscribe }}
                </div>

                <hr>

                <p>
                    {{ $media_body }}
                </p>
            </div>
        </div>
    </div>
</div>