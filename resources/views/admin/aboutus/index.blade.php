@extends('layouts.admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="box-title">About-us Page</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    @if($aboutus)
                    <form action="{{ route("admin.aboutus.update", [$aboutus->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @else
                        <form action="{{ route("admin.aboutus.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @endif
                            @if(isset($aboutus->banner))
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <img src="/storage/images/banners/{{ $aboutus->banner }}" width="100%" style="max-height: 300px;" />
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="banner" class="col-md-2 col-form-label ">{{ trans('global.aboutus.fields.banner') }}</label>
                                <div class="col-md-10">
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
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group  {{ $errors->has('banner_title') ? 'has-error' : '' }}">
                                        <label for="banner_title">Banner {{ trans('global.aboutus.fields.title') }}</label>

                                        <input type="text" id="banner_title" name="banner_title" class="form-control" value="{{ old('banner_title', isset($aboutus) ? $aboutus->banner_title : '') }}" placeholder="Banner title" required>
                                        @if ($errors->has('banner_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('banner_title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('banner_desc') ? 'has-error' : '' }}">
                                        <label for="banner_desc">Banner {{ trans('global.aboutus.fields.description') }}</label>
                                        <textarea id="banner_desc" name="banner_desc" class="form-control ">{{ old('banner_desc', isset($aboutus) ? $aboutus->banner_desc : '') }}</textarea>
                                        @if($errors->has('banner_desc'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('banner_desc') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('global.aboutus.fields.description_helper') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <strong style="color: #1863AB;">Section 1</strong>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group  {{ $errors->has('sec_one_title') ? 'has-error' : '' }}">
                                        <label for="sec_one_title">{{ trans('global.aboutus.fields.title') }}</label>

                                        <input type="text" id="sec_one_title" name="sec_one_title" class="form-control" value="{{ old('sec_one_title', isset($aboutus) ? $aboutus->sec_one_title : '') }}" placeholder="Page section 1 title" required>
                                        @if ($errors->has('sec_one_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_one_title') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('sec_one_text') ? 'has-error' : '' }}">
                                        <label for="sec_one_text">{{ trans('global.aboutus.fields.description') }}</label>
                                        <textarea id="sec_one_text" name="sec_one_text" class="form-control ">{{ old('sec_one_text', isset($aboutus) ? $aboutus->sec_one_text : '') }}</textarea>
                                        @if($errors->has('sec_one_text'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('sec_one_text') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('global.aboutus.fields.description_helper') }}
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="sec_one_img">{{ trans('global.aboutus.fields.image') }}</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="sec_one_img" name="sec_one_img">
                                                <label class="custom-file-label" for="sec_one_img">{{ trans('global.choose_file') }}</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="sec_one_img">{{ trans('global.upload') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($aboutus->sec_one_img))
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <img src="/storage/images/banners/{{ $aboutus->sec_one_img }}" width="100%" />
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <strong style="color: #1863AB;">Section 2</strong>
                            <hr>
                            
                            <div class="form-group  row{{ $errors->has('sec_two_title') ? 'has-error' : '' }}">
                                <label for="sec_two_title" class="col-md-2 col-form-label ">{{ trans('global.aboutus.fields.title') }}</label>
                                <div class="col-md-10">
                                    <input type="text" id="sec_two_title" name="sec_two_title" class="form-control" value="{{ old('sec_two_title', isset($aboutus) ? $aboutus->sec_two_title : '') }}" placeholder="Page section 2 title" required>
                                    @if ($errors->has('sec_two_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sec_two_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 border-right">
                                    <div class="form-group  {{ $errors->has('sec_two_t1') ? 'has-error' : '' }}">
                                        <label for="sec_two_t1">{{ trans('global.aboutus.fields.title') }} 1</label>

                                        <input type="text" id="sec_two_t1" name="sec_two_t1" class="form-control" value="{{ old('sec_two_t1', isset($aboutus) ? $aboutus->sec_two_t1 : '') }}" required>
                                        @if ($errors->has('sec_two_t1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_t1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('sec_two_desc1') ? 'has-error' : '' }}">
                                        <label for="sec_two_desc1">{{ trans('global.aboutus.fields.description') }} 1</label>

                                        <input type="text" id="sec_two_desc1" name="sec_two_desc1" class="form-control" value="{{ old('sec_two_desc1', isset($aboutus) ? $aboutus->sec_two_desc1 : '') }}" >
                                        @if ($errors->has('sec_two_desc1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_desc1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <div class="form-group  {{ $errors->has('sec_two_t2') ? 'has-error' : '' }}">
                                        <label for="sec_two_t2">{{ trans('global.aboutus.fields.title') }} 2</label>

                                        <input type="text" id="sec_two_t2" name="sec_two_t2" class="form-control" value="{{ old('sec_two_t2', isset($aboutus) ? $aboutus->sec_two_t2 : '') }}" required>
                                        @if ($errors->has('sec_two_t2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_t2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('sec_two_desc2') ? 'has-error' : '' }}">
                                        <label for="sec_two_desc2">{{ trans('global.aboutus.fields.description') }} 2</label>

                                        <input type="text" id="sec_two_desc2" name="sec_two_desc2" class="form-control" value="{{ old('sec_two_desc2', isset($aboutus) ? $aboutus->sec_two_desc2 : '') }}" required>
                                        @if ($errors->has('sec_two_desc2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_desc2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <div class="form-group  {{ $errors->has('sec_two_t3') ? 'has-error' : '' }}">
                                        <label for="sec_two_t3">{{ trans('global.aboutus.fields.title') }} 3</label>

                                        <input type="text" id="sec_two_t3" name="sec_two_t3" class="form-control" value="{{ old('sec_two_t3', isset($aboutus) ? $aboutus->sec_two_t3 : '') }}" required>
                                        @if ($errors->has('sec_two_t3'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_t3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('sec_two_desc3') ? 'has-error' : '' }}">
                                        <label for="sec_two_desc3">{{ trans('global.aboutus.fields.description') }} 3</label>

                                        <input type="text" id="sec_two_desc3" name="sec_two_desc3" class="form-control" value="{{ old('sec_two_desc3', isset($aboutus) ? $aboutus->sec_two_desc3 : '') }}" required>
                                        @if ($errors->has('sec_two_desc3'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_desc3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <div class="form-group  {{ $errors->has('sec_two_t4') ? 'has-error' : '' }}">
                                        <label for="sec_two_t4">{{ trans('global.aboutus.fields.title') }} 4</label>

                                        <input type="text" id="sec_two_t4" name="sec_two_t4" class="form-control" value="{{ old('sec_two_t4', isset($aboutus) ? $aboutus->sec_two_t4 : '') }}" required>
                                        @if ($errors->has('sec_two_t4'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_t4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('sec_two_desc4') ? 'has-error' : '' }}">
                                        <label for="sec_two_desc4">{{ trans('global.aboutus.fields.description') }} 4</label>

                                        <input type="text" id="sec_two_desc4" name="sec_two_desc4" class="form-control" value="{{ old('sec_two_desc4', isset($aboutus) ? $aboutus->sec_two_desc4 : '') }}" required>
                                        @if ($errors->has('sec_two_desc4'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_desc4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <div class="form-group  {{ $errors->has('sec_two_t5') ? 'has-error' : '' }}">
                                        <label for="sec_two_t5">{{ trans('global.aboutus.fields.title') }} 5</label>

                                        <input type="text" id="sec_two_t5" name="sec_two_t5" class="form-control" value="{{ old('sec_two_t5', isset($aboutus) ? $aboutus->sec_two_t5 : '') }}" required>
                                        @if ($errors->has('sec_two_t5'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_t5') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('sec_two_desc5') ? 'has-error' : '' }}">
                                        <label for="sec_two_desc5">{{ trans('global.aboutus.fields.description') }} 5</label>

                                        <input type="text" id="sec_two_desc5" name="sec_two_desc5" class="form-control" value="{{ old('sec_two_desc5', isset($aboutus) ? $aboutus->sec_two_desc5 : '') }}" required>
                                        @if ($errors->has('sec_two_desc5'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_desc5') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <div class="form-group  {{ $errors->has('sec_two_t6') ? 'has-error' : '' }}">
                                        <label for="sec_two_t6">{{ trans('global.aboutus.fields.title') }} 6</label>

                                        <input type="text" id="sec_two_t6" name="sec_two_t6" class="form-control" value="{{ old('sec_two_t6', isset($aboutus) ? $aboutus->sec_two_t6 : '') }}" required>
                                        @if ($errors->has('sec_two_t6'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_t6') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('sec_two_desc6') ? 'has-error' : '' }}">
                                        <label for="sec_two_desc6">{{ trans('global.aboutus.fields.description') }} 6</label>

                                        <input type="text" id="sec_two_desc6" name="sec_two_desc6" class="form-control" value="{{ old('sec_two_desc6', isset($aboutus) ? $aboutus->sec_two_desc6 : '') }}" required>
                                        @if ($errors->has('sec_two_desc6'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_desc6') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <div class="form-group  {{ $errors->has('sec_two_t7') ? 'has-error' : '' }}">
                                        <label for="sec_two_t7">{{ trans('global.aboutus.fields.title') }} 7</label>

                                        <input type="text" id="sec_two_t7" name="sec_two_t7" class="form-control" value="{{ old('sec_two_t7', isset($aboutus) ? $aboutus->sec_two_t7 : '') }}" required>
                                        @if ($errors->has('sec_two_t7'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_t7') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('sec_two_desc7') ? 'has-error' : '' }}">
                                        <label for="sec_two_desc7">{{ trans('global.aboutus.fields.description') }} 7</label>

                                        <input type="text" id="sec_two_desc7" name="sec_two_desc7" class="form-control" value="{{ old('sec_two_desc7', isset($aboutus) ? $aboutus->sec_two_desc7 : '') }}" required>
                                        @if ($errors->has('sec_two_desc7'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sec_two_desc7') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-2 offset-md-10">
                                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@endsection