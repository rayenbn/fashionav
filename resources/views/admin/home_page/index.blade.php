@extends('layouts.admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="box-title">Home Page</h3>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="spanish-link">ES</a>
                    </li>
                </ul>
                <!-- /.box-header -->
                @if($homepage)
                <form action='{{ route("admin.home-page.update", [$homepage->id]) }}' method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @else
                <form action="{{ route("admin.home-page.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @endif
                        <div class="card-body" id="english-form">
                            <!-- section 1 products -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label  class="col-md-2 col-form-label ">First section</label>
                                        <div class="col-md-10">
                                            <div class="input-group">

                                                <div class="form-group col-sm-6 {{ $errors->has('sec1_title') ? 'has-error' : '' }}">
                                                    <label for="en_sec1_title">{{ trans('global.homepage.fields.title') }} (EN)</label>
                                                    <input type="text" id="en_sec1_title" name="en_sec1_title" class="form-control" value="{{ old('sec1_title', isset($homepage) ? $homepage->translate('en')->sec1_title : '') }}">
                                                    @if($errors->has('sec1_title'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec1_title') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>

                                                <div class="form-group col-sm-6 {{ $errors->has('sec1_cat_id') ? 'has-error' : '' }}">
                                                    <label>Category</label>
                                                    <select class="custom-select" name="sec1_cat_id"  data-placeholder="Select Category" style="width: 100%;">
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}"
                                                            @if ( isset($homepage->sec1_cat_id) && $homepage->sec1_cat_id == $category->id)
                                                            selected
                                                            @endif
                                                            >
                                                            {{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('category'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('category') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.product.fields.categories_helper') }}
                                                    </p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- section 1 end produnts -->
                            <hr>
                                <!-- banner-->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label  class="col-md-2 col-form-label ">Banner section</label>
                                            <div class="col-md-10 row">
                                                <label for="banner" class="col-form-label ">Banner</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="banner" name="banner">
                                                        <label class="custom-file-label" for="banner">{{ trans('global.choose_file') }}</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="banner">{{ trans('global.upload') }}</span>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- banner-->
                            <hr>
                            <!-- section 2  produnts discount-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label  class="col-md-2 col-form-label ">Second section</label>
                                            <div class="col-md-10 row">
                                                <label for="sec2_image1" class="col-form-label ">Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="sec2_image1" name="sec2_image1">
                                                        <label class="custom-file-label" for="sec2_image1">{{ trans('global.choose_file') }}</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="sec2_image1">{{ trans('global.upload') }}</span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_title1') ? 'has-error' : '' }}">
                                                    <label for="en_sec2_title1">{{ trans('global.homepage.fields.title') }} (EN)</label>
                                                    <input type="text" id="en_sec2_title1" name="en_sec2_title1" class="form-control" value="{{ old('sec2_title1', isset($homepage) ? $homepage->translate('en')->sec2_title1 : '') }}">
                                                    @if($errors->has('sec2_title1'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_title1') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>

                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_subtitle1') ? 'has-error' : '' }}">
                                                    <label for="en_sec2_subtitle1">{{ trans('global.homepage.fields.subtitle') }} (EN)</label>
                                                    <input type="text" id="en_sec2_subtitle1" name="en_sec2_subtitle1" class="form-control" value="{{ old('sec2_subtitle1', isset($homepage) ? $homepage->translate('en')->sec2_subtitle1 : '') }}">
                                                    @if($errors->has('sec2_subtitle1'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_subtitle1') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.subtitle_helper') }}
                                                    </p>
                                                </div>

                                                <div class="form-group col-sm-12 {{ $errors->has('sec2_cat_id1') ? 'has-error' : '' }}">
                                                    <label>Category</label>
                                                    <select class="custom-select" name="sec2_cat_id1"  data-placeholder="Select Category" style="width: 100%;">
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}"
                                                            @if ( isset($homepage->sec2_cat_id1) && $homepage->sec2_cat_id1 == $category->id)
                                                            selected
                                                            @endif
                                                            >
                                                            {{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('category'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('category') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.product.fields.categories_helper') }}
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label  class="col-md-2 col-form-label ">Second section</label>
                                            <div class="col-md-10 row">
                                                <label for="sec2_image2" class="col-form-label ">Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="sec2_image2" name="sec2_image2">
                                                        <label class="custom-file-label" for="sec2_image2">{{ trans('global.choose_file') }}</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="sec2_image2">{{ trans('global.upload') }}</span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_title2') ? 'has-error' : '' }}">
                                                    <label for="en_sec2_title2">{{ trans('global.homepage.fields.title') }} (EN)</label>
                                                    <input type="text" id="en_sec2_title2" name="en_sec2_title2" class="form-control" value="{{ old('sec2_title2', isset($homepage) ? $homepage->translate('en')->sec2_title2 : '') }}">
                                                    @if($errors->has('sec2_title2'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_title2') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>

                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_subtitle2') ? 'has-error' : '' }}">
                                                    <label for="en_sec2_subtitle2">{{ trans('global.homepage.fields.subtitle') }} (EN)</label>
                                                    <input type="text" id="en_sec2_subtitle2" name="en_sec2_subtitle2" class="form-control" value="{{ old('sec2_subtitle2', isset($homepage) ? $homepage->translate('en')->sec2_subtitle2 : '') }}">
                                                    @if($errors->has('sec2_subtitle2'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_subtitle2') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.subtitle_helper') }}
                                                    </p>
                                                </div>

                                                <div class="form-group col-sm-12 {{ $errors->has('sec2_cat_id2') ? 'has-error' : '' }}">
                                                    <label>Category</label>
                                                    <select class="custom-select" name="sec2_cat_id2"  data-placeholder="Select Category" style="width: 100%;">
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}"
                                                            @if ( isset($homepage->sec2_cat_id2) && $homepage->sec2_cat_id2 == $category->id)
                                                            selected
                                                            @endif
                                                            >
                                                            {{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('category'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('category') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.product.fields.categories_helper') }}
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- section 2 end produnts discount-->
                            <hr>
                            <!-- section 3 products -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="banner" class="col-md-2 col-form-label ">Third section</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="form-group col-sm-6 {{ $errors->has('sec3_title') ? 'has-error' : '' }}">
                                                    <label for="en_sec3_title">{{ trans('global.homepage.fields.title') }} (EN)</label>
                                                    <input type="text" id="en_sec3_title" name="en_sec3_title" class="form-control" value="{{ old('sec3_title', isset($homepage) ? $homepage->translate('en')->sec3_title : '') }}">
                                                    @if($errors->has('sec3_title'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec3_title') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>
                                                <div class="form-group col-sm-6 {{ $errors->has('sec3_cat_id') ? 'has-error' : '' }}">
                                                    <label>Category</label>
                                                    <select class="custom-select" name="sec3_cat_id"  data-placeholder="Select Category" style="width: 100%;">
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}"
                                                            @if ( isset($homepage->sec3_cat_id) && $homepage->sec3_cat_id == $category->id)
                                                            selected
                                                            @endif
                                                            >
                                                            {{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('category'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('category') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.product.fields.categories_helper') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- section 3 end produnts -->
                            <hr>
                            
                            <div class="form-group row ">
                                <div class="col-md-2 offset-md-10">
                                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                                </div>
                            </div>
                        </div>

                        <div class="card-body  d-none" id="spanish-form">
                            <!-- section 1 products -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label  class="col-md-2 col-form-label ">First section</label>
                                        <div class="col-md-10">
                                            <div class="input-group">

                                                <div class="form-group col-sm-6 {{ $errors->has('sec1_title') ? 'has-error' : '' }}">
                                                    <label for="es_sec1_title">{{ trans('global.homepage.fields.title') }} (ES)</label>
                                                    <input type="text" id="es_sec1_title" name="es_sec1_title" class="form-control" value="{{ old('sec1_title', isset($homepage) ? $homepage->translate('es')->sec1_title : '') }}">
                                                    @if($errors->has('sec1_title'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec1_title') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- section 1 end produnts -->
                            <hr>
                            <!-- section 2  produnts discount-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label  class="col-md-2 col-form-label ">Second section</label>
                                            <div class="col-md-10 row">
                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_title1') ? 'has-error' : '' }}">
                                                    <label for="es_sec2_title1">{{ trans('global.homepage.fields.title') }} (ES)</label>
                                                    <input type="text" id="es_sec2_title1" name="es_sec2_title1" class="form-control" value="{{ old('sec2_title1', isset($homepage) ? $homepage->translate('es')->sec2_title1 : '') }}">
                                                    @if($errors->has('sec2_title1'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_title1') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>

                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_subtitle1') ? 'has-error' : '' }}">
                                                    <label for="es_sec2_subtitle1">{{ trans('global.homepage.fields.subtitle') }} (ES)</label>
                                                    <input type="text" id="es_sec2_subtitle1" name="es_sec2_subtitle1" class="form-control" value="{{ old('sec2_subtitle1', isset($homepage) ? $homepage->translate('es')->sec2_subtitle1 : '') }}">
                                                    @if($errors->has('sec2_subtitle1'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_subtitle1') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.subtitle_helper') }}
                                                    </p>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label  class="col-md-2 col-form-label ">Second section</label>
                                            <div class="col-md-10 row">
                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_title2') ? 'has-error' : '' }}">
                                                    <label for="es_sec2_title2">{{ trans('global.homepage.fields.title') }} (ES)</label>
                                                    <input type="text" id="es_sec2_title2" name="es_sec2_title2" class="form-control" value="{{ old('sec2_title2', isset($homepage) ? $homepage->translate('es')->sec2_title2 : '') }}">
                                                    @if($errors->has('sec2_title2'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_title2') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>

                                                <div class="form-group col-sm-6 {{ $errors->has('sec2_subtitle2') ? 'has-error' : '' }}">
                                                    <label for="es_sec2_subtitle2">{{ trans('global.homepage.fields.subtitle') }} (ES)</label>
                                                    <input type="text" id="es_sec2_subtitle2" name="es_sec2_subtitle2" class="form-control" value="{{ old('sec2_subtitle2', isset($homepage) ? $homepage->translate('es')->sec2_subtitle2 : '') }}">
                                                    @if($errors->has('sec2_subtitle2'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec2_subtitle2') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.subtitle_helper') }}
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- section 2 end produnts discount-->
                            <hr>
                            <!-- section 3 products -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="banner" class="col-md-2 col-form-label ">Third section</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="form-group col-sm-6 {{ $errors->has('sec3_title') ? 'has-error' : '' }}">
                                                    <label for="es_sec3_title">{{ trans('global.homepage.fields.title') }} (ES)</label>
                                                    <input type="text" id="es_sec3_title" name="es_sec3_title" class="form-control" value="{{ old('sec3_title', isset($homepage) ? $homepage->translate('es')->sec3_title : '') }}">
                                                    @if($errors->has('sec3_title'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sec3_title') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.homepage.fields.title_helper') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- section 3 end produnts -->
                            <hr>
                            
                            <div class="form-group row ">
                                <div class="col-md-2 offset-md-10">
                                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>

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
@endsection
@endsection