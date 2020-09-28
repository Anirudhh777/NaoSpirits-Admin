@extends('layouts.app', ['activePage' => 'playlists', 'titlePage' => __('Playlist Form')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('submit_playlist') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
           <div class="card playlistFormDiv">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Playlist') }}</h4>
             
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Playlist Name') }}" required="true" aria-required="true"/>
                     
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control" name="spotify" id="input-videourl" type="text" placeholder="{{ __('Spotify URL') }}"/>
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" name="description" placeholder="Short Description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group cocktailimg">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Upload Playlist Thumbnail</label>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary savebtn">{{ __('Save') }}</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
