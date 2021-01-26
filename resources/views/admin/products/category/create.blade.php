@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                {{ trans('global.create') }} {{ trans('global.category') }}
            </div>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="spanish-link">ES</a>
                </li>
            </ul>

            <form action="{{ route("admin.category.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body" id="english-form">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('en_category_name') ? 'has-error' : '' }}">
                            <label for="en_category_name">{{ trans('global.category_name') }} (EN)*</label>
                            <input type="text" id="en_category_name" name="en_category_name" class="form-control" value="{{ old('en_category_name', isset($category) ? $category->en_category_name : '') }}">
                            @if($errors->has('category_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('category_name') }}
                            </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.category_name_helper') }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group row">
                            <label for="category_image" >{{ trans('global.category_image') }}</label>
                            <div class="col-md-12">
                                <div class="input-group">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="category_image" name="category_image">
                                        <label class="custom-file-label" for="category_image">{{ trans('global.choose_file') }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="category_image">{{ trans('global.upload') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($category->category_image))
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <img src="/storage/images/category_image/{{ $category->category_image }}" width="100%" style="max-width: 250px;"/>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-12 mb-20">
                        <label for="collapsediv1" data-toggle="collapse" data-target="#collapsediv1" aria-controls="collapsediv1" aria-expanded="false" class="collapsed">Parent Category</label>
                        <input type='checkbox' data-toggle='collapse' name="cat_parent" data-target='#collapsediv1' id="collapsediv1"></input>
                        
                        <div id='collapsediv1' class='collapse div1'>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-12 {{ $errors->has('parent_cat') ? 'has-error' : '' }}">
                                    <!-- <label>Parent Category</label> -->
                                    <select class="form-control" name="parent_cat">
                                    <option value="null" selected disabled>Choose parent category</option>
                                        @foreach ($categories as $categoryparent)
                                        <option value="{{$categoryparent->id}}">{{$categoryparent->category_name}}</option>
                                            @foreach($categoryparent->children as $key => $child_cat)
                                            <option value="{{$child_cat->id}}">----{{$child_cat->category_name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('category') }}
                                    </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.product.fields.image_helper') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-check-label" for="showInHomePage">Show in home page</label>
                        <input type="checkbox" id="showInHomePage" onclick="myFunction()">
                    </div>
                    <div class="col-md-12 " style="display:none" id="positionInput">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                                    <label for="position">Position</label>
                                    <input type="number" id="position" name="position" class="form-control" value="{{ old('position', isset($category) ? $category->position : '') }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <img src="/img/category.PNG" width="100%" style="max-width: 390px;"/>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>

                </div>

                <div class="card-body d-none" id="spanish-form">
                    <div class="form-group {{ $errors->has('es_category_name') ? 'has-error' : '' }}">
                        <label for="es_category_name">{{ trans('global.category_name') }} (ES)*</label>
                        <input type="text" id="es_category_name" name="es_category_name" class="form-control" value="{{ old('es_category_name', isset($category) ? $category->translate('es')->category_name : '') }}">
                        @if($errors->has('category_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('category_name') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.category_name_helper') }}
                        </p>
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    var $englishForm = $('#english-form');
    var $spanishForm = $('#spanish-form');
    var $englishLink = $('#english-link');
    var $spanishLink = $('#spanish-link');

    $englishLink.click(function() {
        $englishLink.toggleClass('bg-aqua-active');
        $englishForm.toggleClass('d-none');
        $spanishLink.toggleClass('bg-aqua-active');
        $spanishForm.toggleClass('d-none');
    });

    $spanishLink.click(function() {
        $englishLink.toggleClass('bg-aqua-active');
        $englishForm.toggleClass('d-none');
        $spanishLink.toggleClass('bg-aqua-active');
        $spanishForm.toggleClass('d-none');
    });
</script>
<script>
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("showInHomePage");
  // Get the output text
  var inputBox = document.getElementById("positionInput");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    inputBox.style.display = "block";
  } else {
    inputBox.style.display = "none";
  }
}
</script>
@endsection
@endsection