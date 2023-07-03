@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Products</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-tools-opt">
                                <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Product</span></a>
                            </div>
                            <div class="nk-block-head-content">

                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Status</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>New Items</span></a></li>
                                                            <li><a href="#"><span>Featured</span></a></li>
                                                            <li><a href="#"><span>Out of Stock</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="nk-tb-list is-separate mb-3">
                            <div class="nk-tb-item nk-tb-head">

                                <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                <div class="nk-tb-col"><span>Price</span></div>
                                <div class="nk-tb-col"><span>Stock</span></div>
                                <div class="nk-tb-col tb-col-md"><span>Type</span></div>
                                <div style="text-align: right" class="nk-tb-col tb-col-md "><span>Action</span></div>

                            </div><!-- .nk-tb-item -->
                            @foreach($products as $item)
                            <div class="nk-tb-item">

                                <div class="nk-tb-col tb-col-sm">
                                    <span class="tb-product">
                                        <img src="{{ asset('files/'.$item->image) }}" alt="" class="thumb">
                                        <span class="title">{{ $item->name }}</span>
                                    </span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-lead">₦ @money($item->price)</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub">{{ $item->stock  }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">{{ $item->type }}</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li class="me-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                                <!-- .nk-tb-item -->
                            @endforeach

                        </div><!-- .nk-tb-list -->
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        <ul class="pagination justify-content-center justify-content-md-start">
                                            <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-left"></em></a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        </ul><!-- .pagination -->
                                    </div>
                                </div><!-- .nk-block-between -->
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                    <div class="nk-add-product toggle-slide toggle-slide-right toggle-screen-any" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -24px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 24px;">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title">New Product</h5>
                                                    <div class="nk-block-des">
                                                        <p>Add information and add new product.</p>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head -->

                                            <div class="nk-block">
                                                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="product-title">Product Title</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="product-title" name="name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-mb-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="regular-price"> Price</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="regular-price" name="price" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-mb-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="size">Cloth Size</label>
                                                                <div class="form-control-wrap">
                                                                    <select name="size" id="category" class="form-control">
                                                                        <option >Choose Size</option>
                                                                        <option value="Large">L</option>
                                                                        <option value="XL">XL</option>
                                                                        <option value="XXL">XXL</option>
                                                                        <option value="XXXL">XXXL</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-mb-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="stock">Stock</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="stock" name="stock" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="category">Category</label>
                                                                <div class="form-control-wrap">
                                                                    <select name="type" id="category" class="form-control">
                                                                        <option value="Shirt">Shirt</option>
                                                                        <option value="Short">Short</option>
                                                                        <option value="Sleeve">Sleeve</option>
                                                                        <option value="Pant">Pant</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-mb-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="image">Product Image</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="file" class="form-control" id="image" name="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="btn btn-primary" type="submit"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <!-- .nk-block -->
                                        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 866px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 279px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
                </div>
            </div>
        </div>
    </div>

@endsection
