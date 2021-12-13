@extends('/layouts.app')
@section('content')


<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="title-holder">
              <div class="text-left title-holder-cell">
                <h1 class="page-title">Make	Appointment</h1>
                <ol class="breadcrumb">
                  <li><a href="index.html">Home</a></li>
                  <li class="active">Make	Appointment</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end inner page banner -->
  <div class="section padding_layout_1">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="full">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main_heading text_align_center">
                  <h2>Make	Appointment</h2>
                </div>
              </div>
              
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 appointment_form">
                <div class="form_section">
                  <form method="POST" class="" action={{ route('appointment.store') }} >
                    {{ csrf_field() }}
                    <fieldset class="row">
                    <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <input type="text" class="field_custom" placeholder="Subject" type="text" name="subject" required>
                    </div>
                    <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <textarea class="field_custom" placeholder="Description" name="desc" required></textarea>
                    </div>

                    <span for="start" class="mr-2">Appointment Date:   </span>
                    <input type="date"  name="date">

                    <div class="center">
                      <input type="hidden" value="2">
                      <button type="submit" class="btn main_bt">SUBMIT NOW</button>
                    
                    </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- section -->

  @endsection()