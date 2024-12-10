@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="parent_id">Parent Page</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">No Parent</option>
                @foreach ($pages as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create Page</button>
    </form>
</div>
@endsection
