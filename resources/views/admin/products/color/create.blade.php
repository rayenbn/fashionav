@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.color') }}
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="spanish-link">ES</a>
        </li>
    </ul>
    <form action="{{ route("admin.color.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body"  id="english-form">
            <div class="form-group {{ $errors->has('en_color_name') ? 'has-error' : '' }}">
                <label for="en_color_name">{{ trans('global.color_name') }} (EN)*</label>
                <input type="text" id="en_color_name" name="en_color_name" class="form-control" value="{{ old('en_color_name', isset($color) ? $color->en_color_name : '') }}">
                @if($errors->has('color_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('color_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.color_name_helper') }}
                </p>
            </div>
            
            <div class="form-group">
                <label>Color picker (EN):</label>

                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                <input type="text" class="form-control" id="color_code" name="color_code" data-original-title="" title="">

                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                </div>
                </div>
                <!-- /.input group -->
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>

        <div class="card-body d-none" id="spanish-form">
            <div class="form-group {{ $errors->has('es_color_name') ? 'has-error' : '' }}">
                <label for="es_color_name">{{ trans('global.color_name') }} (ES)*</label>
                <input type="text" id="es_color_name" name="es_color_name" class="form-control" value="{{ old('es_color_name', isset($color) ? $color->es_color_name : '') }}">
                @if($errors->has('color_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('color_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.color_name_helper') }}
                </p>
            </div>
            
            <!-- <div class="form-group">
                <label>Color picker (ES):</label>

                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                <input type="text" class="form-control" id="color_code" name="color_code" data-original-title="" title="">

                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                </div>
                </div>
            </div> -->

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>
    </form>
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