@extends('/layouts.app')
@section('content')

<body id="default_theme" class="it_serv_shopping_cart shopping-cart">
	<!-- loader -->
	<div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /> </div>
	<!-- end loader -->
	<!-- inner page banner -->
	<div id="inner_banner" class="section inner_banner_section">
	  <div class="container">
		<div class="row">
		  <div class="col-md-12">
			<div class="full">
			  <div class="title-holder">
				<div class="title-holder-cell text-left">
				  <h1 class="page-title">Shopping Cart</h1>
				  <ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Shopping Cart</li>
				  </ol>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- end inner page banner -->
	<div class="section padding_layout_1 Shopping_cart_section">
	  <div class="container">
		<div>
			@if (session()->has('success_message'))
				<div class="alert alert-success">
					{{ session()->get('success_message') }}
				</div>
				
			@endif
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as$error )
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				
			@endif
			@if (Cart::count() > 0)
				
			<h2>{{ Cart::count() }} items in shopping cart</h2>
		</div>
		<div class="row">
		  <div class="col-sm-12 col-md-12">
			<div class="product-table">
			  <table class="table">
				<thead>
				  <tr>
					<th>Product</th>
					<th>Quantity</th>
					<th class="text-center">Price</th>
					<th class="text-center">Total</th>
					<th> </th>
				  </tr>
				</thead>
				@foreach (Cart::content() as $row)
				{{-- @php
				var_dump($row)
				@endphp --}}
				<tbody>
				
				
				  <tr>	
					
					<td class="col-sm-8 col-md-6">
						<div class="media"> <a class="thumbnail pull-left" href="/shop/{{ $row->id }}"> <img class="media-object" src="{{asset('storage/'.$row->model->image)}}" alt="#"></a>
							<div class="media-body">
						  	<h4 class="media-heading"><a href="/shop/{{ $row->id }}">{{ $row->name}}</a></h4>
						  	<span>Status: </span><span class="text-success">{{ $row->status }}</span> 
							</div>
					  	</div>
					</td>
					<div class="media">
						<td class="col-sm-1 col-md-1" style="text-align: center">
								<select class="quantity" name="quantity" id="">
									@for ($i = 1; $i < 5 + 1 ; $i++)
                                    	<option {{ $row->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                	@endfor
								</select>
						</td>
					</div>
					<td class="col-sm-1 col-md-1 text-center"><p class="price_table">{{ $row->price }}</p></td>
					<td class="col-sm-1 col-md-1 text-center"><p class="price_table">{{ $row->price }}</p></td>
					<td class="col-sm-1 col-md-1">

					<form action="{{ route('cart.destroy',$row->rowId) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="bt_main"><i class="fa fa-trash"> Remove</i></button>
						
					</form>	
					</td>
				  </tr>
				
				</tbody>
			  
			  @endforeach
			  <td><a href={{ route('cart.empty') }}><button type="button" class="button">delete all item</button></a></td>
			</table> 
			</div>
			<div class="shopping-cart-cart" style="background-color: black">
			  <table>
				<tbody>
				  <tr class="head-table">
					<td><h5>Cart Totals</h5></td>
					<td class="text-right"></td>
				  </tr>
				  <tr>
					<td><h4>Subtotal</h4></td>
					<td class="text-right"><h4>{{ Cart::subtotal() }}</h4></td>
				  </tr>
				  <tr>
					<td><h5 style="color: dimgray">TAX (11%)</h5></td>
					<td class="text-right"><h4>{{ Cart::tax() }}</h4></td>
				  </tr>
				  <tr>
					<td><h3>Total</h3></td>
					
					<td class="text-right"><strong> <h4> ${{ Cart::total() }}</h4></strong></td>
				  </tr>
				  <tr>
					<td><a href={{ route('shop.index') }}><button type="button" class="button">Continue Shopping</button></a></td>
					<td><a href={{ route('checkout.show') }}><button class="button">Checkout</button></td></a>
					
				  </tr>
				</tbody>
			  </table>
			  @else
			  <h3>no items in cart!</h3>
			  @endif
			</div>
		  </div>
		</div>
	  </div>
	</div>

	
</body>

@endsection()

@section('extra-js')
		<script src="{{ asset('js/app.js') }}"></script>
		<script>
			(function(){
				const classname = document.querySelectorAll('.quantity')
				Array.from(classname).forEach(function(element) {
					element.addEventListener('change', function() {
						axios.patch(`/cart/5`, {
                        quantity: 3,
                        
                    })
                    .then(function (response) {
                        console.log(response);
                        
                    })
                    .catch(function (error) {
                        console.log(error);
                        
                    });
                })
            })
        })();
		</script>


@endsection