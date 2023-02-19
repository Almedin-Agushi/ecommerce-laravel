@extends('layouts.front')

@section('title')
      {{ $product->name}}
@endsection

@section('content')
<div class="container mt-4"  >
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Rounded Chair</h3>
            <div class="row">
            @if($product)
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img src="{{ asset('storage/products/' .$product->image) }}" width="80%" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">{{ $product->name }}</h4>
                    <p> {{ $product->description }}</p>      
                    <h2 class="mt-5">
                    {{ $product->price }}$<small class="text-success">({{ $product->storage }}GB)</small>
                    </h2>
                    <h5 class="mt-5">
                    Product in Stock    <small class="text-success">{{ $product->qty }}</small>
                    </h5>
                    <button class="btn btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart">Color</i>
                        <div style="background-color: {{ $product->color }}; width: 50px; height: 50px;"></div>
                    </button>
                    
                    <h3 class="box-title mt-5">Key Highlights</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                        <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                        <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                    </ul>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            @if( Session::has('status'))
                                {{ Session::get('status')}}
                            @endif
                            <form action="{{ route('cart.add', ['product' => $product->id]) }}"  method="POST">
                                @csrf
                                <input class="border p-1" value="1" type="number" name="qty" id="qty" min="1" max="{{ $product->qty }}">
                                <button type="submit" class="btn btn-primary btn-rounded">Buy Now</button>
                            </form>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">General Info</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390">Brand</td>
                                    <td>Stellar</td>
                                </tr>
                                <tr>
                                    <td>Delivery Condition</td>
                                    <td>Knock Down</td>
                                </tr>
                                <tr>
                                    <td>Seat Lock Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>Office Chair</td>
                                </tr>
                                <tr>
                                    <td>Style</td>
                                    <td>Contemporary&amp;Modern</td>
                                </tr>
                                <tr>
                                    <td>Wheels Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Upholstery Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Upholstery Type</td>
                                    <td>Cushion</td>
                                </tr>
                                <tr>
                                    <td>Head Support</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Suitable For</td>
                                    <td>Study&amp;Home Office</td>
                                </tr>
                                <tr>
                                    <td>Adjustable Height</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Model Number</td>
                                    <td>F01020701-00HT744A06</td>
                                </tr>
                                <tr>
                                    <td>Armrest Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Care Instructions</td>
                                    <td>Handle With Care,Keep In Dry Place,Do Not Apply Any Chemical For Cleaning.</td>
                                </tr>
                                <tr>
                                    <td>Finish Type</td>
                                    <td>Matte</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <section>
  
    
<section style="background-color: #e7effd;">
  <div class="container my-5 py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-11 col-lg-9 col-xl-7">
        <div class="d-flex flex-start mb-4">
          <div class="card w-100">
            <div class="card-body p-4">
            @auth
                    @forelse($comments as $comment)
              <div class="">
                    <div class="d-flex">
                        <img class="rounded-circle shadow-1-strong me-3"
                            src="https://us.123rf.com/450wm/urfandadashov/urfandadashov1806/urfandadashov180601827/urfandadashov180601827.jpg?ver=6" alt="avatar" height="45"
                            height="65" />
                        <h5 class="pt-2">{{ $comment->user->name}}</h5>
                    </div>
                 <p><b> {{ $comment->body }}</b></p>
                    <p class="small">{{ $comment->created_at->diffForHumans() }}</p>
                 @if (Auth::user()->id == $comment->user_id)
                <div class="d-flex">
                        <button class="btn btn-primary mr-2" id="updateButton-{{ $comment->id }}">Edit</button>
                        <!-- Display the update form -->
                        <div class="update-form-{{ $comment->id }}" style="display: none;">
                            <form action="{{ route('comment.update', ['comment' => $comment->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <textarea name="comment" class="form-control">{{ $comment->body }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Comment</button>
                            </form>
                        </div>
                        
                   <!-- JavaScript to show/hide the update form -->
                    <script>
                        document.getElementById("updateButton-{{ $comment->id }}").addEventListener("click", function() {
                            document.querySelector(".update-form-{{ $comment->id }}").style.display = "block";
                        });
                    </script>
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                    @endif
                            <br>
                        @empty
                            <p>No comments yett</p>
                        @endforelse    
                </div>
                    </div>
                   
                        
                        <div class="min-w-0 flex-1">
                            <form action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <div>
                                <input type="hidden" name="product_id" value="{{  $product->id }}"/>
                                <textarea id="comment" name="comment" rows="3" class="form-control" placeholder="Write something"></textarea>
                                
                                @error('newCommentState.body')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                                
                                <p class="mt-2 text-sm text-red-500"></p>
                            
                            </div>
                            <div class="mt-3 ">
                                <button type="submit" class="btn btn-primary">
                                Commentt
                                </button>
                            </div>
                            </form>
                        </div>
                        </div>
                        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      @endauth
      @guest
      <div class="card-body p-4">
            <h4 class="text-center mb-4 pb-2"><p>Log in to comment</p></h4>
            <h5 class="text-center">Please <a href="{{ route('login') }}"> Login </a>if you want to comment</h5>
        </div>
      @endguest
    </div>
  </div>
</section>
</div>
@endsection

