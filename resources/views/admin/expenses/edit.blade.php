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

                                        <form action="{{ route('admin.expenses.update', $expenses->id) }}" method="POST">
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
                                                        <label class="form-label" for="default-01">Label</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="label" value="{{ old('label', optional($expenses)->label) }}" class="form-control form-control-lg" id="default-01" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-05">Amount</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">NGN</span>
                                                            </div>
                                                            <input type="number" name="amount" value="{{ old('amount', optional($expenses)->amount) }}" class="form-control form-control-lg" id="default-05">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-05">Description</label>
                                                        <div class="form-control-wrap">
                                                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description', optional($expenses)->description) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary">Update Expenses</button>
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
