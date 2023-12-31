<x-layout>
    <form action="{{ route('posts.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Enter Title</label>
            <input type="text" class="form-control" name="title" id="title" maxlength="70"
                placeholder="Enter title of your blog" value="{{ $post->title }}" />
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Enter post</label>
            <textarea class="form-control" name="body" placeholder="Enter your post here" id="body" rows="5"
                maxlength="500">{{ $post->body }}</textarea>
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="image" id="file" placeholder="Enter your Post" />
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <select name="category_id" id="category_id" style="width: 12rem; height: 2rem">
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ ucwords($category->name) }}</option>
                @endforeach

            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>
