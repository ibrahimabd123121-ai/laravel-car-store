
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
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
    
</body>
</html>

<div class="container mt-5">
    <h2>Brands Management</h2>
    <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Add New Brand</a>
    
    @if($brands->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if($item->logo)
                                    <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->name }}" class="img-thumbnail" width="50" height="50">
                                @else
                                    <span class="text-muted">No Logo</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('brands.show', $item->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('brands.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('brands.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this brand?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            {{ $brands->links() }}
        </div>
    @else
        <div class="alert alert-info">No brands found. <a href="{{ route('brands.create') }}">Add one now!</a></div>
    @endif
</div>