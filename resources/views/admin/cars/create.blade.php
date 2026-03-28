<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CarsForSails</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/kaiadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kaiadmin.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.min.css') }}">
  </head>
<body>


<form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
        <label>Brand</label>
        <select name="brand_id" class="form-control" required>
            <option value="">Select Brand</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Model</label>
        <input type="text" name="model" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Year</label>
        <input type="number" name="year" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" step="0.01" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Images</label>
        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Add Car</button>
</form>
</body>
</html>