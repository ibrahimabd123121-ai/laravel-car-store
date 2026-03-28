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





<div class="container mt-5">
    <h2>Cars Management</h2>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>
    
    @if($car->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($car as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->brand->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->model }}</td>
                        <td>{{ $item->year }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>
                            <a href="{{ route('cars.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('cars.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('cars.destroy', $item->id) }}" method="POST" style="display:inline;">
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
            {{ $car->links() }}
        </div>
    @else
        <div class="alert alert-info">No cars found. <a href="{{ route('cars.create') }}">Add one now!</a></div>
    @endif
</div>
