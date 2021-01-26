@extends('layouts.admin')
@section('content')
@can('product_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.gallery.create") }}">
            {{ trans('global.add') }} {{ trans('global.photo') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.photo') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <tbody>
                    <div style="display: flex;flex-wrap: wrap;">
                        @foreach($galleries as $key => $gallery)
                        <div class="col-md-3 col-sm-12 ">
                            <img src="../storage/gallery/thumbnail/{{ $gallery->picture }}" class="img-thumbnail" />
                            @can('product_delete')
                            <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                        </div>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection