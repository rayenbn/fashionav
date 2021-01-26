@extends('layouts.admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title">Home Sliders</h3>
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addslider">
                        Add New Slider
                    </button>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr role="row">
                            <th width="10">

                            </th>
                            <th>
                                Slider Image
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Sub-title
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr data-entry-id="{{ $slider->id }}">
                            <td>

                            </td>
                            <td><img src="/storage/sliders/{{ $slider->picture }}" width="450px" height="auto" /></td>
                            <td>{{ $slider->translate('en')->title ?? ''}}</td>
                            <td>{{ $slider->translate('en')->subtitle ?? ''}}</td>
                            <td>
                                @can('product_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.slider.edit', $slider->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan
                                @can('product_delete')
                                <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- /.box-body -->
    </div>
</section>

<!-- ADD Modal -->
<div class="modal fade" id="addslider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add new slider Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="spanish-link">ES</a>
                </li>
            </ul>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body" id="english-form">
                    <div class="form-group" >
                        <label for="avatar" class="col-md-2 control-label">Image</label>
                        <div class="col-md-6">
                            <input type="file" id="picture" name="picture">
                            <h5 style="color: red">Size: 1555*375px</h5>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('en_title') ? ' has-error' : '' }}">
                        <label class="col-md-6 control-label">Title (EN)</label>
                        <div class="col-md-10">
                            <input id="en_title" type="text" class="form-control" name="en_title" value="{{ old('en_title') }}">

                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('en_subtitle') ? ' has-error' : '' }}">
                        <label for="en_subtitle" class="col-md-6 control-label">Sub-Title (EN)</label>
                        <div class="col-md-10">
                            <input id="en_subtitle" type="text" class="form-control" name="en_subtitle" value="{{ old('en_subtitle') }}">
                            @if ($errors->has('subtitle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subtitle') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-body d-none" id="spanish-form">
                    <div class="form-group{{ $errors->has('es_title') ? ' has-error' : '' }}">
                        <label class="col-md-6 control-label">Title (ES)</label>
                        <div class="col-md-10">
                            <input id="es_title" type="text" class="form-control" name="es_title" value="{{ old('es_title') }}">

                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('es_subtitle') ? ' has-error' : '' }}">
                        <label for="es_subtitle" class="col-md-6 control-label">Sub-Title (ES)</label>
                        <div class="col-md-10">
                            <input id="es_subtitle" type="text" class="form-control" name="es_subtitle" value="{{ old('es_subtitle') }}">
                            @if ($errors->has('subtitle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subtitle') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">{{ trans('global.save') }}</button>
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