@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="parent_id">Parent Page</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">No Parent</option>
                @foreach ($pages as $parent)
                    <option value="{{ $parent->id }}" {{ $page->parent_id == $parent->id ? 'selected' : '' }}>
                        {{ $parent->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $page->title }}" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $page->slug }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $page->content }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Update Page</button>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">Back to Pages</a>
        </div>
    </form>
</div>
@endsection
