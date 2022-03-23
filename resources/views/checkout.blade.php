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
              <div class="text-left title-holder-cell">
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
        <div class="mb-4 col-md-4 order-md-2">
          <h4 class="mb-3 d-flex justify-content-between align-items-center">
            <span class="text-muted">Your cart</span>

            <span class="cart-count">
                @if (Cart::instance('default')->count()>0)  
                <span class="badge badge-secondary badge-pill">{{ Cart::instance('default')->count() }}</span></span>
                @endif
          </h4>
          <ul class="mb-3 list-group">
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


        </div>
        <div class="col-md-8 order-md-1">
          
          <form class="needs-validation" novalidate action={{ route('checkout.store') }} >
            {{ csrf_field() }}
            <div class="row">
              <div class="mb-3 col-md-6">
               
                {{-- <input type="hidden" name="u_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="u_email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="u_Address" value="{{ auth()->user()->Address }}">
                <input type="hidden" name="u_name" value="{{ auth()->user()->name }}">
                <input type="hidden" name="u_phone" value="{{ auth()->user()->phonenumber }}"> --}}
                <input type="hidden" name="c_total" value="{{ Cart::total() }}">
              </div>
            </div>
            <hr class="mb-4">
            <h4 class="mb-3">Payment</h4>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="mb-3 col-md-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
              <hr>
              <br>
              

            </div>
            <hr class="mb-3">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="cc-name">NAME</label>
                <input type="text" class="form-control" id="cc-name" name="u_name" value="{{ auth()->user()->name }}" required>
                <small class="text-muted">Full name as displayed on card</small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="cc-number">Address</label>
                <input type="text" class="form-control" id="cc-number" name="u_Address" value="{{ auth()->user()->Address }}" required>
                <div class="invalid-feedback">
                  Address is required
                </div>
              </div>
            </div>

            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="cc-name">phone</label>
                <input type="number" class="form-control" id="cc-name" name="u_phonenumber" value="{{ auth()->user()->phonenumber }}" required >
                <small class="text-muted">phone number</small>
              </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" style="text-align: center">Continue to checkout</button>
          </form>
        </div>
      </div>
    </div >
    <hr class="mb-3">
    
@endsection()