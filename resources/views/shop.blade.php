@extends('/layouts.app')
@section('content')
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="title-holder">
              <div class="title-holder-cell text-left">
                <h1 class="page-title">Shop Page</h1>
                <ol class="breadcrumb">
                  <li><a href="/">Home</a></li>
                  <li class="/shop">Shop</li>
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
        <div class="col-md-4 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src={{asset('storage/'.$product->image)}} class="product iamge" width="330" height="220" alt=""> </div>
                </div>
                <div class="card-body bg-dark text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="/shop/{{ $product->id }}" class="text-default mb-2" data-abc="true">{{ $product->displayname}}</a> </h6> <a href="#" class="text-muted" data-abc="true">{{ $product->brand}}</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">${{ $product->price}}</h3>
                    <form action="{{ route('cart.store') }}" method="post">
                    {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $product->id }}">
                      <input type="hidden" name="name" value="{{ $product->displayname }}">
                      <input type="hidden" name="price" value="{{ $product->price }}">
                      <input type="hidden" name="image" value="{{ $product->image }}">
                      <input type="hidden" name="status" value="{{ $product->status }}">
                      <button type="submit" class="btn bg-dark bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection()