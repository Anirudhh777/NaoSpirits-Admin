@extends('layouts.app', ['activePage' => 'teams', 'titlePage' => __('Teams')])

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
                      <i class="material-icons">add_circle</i> Add Personel
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item countryBtn">
                    <a class="nav-link active" href="#" data-toggle="modal" data-target="#addDept">
                      <i class="material-icons">add_circle</i> Add Department
                      <div class="ripple-container"></div>
                    </a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div id="addDept" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                 <form role="form" method="POST" action="{{ route('add_dept') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name" type="text" placeholder="Enter Department Name" required="true" aria-required="true"/>
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

               <form role="form" method="POST" action="{{ route('add_personel') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body ">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input class="form-control" name="name" id="input-name" type="text" placeholder="Enter Name" required="true" aria-required="true"/>
                        <input class="form-control" name="bio" id="input-url" type="text" placeholder="Enter Bio" required="true" aria-required="true"/>
                        
                        <select class="selectpicker" title="Select Department" name="deptid">
                         <option disabled="" selected="">Select Department</option>
                         @foreach($data as $data)
                         <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
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
          @foreach($content as $dept)
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-body">
                  <h4 class="card-title">{{ $dept['name'] }}</h4>
                      <a href="/personel/{{ $dept['id'] }}" class="pageenter"> <span class="material-icons">
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
