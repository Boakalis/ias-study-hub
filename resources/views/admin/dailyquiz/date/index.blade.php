@extends('admin.layouts.master') @section('content')
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Quiz Date Management <a href="#" data-toggle="modal" data-target="#createDate" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>
{{-- Session Message --}} @include('admin.layouts.error')


<div class="card card-preview">
    <div class="card-inner">
        <table class="datatable-init table table table-md">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Quiz Date</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                <tr id="sid{{$data->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{Str::ucfirst($data->date)}}</td>
                    <td class="text-center">
                        @if ($data->status==1)
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>

                        @else
                        <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                        @endif
                    </td>

                    <td class="text-center">
                        <a href="javascript:void(0)" onclick="editdatefunction({{$data->id}})" title="edit" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>
                        <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation({{$data->id}})" title="Delete"><em class="icon ni ni-trash"></em></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Model For Creating Subject  -->
<div class="modal fade zoom" id="createDate" tabindex="-1" role="dialog" aria-labelledby="datemodallabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="quizdatestore" id="quizdatestore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="date">Quiz Date</label>
                            <div class="form-control-wrap">
                                <input class="form-control" data-date-format="yyyy-mm" type="text" name="date" id="quizdate" />
                            </div>
                        </div>
                    </div>
                    <br />

                    <label for="status" class="d-block">Status</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active" name="status" checked value="1" />
                        <label class="custom-control-label" for="Active">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive" name="status" value="0" />
                        <label class="custom-control-label" for="InActive">Inactive</label>
                    </div>
                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="ajaxSubmit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Model For Editing Subject  -->
<div class="modal fade zoom" id="editdate" tabindex="-1" role="dialog" aria-labelledby="datemodallabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="updateStore" id="updateStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="date">Quiz Date</label>
                            <div class="form-control-wrap">
                                <input class="form-control date-picker " data-date-format="yyyy-mm" type="text" name="date" id="quizdate1" />
                            </div>
                        </div>
                    </div>
                    <br />
                    <label for="status" class="d-block">Status</label>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active1" name="status" value="1" />
                        <label class="custom-control-label" for="Active1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive1" name="status" value="0" />
                        <label class="custom-control-label" for="InActive1">Inactive</label>
                    </div>
                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                <div class="modal-footer justify-content-center">
                    <button type="submit" id="Submit" class="btn btn-primary center">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>







@endsection @section('javascript')

    <script>
    $("#quizdatestore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/admin/daily-quiz/store-quiz-date",
            type: "post",
            data: $(this).serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },

            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
                    $(".alert-danger").hide();
                    $("#createDate").modal("hide");
                    location.reload(true);
                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>

<!-- Script For Editing -->
<script>
    function editdatefunction(id) {
        $.get("/admin/daily-quiz/edit-date/" + id, function (date) {
            $("#id").val(date.id);
            $("#quizdate1").val(date.date);
            if (date.status == 0) $("#editdate").find(":radio[name=status][value=0]").prop("checked", true);
            else $("#editdate").find(":radio[name=status][value=1]").prop("checked", true);

            $("#editdate").modal("toggle");
        });
    }
</script>

<!-- Script for updating -->
<script>
    $("#updateStore").submit(function (e) {
        e.preventDefault();
        let id = $("#id").val();
        $.ajax({
            url: "/admin/daily-quiz/update-date/" + id,
            type: "post",
            data: $("#updateStore").serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },
            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
                    $(".alert-danger").hide();
                    $("#editSubject").modal("hide");
                    location.reload(true);
                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>

{{-- Delete SweetAlert --}}

<script type="text/javascript">
    function deleteConfirmation(id) {
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
    type: 'POST',
    url: "{{url('/admin/daily-quiz/delete-date')}}/" + id,
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

<script>
  $("#quizdate").datepicker().datepicker("setDate", new Date());
  </script>
@endsection
