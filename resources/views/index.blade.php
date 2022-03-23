@extends('/layouts.app')
@section('content')
{{-- start carousel --}}

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('images/carousel/iphone 13 promax.jpg') }}" alt="First slide" width="500" height="400">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images/carousel\samsung s21 ultra.jpg') }}" alt="Second slide"  width="500" height="400">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images\carousel\alienware laptop.jpg') }}" alt="Third slide"  width="500" height="400">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
{{-- end carousel  --}}
<div class="container py-5">
        <div class="row text-center text-white mb-5">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4" style="color: whitesmoke">FEATURED PRODUCTS</h1>
            </div>
        </div>   
        <div class="row">
            {{-- hone beda terkab for each  --}}
            @foreach ($products as $product)
                <div class="col-lg-8 mx-auto mt-1 ">
                        <li class="list-group-item">
                            <!-- Custom content-->
                            <div class="media align-items-lg-center flex-column flex-lg-row p-3 bg-dark">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-1 font-weight-bold mb-4"><a href="/shop/{{ $product->id }}" class="text-default mb-2">{{ $product->displayname}}</a></h5>
                                    <p class="font-italic text-muted mb-0 small">{!!$product->description!!}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2">${{ $product->price }}</h6>
                                    </div>
                                    <form action="{{ route('cart.store') }}" method="post">
                                        {{ csrf_field() }}
                                          <input type="hidden" name="id" value="{{ $product->id }}">
                                          <input type="hidden" name="name" value="{{ $product->displayname }}">
                                          <input type="hidden" name="price" value="{{ $product->price }}">
                                          <input type="hidden" name="image" value="{{ $product->image }}">
                                          <input type="hidden" name="status" value="{{ $product->status }}">
                                          <input type="hidden" name="quantity" value="1">
                                          <button type="submit" class="btn bg-dark bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                                    </form>
                                    </div><img src={{asset('storage/'.$product->image)}}   alt="featured product images" width="200" class="ml-lg-5 order-1 order-lg-2">
                            </div> <!-- End -->
                        </li> <!-- End -->
                    </ul> <!-- End -->
                </div>
            @endforeach
        </div>    
        {{-- hone byekhlas l products --}}

    </div>
    <div class="text-center button-container ">
        <a href="/shop" style="color: whitesmoke">View more products</a>
   </div>
@endsection()