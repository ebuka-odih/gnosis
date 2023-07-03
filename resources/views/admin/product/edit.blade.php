@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title page-title">Dashboard</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="nk-block nk-block-lg" data-select2-id="13">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="title nk-block-title">Form Outlined</h4>
                                    <div class="nk-block-des">
                                        <p>Textual form controls—like <code class="code-tag">&lt;input&gt;</code>s, <code class="code-tag">&lt;select&gt;</code>s, and <code class="code-tag">&lt;textarea&gt;</code>s—are styled with the <code>.form-control</code> class. Included are styles for general appearance, focus state, sizing, and more. Additional classes can be used to vary this layout on a per-form basis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div class="preview-block" data-select2-id="12">
                                        <span class="preview-title-lg overline-title">Outlined Preview</span>
                                        <div class="row gy-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal">
                                                        <label class="form-label-outlined" for="outlined-normal">Input text outlined</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right xl">
                                                            <em class="icon ni ni-user"></em>
                                                        </div>
                                                        <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-right-icon">
                                                        <label class="form-label-outlined" for="outlined-right-icon">Input with icon</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select js-select2 select2-hidden-accessible" data-ui="xl" id="outlined-select" data-select2-id="outlined-select" tabindex="-1" aria-hidden="true">
                                                            <option value="default_option" data-select2-id="2">Default Option</option>
                                                            <option value="option_select_name" data-select2-id="23">Option select name</option>
                                                            <option value="option_select_name" data-select2-id="24">Option select name</option>
                                                        </select><span class="select2 select2-container select2-container--default select2-xl select2-container--below" dir="ltr" data-select2-id="1" style="width: 287.328px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-outlined-select-container"><span class="select2-selection__rendered" id="select2-outlined-select-container" role="textbox" aria-readonly="true" title="Option select name">Option select name</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        <label class="form-label-outlined" for="outlined-select">Outlined Select</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right xl">
                                                            <em class="icon ni ni-calendar-alt"></em>
                                                        </div>
                                                        <input type="text" class="form-control form-control-xl form-control-outlined date-picker" id="outlined-date-picker">
                                                        <label class="form-label-outlined" for="outlined-date-picker">Date Picker</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap has-timepicker">
                                                        <div class="form-icon form-icon-right xl">
                                                            <em class="icon ni ni-clock"></em>
                                                        </div>
                                                        <input type="text" class="form-control form-control-xl form-control-outlined time-picker" id="outlined-time-picker">
                                                        <label class="form-label-outlined" for="outlined-time-picker">Time Picker</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="preview-hr">
                                        <span class="preview-title-lg overline-title">Outlined Sizes</span>
                                        <div class="row gy-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-xl">
                                                        <label class="form-label-outlined" for="outlined-xl">Input text xl</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg form-control-outlined" id="outlined-lg">
                                                        <label class="form-label-outlined" for="outlined-lg">Input text lg</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-outlined" id="outlined-default">
                                                        <label class="form-label-outlined" for="outlined-default">Input text</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-soft">Use <code>.form-control-outlined</code> with <code>.form-control</code> for outlined form element and replace <code>.form-label</code> with <code>.form-label-outlined</code>, also place label after input/select element.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card-preview -->

                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

@endsection
