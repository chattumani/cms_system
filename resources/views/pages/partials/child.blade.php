<ul class="list-group mt-3">
    @foreach ($children as $child)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <!-- Link to the child page details -->
                    <a href="{{ route('page.show', ['slug1' => $child->slug]) }}">
                        <strong>{{ $child->title }}</strong>
                        <small class="text-muted">({{ $child->slug }})</small>
                    </a>
                </div>
                <div>
                    <a href="{{ route('pages.edit', $child->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('pages.destroy', $child->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Recursively show child pages if they exist -->
            @if ($child->children->isNotEmpty())
                @include('pages.partials.child', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
