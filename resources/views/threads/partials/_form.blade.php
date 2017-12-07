<!-- Category -->
<div class="form-group">
    <label for="category">Category</label>
    <select name="category" id="category" class="form-control">
        <option selected disabled>Select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ set_selected($category->id, $category_id) }}
            >
                {{ $category->formatted_name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Title -->
<div class="form-group">
    <label for="title">Title</label>
    <input name="title" id="title" class="form-control" placeholder="Thread title" value="{{ $title }}">
</div>

<!-- Body -->
<div class="form-group">
    <label for="body">Body </label>
    <textarea name="body" id="body" class="form-control" rows="5" placeholder="Thread body">{{ $body }}</textarea>
</div>

<!-- Button -->
<div class="form-group">
    <button type="submit" class="btn btn-success">
        {{ $button }}
    </button>
</div>