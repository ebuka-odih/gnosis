@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">

                        <div class="nk-block ">
                            <div class="nk-block-head nk-block-head-lg wide-sm">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><a class="back-to" href="{{ route('admin.product.index') }}"><em class="icon ni ni-arrow-left"></em><span>Products</span></a></div>

                                </div>
                            </div><!-- .nk-block-head -->

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <h4 class="mb-2 text-center">Product Detail</h4>
                                    <div class="preview-block">

                                        <table style="width:100%" class="table table-striped">
                                            <tr>
                                                <th>Name:</th>
                                                <td>{{ $product->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Price:</th>
                                                <td>₦ @money($product->price)</td>
                                            </tr>
                                            <tr>
                                                <th>Size:</th>
                                                <td>{{ $product->size }}</td>
                                            </tr>
                                            <tr>
                                                <th>Type:</th>
                                                <td>{{ $product->type }}</td>
                                            </tr>
                                            <tr>
                                                <th>Image:</th>
                                                <td><img height="200" width="160" src="{{ asset('files/'.$product->image) }}" alt=""></td>
                                            </tr>
                                        </table>


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
