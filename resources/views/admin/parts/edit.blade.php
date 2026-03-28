<div class="container mt-5">
    <h2>Edit Part</h2>
    
    <form action="{{ route('parts.update', $part->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Car</label>
            <select name="car_id" class="form-control" required>
                <option value="">Select Car</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $part->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }} ({{ $car->brand->name }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Part Name</label>
            <input type="text" name="name" class="form-control" value="{{ $part->name }}" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ $part->price }}" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $part->stock }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $part->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Part</button>
        <a href="{{ route('parts.show', $part->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
