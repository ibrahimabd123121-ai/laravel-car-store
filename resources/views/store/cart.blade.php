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
    
     <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">Total</th>
                        
                    </tr>
                    @foreach ($cart as $id =>$item)
                           <tr>
                            <td> <img src="{{ asset('storge/'.$item['image']) }}" width="80"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td>
                                <form action="{{ route('cart.update',$id) }}" method="Post">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control w-50 d-inline" width="70px">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                            
                            
                            
                            
                            
                            
                            
                            </form>
                        </td>
                            <td>${{ $item['price']*$item['quantity'] }}</td>

                            <td>
                               
                                 
                            </td>
                            <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this brand?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart as $item)
                        @php
                            $total += $item['price'] * $item['quantity'];
                        @endphp
                    @endforeach

                  
                    <h3>Total: ${{ $total }}</h3>
             
                </thead>
              
            </table>
        </div>





</body>
</html>