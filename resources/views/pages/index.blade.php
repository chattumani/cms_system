@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Page Management</h1>
        <a href="{{ route('pages.create') }}" class="btn btn-success">Create New Page</a>
    </div>

    <!-- Page List -->
    @if ($pages->isEmpty())
        <div class="alert alert-info">No pages found. Click "Create New Page" to get started.</div>
    @else
        <div class="card">
            <div class="card-header">
                <strong>Page List</strong>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($pages as $page)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <!-- Link to the page details -->
                                    <a href="{{ route('page.show', ['slug1' => $page->slug]) }}">
                                        <strong>{{ $page->title }}</strong>
                                        <small class="text-muted">({{ $page->slug }})</small>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Child Pages -->
                            @if ($page->children->isNotEmpty())
                                @include('pages.partials.child', ['children' => $page->children])
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function (event) {
                if (!confirm('Are you sure you want to delete this page?')) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endpush
