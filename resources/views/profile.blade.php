@extends('/layouts.app')
@section('content')
<div class="container">
    <div class="main-body">    
          <div class="row gutters-sm">
            <div class="mb-3 col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="text-center d-flex flex-column align-items-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4 style="color: black">{{ auth()->user()->name }}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>



              <div class="container">
                     @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{session()->get('success_message')}}
                    </div>
                    @endif

                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
              </div>
            
            <div class="col-md-8">
              <div class="mb-3 card">
                <div class="card-body">
                    <form action={{ route('user.update') }} method="POST" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                 <input type="text" value="{{ auth()->user()->name }}" name="name">
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
                                <input type="text" value=" {{ auth()->user()->Address }}" name="Address">
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

      </div>
            <div class="mb-3 card">
              <div class="card-body">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Order Id</th>
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
                                <th scope="row">{{ $orders->id }}</th>
                                <td>{{ $orders->billing_name }}</td>
                                <td>{{ $orders->billing_email }}</td>
                                <td>{{ $orders->billing_address }}</td>
                                <td>@foreach ($orders->items  as $item)
                                    <ul>
                                      <li>- {{$item->displayname}}</li>
                                    </ul>
                                @endforeach</td>
                                <td>{{ $orders->billing_total }} $</td>
                                <td>
                                  @if ($orders->shipped == "1")
                                  Status: <span class="text-success">Shiped</span> 
                                @else
                                  Status: <span class="text-danger">Not Shiped</span>
                                @endif
                                </td>
                              </tr>
                            </tbody>
                            
                          @endforeach
                        </table>

                        <table class="table table-dark">
                          <thead>
                            <tr>
                              <th scope="col">Appointment ID</th>
                              <th scope="col">Subject</th>
                              <th scope="col">Description</th>
                              <th scope="col">Date</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          @foreach ($appointments as $appointment)
                            <tbody>
                                  <tr>
                                    <th scope="row">{{ $appointment->id }}</th>
                                    <td>{{ $appointment->subject }}</td>
                                    <td>{{ $appointment->description }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->status }}</td>
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

