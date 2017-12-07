<div class="row">
    <div class="col-md-10">

        <h4 class="text-uppercase">Pick by category</h4>

        <div class="list-group categories">

            <li class="list-group-item">
                <a href="{{ route('threads.index') }}">
                    <span class="glyphicon glyphicon-record"></span> All
                </a>
            </li>

            @foreach ($categories as $category)
                <li class="list-group-item">
                    <a href="{{ route('threads.index', $category) }}">
                        <span class="glyphicon glyphicon-record"></span> {{$category->formatted_name}}
                    </a>
                </li>
            @endforeach

        </div>

    </div>
</div>