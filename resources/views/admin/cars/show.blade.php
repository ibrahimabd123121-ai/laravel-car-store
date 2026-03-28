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
    

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $car->name }}</h2>
            <hr>
            
            <div class="car-details mb-4">
                <p><strong>Brand:</strong> {{ $car->brand->name }}</p>
                <p><strong>Model:</strong> {{ $car->model }}</p>
                <p><strong>Year:</strong> {{ $car->year }}</p>
                <p><strong>Price:</strong> ${{ number_format($car->price, 2) }}</p>
                @if($car->description)
                    <p><strong>Description:</strong> {{ $car->description }}</p>
                @endif
            </div>

            <div class="car-images mt-4">
                <h4>Images</h4>
                @if($car->images->count() > 0)
                    <div class="row">
                        @foreach($car->images as $image)
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset('storage/' . $image->image) }}" 
                                     alt="{{ $car->name }}" 
                                     class="img-fluid rounded">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No images available</p>
                @endif
            </div>

            <div class="mt-4">
                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back to List</a>
                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
</body>
</html>