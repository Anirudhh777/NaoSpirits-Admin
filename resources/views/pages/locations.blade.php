@extends('layouts.app', ['activePage' => 'locations', 'titlePage' => __('Locations')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <!-- <span class="nav-tabs-title">Tasks:</span> -->
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#" data-toggle="modal" data-target="#addLink">
                      <i class="material-icons">add_circle</i> Add Link
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item countryBtn">
                    <a class="nav-link active" href="#" data-toggle="modal" data-target="#addCountry">
                      <i class="material-icons">add_circle</i> Add Country
                      <div class="ripple-container"></div>
                    </a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div id="addCountry" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                 <form role="form" method="POST" action="{{ route('add_country') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name" type="text" placeholder="Enter Country Name" required="true" aria-required="true"/>
                          <button type="submit" class="btn btn-primary savebtn countrysave">{{ __('Save') }}</button>
                          <button type="submit" class="btn btn-primary savebtn countrysave" data-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>

          </div>
        </div>
        <div id="addLink" class="modal fade" role="dialog">
          <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-body">

               <form role="form" method="POST" action="{{ route('add_link') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body ">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input class="form-control" name="name" id="input-name" type="text" placeholder="Enter Name" required="true" aria-required="true"/>
                        <input class="form-control" name="url" id="input-url" type="text" placeholder="Enter URL" required="true" aria-required="true"/>
                        
                        <select class="selectpicker" title="Select Country" name="country">
                         <option disabled="" selected="">Select Country</option>
                         @foreach($data as $data)
                         <option value="{{ $data['id'] }}">{{ $data['country'] }}</option>
                         @endforeach
                       </select>
                       <button type="submit" class="btn btn-primary savebtn countrysave">{{ __('Save') }}</button>
                       <button type="submit" class="btn btn-primary savebtn countrysave" data-dismiss="modal">{{ __('Close') }}</button>
                     </div>
                   </div>
                 </div>
               </div>

             </form>
           </div>
         </div>

       </div>
     </div>
     
     <div class="content dashpills countrycard">
      <div class="container-fluid">
        <div class="row">
          @foreach($content as $content)
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-body">
                  <h4 class="card-title">{{ $content['country'] }}</h4>
                      <a href="/links/{{ $content['id'] }}" class="pageenter"> <span class="material-icons">
                      arrow_right_alt
                      </span></a>
                     
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>
</div>
@endsection
