@extends('layouts.front')

@section('title', 'Shop')



@section('content')

    <!-- Search -->
    <section class="search pt-5 background-color: #eee;  py-4">
        <div class="container">
            <div  class="row">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <form action="{{ route('shop') }}" method="get">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Search" required >
                    </form>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-12 offset-sm-0">
                    <form action="{{ route('shop') }}" method="GET">
                        <select name="sort" id="sort" class="form-control" required>
                            <option value="">Sort by</option>
                            <option value="name_asc" >Name A-Z</option>
                            <option value="name_desc" >Name Z-A</option>
                            <option value="price_asc">Price L-H</option>
                            <option value="price_asc">Price H-L</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <!-- mobile shop -->
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                @if($products && count($products) > 0 )
                    @foreach($products as $product)
                <div class="col-md-12 col-lg-4 mb-4 mb-4">
                    <div class="card text-black">
                    <img width="150px" height="250px" src="{{ asset('storage/products/' .$product->image) }}"
                        class="card-img-top" alt="iPhone" />
                    <div class="card-body">
                        <div class="text-center mt-1">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <h6 class="text-primary mb-1 pb-3">Starting at {{ $product->price }}$</h6>
                        </div>

                        <div class="text-center">
                        <div class="p-3 mx-n3 mb-4" style="background-color: #eff1f2;">
                            <p class="mb-0">{{ substr($product->description, 0, 40)}}.... </p>
                        </div>


                        <div class="d-flex flex-column mb-4">
                            <span class="h1 mb-0">
                            <i class="fas fa-camera-retro"></i>
                            </span>
                            
                        </div>

                        <div class="d-flex flex-column mb-4">
                            <span class="h1 mb-0"><button class="btn btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        
                        <div style="background-color: {{ $product->color }}; width: 50px; height: 50px;"></div>
                    </button></span>
                            <span>Color</span>
                        </div>

                        <div class="p-3 mx-n3 mb-4" style="background-color: #eff1f2;">
                            <h5 class="mb-0">Capacity</h5>
                        </div>

                        <div class="d-flex flex-column mb-4 lead">
                        <b><small class="text-success">({{ $product->storage }}GB)</small></b>
                        </div>
                        </div>

                        <div class="d-flex ">
                
                            <form action="{{ route('cart.add', ['product' => $product->id]) }}" class="mx-auto" method="POST">
                                    @csrf
                                <a href="{{ route('products.show',['product' => $product->id]) }}" class="btn btn-primary">View Product</a>
                                <button type="submit" class="mr-4 btn btn-danger btn-rounded">Buy Now</button>
                                <input class="border p-1" value="1" type="hidden" name="qty" id="qty" min="1" max="{{ $product->qty }}">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                @else
                </div>
                @endif
                {{ $products->links()}}
            </div>
        </section>







@endsection

@section('js')
    document.getElementById('sort').addEventListener('change', (e) => {
        window.location.href = '?sort='+e.target.value
    })
@endsection

