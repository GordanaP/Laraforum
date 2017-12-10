<div class="row">
    <div class="col-md-12">

        <h4 class="text-uppercase">Pick by category</h4>

        <div class="list-group categories">

            <li class="list-group-item">
                <a href="{{ route('threads.index') }}">
                    <i class="fa fa-circle" aria-hidden="true"></i> All
                </a>
            </li>

            @foreach ($categories as $category)
                <li class="list-group-item">
                    <a href="{{ route('threads.index', $category) }}">
                        <i class="fa fa-circle" aria-hidden="true"></i> {{$category->formatted_name}}
                    </a>
                </li>
            @endforeach

        </div>

    </div>
</div>