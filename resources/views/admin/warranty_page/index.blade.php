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
                @if($warranty)
                <form action="{{ route("admin.warranty-page.update", [$warranty->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                @else
                <form action="{{ route("admin.warranty-page.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                @endif
                <div class="card-body" id="english-form">
                    <div class="form-group  {{ $errors->has('en_title') ? 'has-error' : '' }}">
                        <label for="en_title">Banner {{ trans('global.aboutus.fields.title') }} (EN)</label>

                        <input type="text" id="en_title" name="en_title" class="form-control" value="{{ old('title', isset($warranty) ? $warranty->translate('en')->title : '') }}" placeholder="Warranty page title" required>
                        @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('en_content') ? 'has-error' : '' }}">
                        <label for="en_content">Banner {{ trans('global.aboutus.fields.description') }} (EN)</label>
                        <textarea id="en_content" name="en_content" class="form-control " rows="10">{{ old('content', isset($warranty) ? $warranty->translate('en')->content : '') }}</textarea>
                        @if($errors->has('content'))
                        <em class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.aboutus.fields.description_helper') }}
                        </p>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-2 offset-md-10">
                            <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </div>
                </div>

                <div class="card-body d-none" id="spanish-form">
                    <div class="form-group  {{ $errors->has('es_title') ? 'has-error' : '' }}">
                        <label for="es_title">Banner {{ trans('global.aboutus.fields.title') }} (ES)</label>

                        <input type="text" id="es_title" name="es_title" class="form-control" value="{{ old('title', isset($warranty) ? $warranty->translate('es')->title : '') }}" placeholder="Warranty page title" required>
                        @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('es_content') ? 'has-error' : '' }}">
                        <label for="es_content">Banner {{ trans('global.aboutus.fields.description') }} (ES)</label>
                        <textarea id="es_content" name="es_content" class="form-control " rows="10">{{ old('content', isset($warranty) ? $warranty->translate('es')->content : '') }}</textarea>
                        @if($errors->has('content'))
                        <em class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.aboutus.fields.description_helper') }} 
                        </p>
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