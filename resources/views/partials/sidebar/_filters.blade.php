<div class="row">
    <div class="col-md-10">

        <h4 class="text-uppercase">Choose by filter</h4>

        <div class="list-group categories">

            <li class="list-group-item">
                <a href="{{ route('threads.index') }}">
                    <i class="fa fa-folder-open-o" aria-hidden="true"></i> All threads
                </a>
            </li>

            @auth
            <li class="list-group-item">
                <a href="{{ route('threads.index', ['', set_filter('user', Auth::user()->name)]) }}">
                    <i class="fa fa-share-alt" aria-hidden="true"></i> My threads
                </a>
            </li>
            @endauth

        </div>

    </div>
</div>