@extends('admin.layouts.master')

@section('content')

<div class="row">
    @include('website.Layout.breadcrumb')
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
           Testimonial <a href="{{ route('testimonial.create') }}" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>

<div class="table">

    @include('admin.layouts.error')
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table table table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Rating</th>
                        <th scope="col" class="text-center">Status</th>

                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ @$value->name }}</td>
                        <td>
                            {{ @$value->rating }}
                        </td>

                        <td class="text-center">
                            @if ($value->status==1)
                            <span class="btn btn-xs btn-dim btn-outline-success">Active</span>

                            @else
                            <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="text-center">

                                <a href="{{ route('testimonial.edit',$value->id) }}" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>

                                <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation(this)" title="Delete" data-url="{{ route('testimonial.delete',$value->id) }}"><em class="icon ni ni-trash"></em></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    @endsection

    @section('javascript')

{{-- Delete SweetAlert --}}

<script type="text/javascript">
    function deleteConfirmation(d) {
        var url = $(d).data('url');
    Swal.fire({
    title: "Delete?",
    text: "Please ensure and then confirm!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0
    }).then(function (e) {
    if (e.value === true) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
    type: 'GET',
    url: url,
    data: {_token: CSRF_TOKEN},
    beforeSend: function () {
                // Show image container
                $("#loader").show();
            },
    success: function (results) {
     location.reload(true);

    },
    complete: function (response) {
                $("#loader").hide();
            },
    });
    } else {
    e.dismiss;
    }
    }, function (dismiss) {
    return false;
    })
    }
    </script>

{{-- Alert Auto Disappear --}}


    <script>
        $(".alert").delay(1500).fadeOut(300);
    </script>

    @endsection

