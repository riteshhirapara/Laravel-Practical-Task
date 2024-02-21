@extends('Admin.app')

@section('title', ('Company'))

@push('css_or_js')
<link href="{{asset('assets/back-end/css/tags-input.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/back-end/css/select2.min.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
<div class="content container-fluid"> <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('panel.dashboard')}}">{{('Dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{('Company')}}</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-md-flex_ align-items-center justify-content-between mb-2">
        <div class="row">
            <div class="col-md-8">
                <h3 class="h3 mb-0 text-black-50">{{('Company')}} {{('List')}}</h3>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row flex-between justify-content-between align-items-center flex-grow-1">
                        <div class="col-12 mb-1 col-md-2">
                            <h5 class="flex-between">
                                <div>{{('Company Table')}} ({{ $company->total() }})</div>
                            </h5>
                        </div>

                        <div class="col-12 col-md-3">
                            <a href="javascript:" data-toggle="modal" data-target="#sales-modal" class="btn btn-primary">
                                <i class="tio-add-circle"></i>
                                <span class="text">{{('Add Company')}}</span>
                            </a>
                        </div>

                        <div id="sales-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalTopCoverTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <!-- Header -->
                                    <div class="modal-top-cover btn-secondary text-center">
                                        <figure class="position-absolute right-0 bottom-0 left-0" style="margin-bottom: -1px;">
                                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                                                <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z" />
                                            </svg>
                                        </figure>

                                        <div class="modal-close">
                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-light" data-dismiss="modal" aria-label="Close">
                                                <svg width="16" height="16" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End Header -->

                                    <div class="modal-top-cover-icon">
                                        <span class="icon icon-lg icon-light icon-circle icon-centered shadow-soft">

                                            <i class="tio-add-circle"></i>
                                        </span>
                                    </div>

                                    <form action="{{route('panel.Company.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-4">
                                                <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                    {{('Name')}}
                                                </label>
                                                <div class="col-md-8 js-form-message">
                                                    <input type="text" class="form-control" name="company_name" value="" >
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                    {{('Email')}}
                                                </label>
                                                <div class="col-md-8 js-form-message">
                                                    <input type="email" class="form-control" name="company_email" value="" >
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                    {{('Website')}}
                                                </label>
                                                <div class="col-md-8 js-form-message">
                                                    <input type="text" class="form-control" name="company_website" value="" >
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                    {{('Status')}}
                                                </label>
                                                <div class="col-md-8 js-form-message">
                                                    <input type="radio" id="status1" name="company_status" value="1">
                                                      <label for="status1">Active</label><br>
                                                    <input type="radio" id="status0" name="company_status" value="0">
                                                      <label for="status0">InActive</label><br>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">{{('close')}}</button>
                                            <button type="submit" class="btn btn-primary">{{('Add')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card-body" style="padding: 0">
                    <div class="table-responsive datatable-custom">
                        <table id="datatable" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table" style="width: 100%" data-hs-datatables-options='{
                                "columnDefs": [{ "targets": [0], "orderable": false }], "order": [], "info": { "totalQty": "#datatableWithPaginationInfoTotalQty" }, "search": "#datatableSearch", "entries": "#datatableEntries", "pageLength": 25, "isResponsive": false, "isShowPaging": false, "paging":false }'>
                            <thead class="thead-light">
                                <tr>
                                    <th>{{('#')}}</th>
                                    <th>{{('Name')}}</th>
                                    <th>{{('Email')}}</th>
                                    <th>{{('Website')}}</th>
                                    <th>{{('Created')}}</th>
                                    <th>{{('Active/Inactive')}}</th>
                                    <th style="width: 5px" class="text-center">{{('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($company as $key=>$c)
                                <tr>
                                    <td>{{$key+$company->firstItem()}}</td>
                                    <td>{{$c['company_name']}}</td>
                                    <td>{{$c['company_email']}}</td>
                                    <td>{{$c['company_website']}}</td>
                                    <td>{{$c['created_at']}}</td>
                                    <td class="{{ $c['company_status'] ? 'activeCompany' : 'InactiveCompany' }}">
                                        {{$c['company_status'] ? 'Active' : 'In-Active'}}</td>
                                    <td>
                                        <a class="btn btn-white btn-sm" href="javascript:" data-toggle="modal" data-target="#edit-modal{{$c->company_id}}" title="Edit Company">
                                            <i class="tio-edit text-primary"></i>
                                        </a>
                                    </td>
                                </tr>

                                <div id="edit-modal{{$c->company_id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalTopCoverTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <!-- Header -->
                                            <div class="modal-top-cover btn-secondary text-center">
                                                <figure class="position-absolute right-0 bottom-0 left-0" style="margin-bottom: -1px;">
                                                    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                                                        <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z" />
                                                    </svg>
                                                </figure>

                                                <div class="modal-close">
                                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-light" data-dismiss="modal" aria-label="Close">
                                                        <svg width="16" height="16" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- End Header -->

                                            <div class="modal-top-cover-icon">
                                                <span class="icon icon-lg icon-light icon-circle icon-centered shadow-soft">

                                                    <i class="tio-add-circle"></i>
                                                </span>
                                            </div>

                                            <form action="{{route('panel.Company.update')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="row mb-4">
                                                        <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                            {{('Name')}}
                                                        </label>
                                                        <div class="col-md-8 js-form-message">
                                                            <input type="text" class="form-control" name="company_name" value="{{$c['company_name']}}">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                            {{('Email')}}
                                                        </label>
                                                        <div class="col-md-8 js-form-message">
                                                            <input type="text" class="form-control" name="company_email" value="{{$c['company_email']}}">
                                                            <input type="hidden" class="form-control" name="company_id" value="{{$c['company_id']}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                            {{('Website')}}
                                                        </label>
                                                        <div class="col-md-8 js-form-message">
                                                            <input type="text" class="form-control" name="company_website" value="{{$c['company_website']}}">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <label for="requiredLabel" class="col-md-4 col-form-label input-label text-md-center">
                                                            {{('Status')}}
                                                        </label>
                                                        <div class="col-md-8 js-form-message">
                                                            <input type="radio" id="status1" name="company_status" value="1" {{ $c->company_status == 1 ? 'checked' : '' }}>
                                                              <label for="status1">Active</label><br>
                                                            <input type="radio" id="status0" name="company_status" value="0" {{ $c->company_status == 0 ? 'checked' : '' }}>
                                                              <label for="status0">InActive</label><br>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">{{('close')}}</button>
                                                    <button type="submit" class="btn btn-primary">{{('Update Company')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$company->links()}}
                </div>
                @if(count($company)==0)
                <div class="text-center p-4">
                    <img class="mb-3" src="{{asset('assets/back-end')}}/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                    <p class="mb-0">{{('No data to show')}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<!-- Page level plugins -->
<!-- <script src="{{asset('assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
<!-- Page level custom scripts -->
<script>
    function status_change_alert(url, message, e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: message,
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '#FC6A57',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        })
    }

    // Call the dataTables jQuery plugin
    $(document).on('ready', function() {
        // INITIALIZATION OF NAV SCROLLER
        // =======================================================
        $('.js-nav-scroller').each(function() {
            new HsNavScroller($(this)).init()
        });

        // INITIALIZATION OF SELECT2
        // =======================================================
        $('.js-select2-custom').each(function() {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });


        // INITIALIZATION OF DATATABLES
        // =======================================================
        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    className: 'd-none'
                },
                {
                    extend: 'excel',
                    className: 'd-none'
                },
                {
                    extend: 'csv',
                    className: 'd-none'
                },
                {
                    extend: 'pdf',
                    className: 'd-none'
                },
                {
                    extend: 'print',
                    className: 'd-none'
                },
            ],
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            // language: {
            //     zeroRecords: '<div class="text-center p-4">' +
            //         '<img class="mb-3" src="{{ asset('assets/back-end') }}/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
            //         '<p class="mb-0">No data to show</p>' +
            //         '</div>'
            // }
        });

        $('#export-copy').click(function() {
            datatable.button('.buttons-copy').trigger()
        });

        $('#export-excel').click(function() {
            datatable.button('.buttons-excel').trigger()
        });

        $('#export-csv').click(function() {
            datatable.button('.buttons-csv').trigger()
        });

        $('#export-pdf').click(function() {
            datatable.button('.buttons-pdf').trigger()
        });

        $('#export-print').click(function() {
            datatable.button('.buttons-print').trigger()
        });

        // INITIALIZATION OF TAGIFY
        // =======================================================
        $('.js-tagify').each(function() {
            var tagify = $.HSCore.components.HSTagify.init($(this));
        });
    });
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#viewer').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFileEg1").change(function() {
        readURL(this);
    });
</script>
<style>
    .InactiveCompany{
        color: red;
    }
    .activeCompany{
        color: green;
    }
</style>

@endpush
