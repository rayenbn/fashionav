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
                            <h3 class="box-title">Contact-us Page</h3>
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
                @if($contactus)
                    <form action="{{ route("admin.contactus.update", [$contactus->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                @else
                    <form action="{{ route("admin.contactus.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                @endif
                    <div class="card-body" id="english-form">
                        <div class="form-group  row{{ $errors->has('en_title') ? 'has-error' : '' }}">
                            <label for="en_title" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.title') }} (EN)</label>
                            <div class="col-md-10">
                                <input type="text" id="en_title" name="en_title" class="form-control" value="{{ old('title', isset($contactus) ? $contactus->translate('en')->title : '') }}" placeholder="Page Title" required>
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('en_description') ? 'has-error' : '' }}">
                            <label class="col-md-2 col-form-label " for="en_description">{{ trans('global.contactus.fields.description') }} (EN)</label>
                            <div class="col-md-10">
                                <textarea id="en_description" name="en_description" class="form-control ">{!! old('description', isset($contactus) ? $contactus->translate('en')->description : '') !!}</textarea>
                                @if($errors->has('description'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.aboutus.fields.description_helper') }}
                                </p>
                            </div>
                        </div>

                        <div class="form-group  row{{ $errors->has('en_address') ? 'has-error' : '' }}">
                            <label for="en_address" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.address') }} (EN)</label>
                            <div class="col-md-10">
                                <input type="text" id="en_address" name="en_address" class="form-control" value="{{ old('address', isset($contactus) ? $contactus->translate('en')->address : '') }}" placeholder="example, exmaple 8768" required>
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row{{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.email') }}</label>
                            <div class="col-md-10">
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($contactus) ? $contactus->email : '') }}" placeholder="example@example.com" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row{{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.phone') }}</label>
                            <div class="col-md-10">
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($contactus) ? $contactus->phone : '') }}" placeholder="Ex: 123456789" >
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row{{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label for="mobile" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.mobile') }}</label>
                            <div class="col-md-10">
                                <input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile', isset($contactus) ? $contactus->mobile : '') }}" placeholder="Ex: 123456789" >
                                @if ($errors->has('mobile'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row{{ $errors->has('en_working_hours') ? 'has-error' : '' }}">
                            <label for="en_working_hours" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.working_time') }} (EN)</label>
                            <div class="col-md-10">
                                <input type="text" id="en_working_hours" name="en_working_hours" class="form-control" value="{{ old('working_hours', isset($contactus) ? $contactus->translate('en')->working_hours : '') }}" placeholder="Mond - Fri 9am - 5pm" required>
                                @if ($errors->has('working_hours'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('working_hours') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-10">
                                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-body d-none" id="spanish-form">
                        <div class="form-group  row{{ $errors->has('es_title') ? 'has-error' : '' }}">
                            <label for="es_title" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.title') }} (ES)</label>
                            <div class="col-md-10">
                                <input type="text" id="es_title" name="es_title" class="form-control" value="{{ old('title', isset($contactus) ? $contactus->translate('es')->title : '') }}" placeholder="Page Title" required>
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('es_description') ? 'has-error' : '' }}">
                            <label class="col-md-2 col-form-label " for="es_description">{{ trans('global.contactus.fields.description') }} (ES)</label>
                            <div class="col-md-10">
                                <textarea id="es_description" name="es_description" class="form-control ">{{ old('description', isset($contactus) ? $contactus->translate('es')->description : '') }}</textarea>
                                @if($errors->has('description'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.aboutus.fields.description_helper') }}
                                </p>
                            </div>
                        </div>

                        <div class="form-group  row{{ $errors->has('es_address') ? 'has-error' : '' }}">
                            <label for="es_address" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.address') }} (ES)</label>
                            <div class="col-md-10">
                                <input type="text" id="es_address" name="es_address" class="form-control" value="{{ old('address', isset($contactus) ? $contactus->translate('es')->address : '') }}" placeholder="example, exmaple 8768" required>
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row{{ $errors->has('es_working_hours') ? 'has-error' : '' }}">
                            <label for="es_working_hours" class="col-md-2 col-form-label ">{{ trans('global.contactus.fields.working_time') }}</label>
                            <div class="col-md-10">
                                <input type="text" id="es_working_hours" name="es_working_hours" class="form-control" value="{{ old('working_hours', isset($contactus) ? $contactus->translate('es')->working_hours : '') }}" placeholder="Mond - Fri 9am - 5pm" required>
                                @if ($errors->has('working_hours'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('working_hours') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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