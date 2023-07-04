@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('admin.product.index') }}"><em class="icon ni ni-arrow-left"></em><span>Products</span></a></div>
                                <h2 class="nk-block-title fw-normal">Edit Product</h2>

                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div class="preview-block">

                                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="row gy-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-01">Product Name</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="name" value="{{ old('name', optional($product)->name) }}" class="form-control form-control-lg" id="default-01" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-05">Price</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">NGN</span>
                                                            </div>
                                                            <input type="number" name="price" value="{{ old('price', optional($product)->price) }}" class="form-control form-control-lg" id="default-05">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="size">Size</label>
                                                        <div class="form-control-wrap">
                                                            <select name="size" id="size" class="form-control form-control-lg">
                                                                <option >Choose Size</option>
                                                                <option value="Large" @if(old('size', optional($product)->size) == "Large") selected @endif>L</option>
                                                                <option value="XL" @if(old('size', optional($product)->size) == "XL") selected @endif>XL</option>
                                                                <option value="XXL" @if(old('size', optional($product)->size) == "XXL") selected @endif>XXL</option>
                                                                <option value="XXXL" @if(old('size', optional($product)->size) == "XXXL") selected @endif>XXXL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="type">Size</label>
                                                        <div class="form-control-wrap">
                                                            <select name="type" id="type" class="form-control form-control-lg">
                                                                <option >Choose Size</option>
                                                                <option value="Shirt" @if(old('type', optional($product)->type) == "Shirt") selected @endif>Shirt</option>
                                                                <option value="Short" @if(old('type', optional($product)->type) == "Short") selected @endif>Short</option>
                                                                <option value="Sleeve" @if(old('type', optional($product)->type) == "Sleeve") selected @endif>Sleeve</option>
                                                                <option value="Pants" @if(old('type', optional($product)->type) == "Pants") selected @endif>Pants</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Stock</label>
                                                        <div class="form-control-wrap ">
                                                                <input type="text" id="default-06" name="stock" value="{{ old('stock', optional($product)->stock) }}" class="form-control form-control-lg">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Product Image</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-file mb-3">
                                                                <input type="file" multiple="" name="image" class="form-file-input" id="customFile">
                                                                <label class="form-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                            <span class="tb-product">
                                                            <img height="200" width="150" src="{{ asset('files/'.$product->image) }}" alt="" class="thumb">
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div><!-- .card-preview -->

                        </div><!-- .nk-block -->


                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection
