{{ $car->name }}

     
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
                <form action="{{ route('cart.add',$car->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">add to cart</button>
                </form>
            </div>