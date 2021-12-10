@extends('/layouts.app')
@section('extra_css')

<script src="https://js.stripr.com/v3/"></script>

@endsection()

@section('content')
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="title-holder">
              <div class="title-holder-cell text-left">
                <h1 class="page-title">Checkout</h1>
                <ol class="breadcrumb">
                  <li><a href="/">Home</a></li>
                  <li><a href="/cart">Cart</a></li>
                  <li class="active">Checkout</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end inner page banner -->

  

    <div class="container">
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>

            <span class="cart-count">
                @if (Cart::instance('default')->count()>0)  
                <span class="badge badge-secondary badge-pill">{{ Cart::instance('default')->count() }}</span></span>
                @endif
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Product</h6>
                    <small class="text-muted"></small>
                </div>
                <span class="text-muted">Qty</span>
                <span class="text-muted">Price</span>
                </li>
            @foreach (Cart::content() as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">{{ $item->name }}</h6>
                   
                </div>
                <span class="text-muted">{{ $item->qty}}</span>
                <span class="text-muted">{{ $item->price}}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted">Total (USD)</span>
              <strong class="text-muted">${{ Cart::total() }}</strong>
            </li>
          </ul>

          <form class="card p-2" action="" >
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          
          <form class="needs-validation" novalidate action={{ route('checkout.store') }} >
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="firstName" placeholder="{{ auth()->user()->name }}" value="" required>
                <input type="hidden" name="u_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="u_email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="u_Address" value="{{ auth()->user()->Address }}">
                <input type="hidden" name="u_name" value="{{ auth()->user()->name }}">
                <input type="hidden" name="c_total" value="{{ Cart::total() }}">
              </div>
            </div>
            <hr class="mb-4">
            <h4 class="mb-3">Payment</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-3">
            <button class="btn btn-primary btn-lg btn-block" type="submit" style="text-align: center">Continue to checkout</button>
          </form>
        </div>
      </div>
    </div >
    <hr class="mb-3">
    
@endsection()