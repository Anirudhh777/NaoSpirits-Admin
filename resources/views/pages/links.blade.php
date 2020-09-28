@extends('layouts.app', ['activePage' => 'links', 'titlePage' => __('Links')])

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
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="profile">
                <table class="table">
                  <tbody>

                    @foreach($links as $link)
                    <tr>

                      <td class="recipeName">{{ $link->name }}</td>
                      <td class="td-actions text-right recipeCTA">
                        <button type="button" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#editLink{{ $link->id }}">
                          <i class="material-icons">edit</i>
                        </button>

                        <button type="button" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#delLink{{ $link->id }}">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <div id="delLink{{ $link->id }}" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-body">
                            <p>Delete Link?</p>
                            <a href="/delete_link/{{ $link->id }}" class="confirmbtn">Yes</a><a href="" class="confirmbtn" data-dismiss="modal">No</a>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div id="editLink{{ $link->id }}" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-md">

                        <!-- Modal content-->
                        <div class="modal-content">
                         
                          <div class="modal-body">
                            <form role="form" method="POST" action="{{ route('edit_link') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body linksEdit">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <input class="form-control" name="name" id="input-name" type="text" value="{{ $link->name }}" required="true" aria-required="true"/>
                                    <input class="form-control" name="url" id="input-url" type="text" value="{{ $link->url }}" required="true" aria-required="true"/>
                                    <input type="hidden" name="id" value="{{ $link->id }}">
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
                 @endforeach
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
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
                         <option value="{{ $country->id }}" selected="">{{ $country->country }}</option>
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
@endsection
