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




{{-- filter --}}
<form method="GET" action="{{route('search')}}">
<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="row">
      <div class="col">
        Type
        <select name="type" id="type">
              <option value="">Please select an option</option>
          @foreach ($type as $type)
              <option value="{{ $type->type }}">{{ $type->type }}</option>
          @endforeach
        </select>
      </div>
      <div class="col">
        Brand
        <select name="brand" id="brand">
              <option value="">Please select an option</option>
          @foreach ($brand as $brand)
              <option value="{{ $brand->brand }}">{{ $brand->brand }}</option>
          @endforeach
        </select>
      </div>
      <div class="col">
        Status:
        <br>
        <input type="radio" id="new" name="status" value="NEW">
          <label for="new">New</label><br>
        <input type="radio" id="used" name="status" value="USED">
          <label for="used">Used</label><br>
        <input type="radio" id="new" name="status" value="">
          <label for="">All</label><br>  
      </div>
      <div class="col">
        <button type="submit"> Search </button>

      
      </div>
    </div>
  </div>
</div>
</form>
{{--  end filter --}}
<div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mt-1">
            <div class="card">
                <div class="card-body">
                  <div class="card-img-actions"> <img src={{asset('storage/'.$product->image)}} class="product iamge" width="300" height="200" alt=""> </div>
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
        </div>
        @endforeach
       
    </div>
</div>
 {{ $products->links()}}
@endsection()