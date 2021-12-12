@extends('/layouts.app')
@section('content')
<div class="container">
    <div class="main-body">    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4 style="color: black">{{ auth()->user()->name }}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <form action={{ route('user.update') }} method="POST" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                 <input type="text" value="{{ auth()->user()->name }}" name="username">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                               <input type="email" value="{{ auth()->user()->email }}" name="email"> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                               <input type="tel" value="{{ auth()->user()->phonenumber }}" name="phonenumber">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" value=" {{ auth()->user()->Address }}" name="address">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">New Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                               <input type="password" name="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Confirm new password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" name="password_confirmation">
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" value="{{ auth()->user()->id }}" name="userid">
                        <div class="row">
                            <div class="col-sm-12">
                                
                                    <button type="submit " class="btn btn-info " >Edit</button>
                                    {{-- <a class="btn btn-info " target="__blank" href=""></a> --}}
                                
                            </div>
                        </div>

                    </form>
                </div>
              </div>
            </div>
            {{-- <div class="col-md-100">
              <div class="row gutters-sm">
                <div class="col-sm-13 mb-3">
                  <div class="card h-200">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Your Orders</i> </h6>
                      <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">Name</th>
                          <th scope="col">Address</th>
                          <th scope="col">Totall</th>
                        </tr>
                      </thead>
                        @foreach ($orders as $orders)                           
                        <tbody>
                              <tr>
                                <th scope="row">{{ $orders->order_id }}</th>
                                <td>{{ $orders->billing_name }}</td>
                                <td>{{ $orders->billiing_address }}</td>
                                <td>{{ $orders->billing_total }}</td>
                              </tr>
                            </tbody>
                         
                          @endforeach
                        </table>
                        </div>
                  </div>
                </div>
              </div>
              </div>
          
            </div> --}}
      </div>
            <div class="card mb-3">
              <div class="card-body">
                     <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Address</th>
                          <th scope="col">product</th>
                          <th scope="col">Totall</th>
                          <th scope="col">Status</th>
                          
                        </tr>
                      </thead>
                        @foreach ($orders as $orders)                           
                        <tbody>
                              <tr>
                                <th scope="row">{{ $orders->order_id }}</th>
                                <td>{{ $orders->billing_name }}</td>
                                <td>{{ $orders->billing_email }}</td>
                                <td>{{ $orders->billing_address }}</td>
                                {{-- <td>{{ $orders->items->displayname }}</td> --}}
                                <td>{{ $orders->billing_total }}</td>
                                <td>
                                  @if ($orders->shipped == "1")
                                  <br> </span>status:<span class="text-success">shiped</span> 
                                @else
                                  <br><span>Status: </span><span class="text-danger">not shiped</span>
                                @endif
                                </td>
                              </tr>
                            </tbody>
                         
                          @endforeach
                        </table>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
  
@endsection

