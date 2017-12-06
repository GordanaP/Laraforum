<form action="{{ route('replies.store', $thread) }}" method="POST">

    {{ csrf_field() }}

    <div class="form-group">
        <textarea name="reply_body" id="replyBody" class="form-control" rows="5" placeholder="Have your say here.."></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Post a reply</button>
    </div>

</form>