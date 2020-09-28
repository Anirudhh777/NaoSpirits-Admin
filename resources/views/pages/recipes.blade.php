@extends('layouts.app', ['activePage' => 'recipes', 'titlePage' => __('Recipes')])

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
                    <a class="nav-link active" href="{{ route('addRecipe') }}">
                      <i class="material-icons">add_circle</i> Add
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">code</i> Website
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">cloud</i> Server
                        <div class="ripple-container"></div>
                      </a>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <tbody>

                      @foreach($recipes as $recipe)
                      <tr>

                        <td class="recipeName">{{ $recipe->name }}</td>
                        <td class="td-actions text-right recipeCTA">
                          <button type="button" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#editRecipe{{ $recipe->id }}">
                            <i class="material-icons">edit</i>
                          </button>

                          <button type="button" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#delRecipe{{ $recipe->id }}">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <div id="delRecipe{{ $recipe->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-body">
                              <p>Delete Recipe?</p>
                              <a href="/delete_recipe/{{ $recipe->id }}" class="confirmbtn">Yes</a><a href="" class="confirmbtn" data-dismiss="modal">No</a>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div id="editRecipe{{ $recipe->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Recipe</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                               
                            </div>
                            <div class="modal-body">
                              <form role="form" method="POST" action="{{ route('edit_recipe') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card recipeFormDiv">

                                  <div class="card-body ">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <input class="form-control" name="name" id="input-name" type="text" value="{{ $recipe->name }}" required="true" aria-required="true"/>

                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <input class="form-control" name="video_url" id="input-videourl" type="text" value="{{ $recipe->video_url }}" />

                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <textarea class="form-control ckeditor" name="summary-ckeditor{{ $recipe->id }}">{{ $recipe->steps }}</textarea>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group cocktailimg">
                                         <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile" name="image">
                                          <input type="hidden" name="imageOld" value="{{ $recipe->image }}">
                                           <input type="hidden" name="recipeId" value="{{ $recipe->id }}">
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
@endsection
