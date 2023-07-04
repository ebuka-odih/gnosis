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
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="container">
                            @if(session()->has('deleted'))
                                <div class="alert alert-success">
                                    {{ session()->get('deleted') }}
                                </div>
                            @endif
                            @if(session()->has('updated'))
                                <div class="alert alert-success">
                                    {{ session()->get('updated') }}
                                </div>
                            @endif
                        </div>
                        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="my-3">
                                <table class="datatable-init nowrap nk-tb-list is-separate dataTable no-footer" data-auto-responsive="false" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
                                    <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col tb-col-sm sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
                                            <span>Name</span>
                                        </th>
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending">
                                            <span>Date</span>
                                        </th>
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
                                            <span>Price</span>
                                        </th>
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
                                            <span>Size</span>
                                        </th>
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Stock: activate to sort column ascending">
                                            <span>Stock</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                            <span>Type</span>
                                        </th>
                                        <th style="text-align: right" class="nk-tb-col tb-col-md sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                            <span>Action</span>
                                        </th>

                                    </tr>
                                    <!-- .nk-tb-item -->
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)

                                    <tr class="nk-tb-item even">
                                        <td class="nk-tb-col tb-col-sm">
                                        <span class="tb-product">
                                          <img src="{{ asset('files/'.$item->image) }}" alt="" class="thumb">
                                          <span class="title">{{ $item->name }}</span>
                                        </span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ date('d M, Y', strtotime($item->created_at)) }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-lead">₦ @money($item->price)</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-lead">{{ $item->size }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $item->stock }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-sub">{{ $item->type }}</span>
                                        </td>

                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                <li class="me-n1">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="{{ route('admin.product.edit', $item->id) }}">
                                                                        <em class="icon ni ni-edit"></em>
                                                                        <span>Edit Product</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('admin.product.show', $item->id) }}">
                                                                        <em class="icon ni ni-eye"></em>
                                                                        <span>View Product</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form method="POST" action="{!! route('admin.product.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                                        <input name="_method" value="DELETE" type="hidden">
                                                                        {{ csrf_field() }}

                                                                        <div class="btn-group btn-group-xs pull-right" role="group">

                                                                            <button type="submit" class="btn btn-danger  js-bs-tooltip-enabled" data-bs-toggle="tooltip" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Product?&quot;)">
                                                                                <em class="icon ni ni-trash"></em>
                                                                                <span class="text-white">Remove Product</span>
                                                                            </button>
                                                                        </div>

                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                                                                    <select name="size" id="size" class="form-control">
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
                                                                        <option value="Pants">Pants</option>
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
