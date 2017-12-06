{{ csrf_field() }}

<div class="form-group">
    <label for="title">Title</label>
    <input name="title" id="title" class="form-control" placeholder="Thread title" value="{{ $title }}">
</div>

<div class="form-group">
    <label for="thread_body">Body </label>
    <textarea name="thread_body" id="threadBody" class="form-control" rows="5" placeholder="Thread body">{{ $thread_body }}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">
        {{ $button }}
    </button>
</div>