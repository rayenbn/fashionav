@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} Slider
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="spanish-link">ES</a>
                </li>
            </ul>
            <form action="{{ route("admin.slider.update", [$slider->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body" id="english-form">
                    <div class="form-group col-sm-6">
                        <label for="picture">Image</label>
                        <input id="picture" type="file" name="picture">
                    </div>

                    <div class="form-group col-sm-6 {{ $errors->has('en_title') ? 'has-error' : '' }}">
                        <label for="en_title">Title (EN)</label>
                        <input type="text" id="en_title" name="en_title" class="form-control" value="{{ old('en_title', isset($slider) ? $slider->translate('en')->title : '') }}">
                        @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('en_subtitle') ? 'has-error' : '' }}">
                        <label for="en_subtitle">Sub-Title (EN)</label>
                        <input type="text" id="en_subtitle" name="en_subtitle" class="form-control" value="{{ old('en_subtitle', isset($slider) ? $slider->translate('en')->subtitle : '') }}">
                        @if($errors->has('subtitle'))
                        <em class="invalid-feedback">
                            {{ $errors->first('subtitle') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.name_helper') }}
                        </p>
                    </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </div>

                <div class="card-body d-none" id="spanish-form">
                    <div class="form-group col-sm-6 {{ $errors->has('es_title') ? 'has-error' : '' }}">
                        <label for="es_title">Title (ES)</label>
                        <input type="text" id="es_title" name="es_title" class="form-control" value="{{ old('es_title', isset($slider) ? $slider->translate('es')->title : '') }}">
                        @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('es_subtitle') ? 'has-error' : '' }}">
                        <label for="es_subtitle">Sub-Title (ES)</label>
                        <input type="text" id="es_subtitle" name="es_subtitle" class="form-control" value="{{ old('es_subtitle', isset($slider) ? $slider->translate('es')->subtitle : '') }}">
                        @if($errors->has('subtitle'))
                        <em class="invalid-feedback">
                            {{ $errors->first('subtitle') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.name_helper') }}
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
@endsection
@endsection