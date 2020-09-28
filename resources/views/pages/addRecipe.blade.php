@extends('layouts.app', ['activePage' => 'recipes', 'titlePage' => __('Recipe Form')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('submit_recipe') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
           <div class="card recipeFormDiv">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Recipe') }}</h4>
             
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
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Recipe Name') }}" required="true" aria-required="true"/>
                     
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control" name="video_url" id="input-videourl" type="text" placeholder="{{ __('Video URL') }}"/>
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" name="summary-ckeditor">Add Content Here</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group cocktailimg">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Upload Cocktail Image</label>
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
