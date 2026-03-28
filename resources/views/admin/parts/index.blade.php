<div class="container mt-5">
    <h2>Parts Management</h2>
    <a href="{{ route('parts.create') }}" class="btn btn-primary mb-3">Add New Part</a>
    
    @if($parts->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->car->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <a href="{{ route('parts.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('parts.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('parts.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $parts->links() }}
        </div>
    @else
        <div class="alert alert-info">No parts found. <a href="{{ route('parts.create') }}">Add one now!</a></div>
    @endif
</div>
