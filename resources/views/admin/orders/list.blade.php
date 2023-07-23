@extends('admin.layout.app')
@section('content')

<div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Orders</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-tools-opt">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalForm" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <button type="button" class="toggle btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal" data-bs-target="#modalForm"><em class="icon ni ni-plus"></em><span>Add Order</span></button>
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xxl-12 col-md-12">
                                <div class="card h-100">
                                    <div class="nk-ecwg nk-ecwg2">
                                        <div class="card-inner">
                                            <div class="card-title-group mt-n1">
                                                <div class="card-title">
                                                    <h6 class="title">Total order</h6>
                                                </div>

                                            </div>
                                            <div class="data">
                                                <div class="data-group">
                                                    <div class="amount">₦@money($sum_orders)</div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner pb-0">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">Orders over time</h6>
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="data-group">
                                                    <div class="amount">{{ $total_orders }}</div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .nk-ecwg -->
                                </div><!-- .card -->
                            </div>
                        </div>

                        <br>
                        <div class="container m-4">
                            @if(session()->has('deleted'))
                                <div class="alert alert-danger">
                                    {{ session()->get('deleted') }}
                                </div>
                            @endif
                            @if(session()->has('updated'))
                                <div class="alert alert-success">
                                    {{ session()->get('updated') }}
                                </div>
                            @endif
                            @if(session()->has('created'))
                                <div class="alert alert-success">
                                    {{ session()->get('created') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>

                        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="my-3">
                                <table class=" datatable-init-export nowrap table dataTable no-footer dtr-inline" data-auto-responsive="false" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
                                    <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending">
                                            <span>Date</span>
                                        </th>
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
                                            <span>Delivery Date (Days Left)</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-sm sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
                                            <span>Product (Qt)</span>
                                        </th>
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
                                            <span>Amount</span>
                                        </th>
                                        <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
                                            <span>Customer</span>
                                        </th>


                                        <th style="text-align: right" class="nk-tb-col tb-col-md sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                            <span>Action</span>
                                        </th>

                                    </tr>
                                    <!-- .nk-tb-item -->
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)

                                        <tr class="nk-tb-item even">
                                            <td class="nk-tb-col">
                                                <span class="tb-sub">{{ date('d M, Y', strtotime($item->created_at)) }}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-lead">{{ $item->delivery_date }} <span class="badge bg-primary">{{ $item->created_at->diffInDays($item->delivery_date) }}days</span></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span class="title">{{ $item->product->name }} ({{ $item->quantity }})</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-lead">₦ @money($item->amount)</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-lead">{{ $item->customer }}</span>
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
                                                                        <a href="{{ route('admin.orders.edit', $item->id) }}">
                                                                            <em class="icon ni ni-edit"></em>
                                                                            <span>Edit Order</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form method="POST" action="{!! route('admin.orders.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                                            <input name="_method" value="DELETE" type="hidden">
                                                                            {{ csrf_field() }}

                                                                            <div class="btn-group btn-group-xs pull-right" role="group">

                                                                                <button type="submit" class="btn btn-danger  js-bs-tooltip-enabled" data-bs-toggle="tooltip" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Order?&quot;)">
                                                                                    <em class="icon ni ni-trash"></em>
                                                                                    <span class="text-white">Remove Order</span>
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

                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="modalForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Info</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.orders.store') }}" method="POST" class="form-validate is-alter" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="product">Product Name</label>
                        <div class="form-control-wrap">
                            <select name="products_id" id="product" class="form-control" required="">
                                <option >Select Product</option>
                                @foreach($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} (₦{{ $item->price }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customer">Quantity</label>
                        <div class="form-control-wrap">
                            <input type="number" name="quantity" class="form-control" id="customer" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customer">Customer Name</label>
                        <div class="form-control-wrap">
                            <input type="text" name="customer" class="form-control" id="customer" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Phone No</label>
                        <div class="form-control-wrap">
                            <input type="text" name="phone" class="form-control" id="phone-no">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="address">Address</label>
                        <div class="form-control-wrap">
                            <input type="text" name="address" class="form-control" id="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="note">Note</label>
                        <div class="form-control-wrap">
                            <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
