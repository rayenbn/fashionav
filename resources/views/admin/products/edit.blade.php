@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
            </div>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="spanish-link">ES</a>
                </li>
            </ul>
            <form action="{{ route("admin.products.update", [$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body" id="english-form">
                    <div class="form-group row">
                        <div class="form-group col-sm-6 {{ $errors->has('en_name') ? 'has-error' : '' }}">
                            <label for="en_name">{{ trans('global.product.fields.name') }}*</label>
                            <input type="text" id="en_name" name="en_name" class="form-control" value="{{ old('en_name', isset($product) ? $product->translate('en')->name : '') }}">
                            @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.product.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label>Category</label>
                            <select class="col-form-label select2" name="categories[]" multiple="multiple" data-placeholder="Select Category" style="width: 100%;">

                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @foreach ($product->categories as $categori)
                                    @if ($categori->id == $category->id)
                                    selected
                                    @endif
                                    @endforeach
                                    >{{$category->category_name}}</option>
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

                    <div class="form-group row">
                        <div class="form-group col-sm-6 {{ $errors->has('color') ? 'has-error' : '' }}">
                            <label>colors</label>
                            <select class="col-form-label select2" name="colors[]" multiple="multiple" data-placeholder="Select product colors" style="width: 100%;">
                                @foreach ($colors as $color)
                                <option value="{{$color->id}}" @foreach ($product->colors as $col)
                                    @if ($col->id == $color->id)
                                    selected
                                    @endif
                                    @endforeach
                                    >{{$color->color_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('color'))
                            <em class="invalid-feedback">
                                {{ $errors->first('color') }}
                            </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.product.fields.color_helper') }}
                            </p>
                        </div>

                        <div class="form-group col-sm-6 {{ $errors->has('availability') ? 'has-error' : '' }}">
                            <label>{{ trans('global.product.fields.availability') }}*</label>
                            <select class="form-control" id="availability" name="availability" style="width: 100%;" required>
                       
                                @if (isset($product))
                                    <option value="0"
                                        @if ($product->availability == 0)
                                            selected
                                        @endif
                                    >Available</option>
                                    <option value="1"
                                        @if ($product->availability == 1)
                                            selected
                                        @endif
                                    >Not Available</option>
                                    <option value="2"
                                        @if ($product->availability == 2)
                                            selected
                                        @endif
                                    >Pre Order</option>
                                @endif
                            </select>
                            @if($errors->has('availability'))
                            <p class="help-block">
                                {{ $errors->first('availability') }}
                            </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.product.fields.availability_helper') }}
                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6{{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('global.product.fields.price') }}</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" step="0.01">
                            @if($errors->has('price'))
                            <em class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.product.fields.price_helper') }}
                            </p>
                        </div>
                        <div class="form-group col-sm-6{{ $errors->has('discount_price') ? 'has-error' : '' }}">
                            <label for="discount_price">{{ trans('global.product.fields.discount_price') }}</label>
                            <input type="number" id="discount_price" name="discount_price" class="form-control" value="{{ old('discount_price', isset($product) ? $product->discount_price : '') }}" step="0.01">
                            @if($errors->has('discount_price'))
                            <em class="invalid-feedback">
                                {{ $errors->first('discount_price') }}
                            </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.product.fields.discount_price_helper') }}
                            </p>
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('img') ? 'has-error' : '' }}">
                        <label for="img" class="col-md-3 col-form-label ">{{ trans('global.product.fields.image') }}*</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img">
                                    <label class="custom-file-label" for="img">{{ trans('global.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="img">{{ trans('global.upload') }}</span>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('img'))
                        <em class="invalid-feedback">
                            {{ $errors->first('img') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.image_helper') }}
                        </p>
                    </div>


                    <div class="form-group row {{ $errors->has('productImages') ? 'has-error' : '' }}">
                        <label for="productImages" class="col-md-3 col-form-label ">Upload Images</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="productImages[]" id="productImages" accept="image/*" multiple>
                                    <label class="custom-file-label" for="productImages">{{ trans('global.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="productImages">{{ trans('global.upload') }}</span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            @foreach ( $productImages as $image)
                            <div class="imagecontainer">
                                <img src="/storage/products/thumbnail/{{ $image->productImages }}" class="image" />
                                <div class="middle">
                                    <button type="button" name="deleteimage" data-image-id="{{$image->id}}" id="deleteimage" class="btn btn-danger"><i class="fa fa-trash" style="color: white"></i></button>
                                    <!-- <a href="#" id="deleteimage" data-image-id="{{$image->id}}" onclick="return confirm('{{ trans('global.areYouSure') }}');"> <i class="fa fa-trash" style="color: red"></i> </a> -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                        <label for="en_description">{{ trans('global.product.fields.description') }}</label>
                        <textarea id="en_description" name="en_description" class="form-control ">{{ old('en_description', isset($product) ? $product->translate('en')->description : '') }}</textarea>
                        @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.description_helper') }}
                        </p>
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </div>

                <div class="card-body d-none" id="spanish-form">
                    <div class="form-group row">
                        <div class="form-group col-sm-12 {{ $errors->has('es_name') ? 'has-error' : '' }}">
                            <label for="es_name">{{ trans('global.product.fields.name') }}*</label>
                            <input type="text" id="es_name" name="es_name" class="form-control" value="{{ old('es_name', isset($product) ? $product->translate('es')->name : '') }}">
                            @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.product.fields.name_helper') }}
                            </p>
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('es_description') ? 'has-error' : '' }}">
                        <label for="es_description">{{ trans('global.product.fields.description') }}</label>
                        <textarea id="es_description" name="es_description" class="form-control ">{{ old('es_description', isset($product) ? $product->translate('es')->description : '') }}</textarea>
                        @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.description_helper') }}
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
    $(document).on('click', '#deleteimage', function() {
        var imageid = $(this).data('image-id');
        if (confirm("{{ trans('global.areYouSure') }}")) {
            $.ajax({
                headers: {
                    'x-csrf-token': _token
                },
                method: 'DELETE',
                url: "/admin/products/image/" + imageid,
            }).done(function() {
                location.reload()
            })
        }
    });
</script>
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