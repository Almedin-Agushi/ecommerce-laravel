@extends('layouts.front')

@section('title', 'Home')



@section('content')

    <!-- Slider -->
    @if($slides && count($slides) > 0 )
    <div id="carouselExampleCaptions" class="carousel slide ">
        <div class="carousel-inner">

                @foreach($slides as $slide)
                    <div class="carousel-item active">
                            <img src="{{ asset('storage/slides/' .$slide->image) }}" class="d-block w-100" alt="{{ $slide->title }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slide->title }}</h5>
                            <p>{{ $slide->subtitle }}</p>
                        </div>
                    </div>
                    @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @endif


    <div class="col-md-9 col-lg-9"></div>
    <div class="col-md-3 col-lg-3"></div>

    <!-- Latest Products (4) -->


    <section class="latest-products py-5 mb-4">
        <div class="container-fluid">
            <h2 class="mb-5 text-center"> Latest Products</h2>
                <div  class="row">


                        <div class="col-md-1 col-lg-1">

                             <div class="card">

                                <h5>sidebar</h5>
                                @foreach ($categories as $category)
                                <div class="card-body">
                                    <p>{{$category->id}}</p>
                                    <button class="d-block mx-auto"><a href="http://127.0.0.1:8000/products/category/{{$category->id}}" class="btn btn-primary ">{{ $category->name }}</a>  </button>

                                </div>
                                @endforeach
                            </div>

                         </div>











                    @if($products && count($products) > 0 )
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-3 col-sm-12  h-75 mb-5">
                            <div class="card">
                                <img src="{{ asset('storage/products/' .$product->image) }}" class="mx-auto" width="150px" height="120px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $product->name }}</h5>
                                    <p class="card-text text-center">{{ substr($product->description, 0, 70) }} <a href="{{ route('products.show',['product' => $product->id]) }}">Read more</a></p>

                                    <div class="d-flex mx-auto">
                                        <h6 class=" mx-auto">Price: <b>{{ $product->price }}$</b></h6>
                                    <p class="card-text "></p>
                                    </div>
                                    <button class="d-block mx-auto"><a href="{{ route('products.show',['product' => $product->id]) }}" class="btn btn-primary ">View More</a></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $products -> links()}}
                    @else
                    {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="alert alert-warning" role="alert">
                            0 products
                        </div>
                    </div> --}}
                    @endif
            </div>
        </div>
    </section>



    <div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-3">

    <span>Hottest Giveaways</span>
    <span class="custom-badge text-uppercase">See More</span>

</div>



<div class="row">

    <div class="col-md-4">

        <div class="card">

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex flex-row align-items-center time">



                </div>

                <img src="https://sathya.in/media/3420/catalog/mobiles.jpg" width="400">

            </div>


            <div class="text-center">

                <img src="https://i.imgur.com/TbtwkyW.jpg" width="250">
            </div>

            <div class="text-center">

                <h5>Amazon Echo</h5>
                <span class="text-success">$200 value</span>


            </div>

        </div>

    </div>



    <div class="col-md-4">

        <div class="card">

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex flex-row align-items-center time">



                </div>

                <img src="https://i.pcmag.com/imagery/articles/00Cx7vFIetxCuKxQeqPf8mi-23..v1643131202.jpg" width="400">

            </div>

            <div class="text-center">

                <img src="https://i.imgur.com/aTqSahW.jpg" width="250">
            </div>


            <div class="text-center">

                <h5>Kruve Coffee Filters</h5>
                <span class="text-success">$80 value</span>


            </div>


        </div>

    </div>




    <div class="col-md-4">

        <div class="card">

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex flex-row align-items-center time">



                </div>

                <img src="https://sathya.in/media/3420/catalog/mobiles.jpg" width="400">

            </div>


            <div class="text-center">

                <img src="https://i.imgur.com/aTqSahW.jpg" width="250">
            </div>

            <div class="text-center">

                <h5>Apple watch 2.0</h5>
                <span class="text-success">$360 value</span>


            </div>

        </div>

    </div>

</div>


</div>



    <!-- Into -->
    <section class="intro py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <img src="https://ub1doy938d.gjirafa.net/storage/images/serie/homepage-desktop/pranvere-e-paharruar-ne-fshatin-e-harruar.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h3>M-Shop</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, minus sunt. Delectus officia dolor aperiam.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, minus sunt. Delectus officia dolor aperiam.</p>
                        <a href="#" class="bg-red-200">Read More</a>
                        <button class="bg-red-200 p-4">sdsd</button>
                    </div>
                </div>
            </div>
    </section>



@endsection
