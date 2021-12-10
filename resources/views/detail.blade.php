@extends('/layouts.app')
@section('content')

<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="title-holder">
              <div class="title-holder-cell text-left">
                <h1 class="page-title">Shop Detail</h1>
                <ol class="breadcrumb">
                  <li><a href="index.html">Home</a></li>
                  <li class="active">Shop Detail</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            @foreach ($products as $product)
            <div class=" ">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions"> <img src={{asset('storage/'.$product->image)}} class="product iamge" width="400" height="350" alt=""> </div>
                    
                    <div class="card-body bg-dark text-center">
                        <div class="mb-3">
                            <h6 class="font-weight-semibold mb-2"> {{ $product->id }}
                              {{!! $product->description !!}} </h6> {{ $product->brand}}

                        </div>
                        <h3 class="mb-0 font-weight-semibold">${{ $product->price}}</h3>
                        
                        <form action="{{ route('cart.store') }}" method="post">
                          {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->displayname }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="image" value="{{ $product->image }}">
                            <button type="submit" class="btn bg-dark bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                          </form>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach

    </div>
    </div>
    
@endsection()