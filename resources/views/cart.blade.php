@extends('layouts.front')

@section('title', 'Cart')



@section('content')


    <!-- Cart (4)   nese useri o i identifikum shfaqi-->
          
    <section class="cart py-5">
        <div class="container">
        
            @if(count(Cart::getContent()) > 0)
            <div class="table-responsive">
            <h2 class="mb-5 text-center"> Cart</h2>
                        @if( Session::has('cart_status') )
                            <p style="color: red">{{ Session::get('cart_status') }}</p>   
                        @endif
            <table class="table">                                   
                <thead>
                    <tr>
                    <th scope="col">Product</th>
                    <th scope="col" class="text-center" width="15%">Qty</th>
                    <th scope="col" class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                @foreach(\Cart::getContent()->sortByDesc('quantity') as $item)
                    <tr>
                    <td>{{ $item->name }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('cart.dec', ['item' => $item->id]) }}" class="btn btn-sm btn-outline-primary">-</a>
                        <p>{{ $item->quantity}}</p>
                        <a href="{{ route('cart.inc', ['item' =>$item->id]) }}" class="btn btn-sm btn-outline-primary">+</a>
                    </td>
                    <td class="text-end">{{$item -> quantity * $item -> price}} Euro</td>   <!-- sasia shumzohet me qmimin -->
                    </tr>
                        
                    @endforeach


                    <tr>
                        <td  colspan="3" class="text-end "> <strong>{{ number_format(\Cart::getTotal(),2, ".", "") }}Euro </strong></td>
                        </tr>
                </tbody>
            </table>
            </div>
            @else 
            <p>Cart is empty</p>
            @endif




                <!-- CheckOut -->
                @auth 
                @if(count(\Cart::getContent()) > 0)
                <h3 class="mt-5">Checkout</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
                
                <h3 class="mt-5 text-center">CheckOut</h3>
            <form action="{{ route('cart.checkout') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Fullname </label>
                    <input type="text" name="fullname" class="form-control" id="" required/>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email </label>
                    <input type="email" name="email" class="form-control" id="" required/>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone </label>
                    <input type="text" name="phone" class="form-control" id="" required/>
                </div>
                <button class="btn btn-outline-primary">Submit</button>
            </form>
            @endif
            @endauth


            @guest
            @if(count(\Cart::getContent()) >0 )
            <h4 class="text-center">Please <a href="{{ route('login') }}"> Login </a>if you want to add product</h4>
            @endif
            @endguest
        </div>
    </section>




@endsection
