<form action="{{ route('likes.store', $model) }}" method="POST">

    {{ csrf_field() }}

    <button class=" btn btn-link btn-link-likes
        {{$model->isLikedBy(Auth::user()) ? 'btn-liked disabled' : 'btn-non-liked' }}"
    >
        <span class="glyphicon {{ $icon }}"></span>
    </button>

</form>