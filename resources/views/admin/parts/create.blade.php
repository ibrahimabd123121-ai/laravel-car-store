<div class="container mt-5">
    <h2>Add New Part</h2>
    
    <form action="{{ route('parts.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Car</label>
            <select name="car_id" class="form-control" required>
                <option value="">Select Car</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }} ({{ $car->brand->name }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Part Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Part</button>
        <a href="{{ route('parts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>