<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $part->name }}</h2>
            <hr>
            
            <div class="part-details mb-4">
                <p><strong>Car:</strong> {{ $part->car->name }} ({{ $part->car->brand->name }})</p>
                <p><strong>Price:</strong> ${{ number_format($part->price, 2) }}</p>
                <p><strong>Stock:</strong> {{ $part->stock }}</p>
                @if($part->description)
                    <p><strong>Description:</strong> {{ $part->description }}</p>
                @endif
            </div>

            <div class="mt-4">
                <a href="{{ route('parts.edit', $part->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('parts.index') }}" class="btn btn-secondary">Back to List</a>
                <form action="{{ route('parts.destroy', $part->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
