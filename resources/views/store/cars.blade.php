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
    <div class="container mt-5">
    <h2>Cars Views</h2>
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
      <table class="table mt-3">
                      <thead>
                        <tr>
                          <th scope="col">Car Name</th>
                          <th scope="col">Brnd</th>
                          <th scope="col">Price</th>
                          <th scope="col">Model</th>
                          <th scope="col">Action</th>
                          <th scope="col">ADD TO CART</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($cars as $car)
                        <tr>
                          <td>{{$car->name}}</td>
                          <td>{{$car->brand->name}}</td>
                          <td>{{ $car->price }}</td>
                          <td>{{ @$car->model }}</td>
                        
                          <td>
                            <a href="{{ route('store.show',$car->id) }}">deatils</a>
                          </td>
                          <td>
                            <form action="{{ route('cart.add',$car->id) }} " method="Post">
                              @csrf
                              <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                            </form>
                          </td>
                        </tr>
                        <tr>
                        @endforeach
                      </tbody>
                    </table>

        
</div>

</body>
</html>