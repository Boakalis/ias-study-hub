
@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase">
            Sub-Category Management <a href="#" data-toggle="modal" data-target="#createCategory" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>

<div class="table px-2">
  @include('admin.layouts.error')
</div>

<div class="card card-preview">
    <div class="card-inner">
        <table class="table datatable-init table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Sub-Category</th>
                    <th class="text-center" scope="col">Category</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                <tr id="sid{{$data->id}}">
                    <td class="text-center" scope="row">{{$key+1}}</td>
                    <td class="text-center">{{ $data->category }}</td>
                    <td class="text-center">{{ $data->subject['name'] }}</td>

                    <td class="text-center">
                        @if ( $data->status == 1 )
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>
                        @else
                        <span class="btn btn-xs btn-dim btn-outline-danger">InActive</span>
                        @endif
                    </td>
                    <td class="text-center" width="20%">
                            <a class="btn btn-icon btn-xs btn-secondary" href="javascript:void(0)" onclick="editCategory({{$data->id}})"  title="edit"><em class="icon ni ni-edit"></em></a>
                            <button class=" btn btn-icon btn-xs btn-danger" onclick="deleteConfirmation({{$data->id}})"><em class="icon ni ni-trash"></em></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="float:left;">
        {{ ($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)}} of {{$datas->total()}} entries
        </div>
        <div style="float:right;">
        {{ $datas->appends(request()->input())->links() }}
        </div>
</div>


<!-- Model For Creating Subject  -->
<div class="modal fade zoom"" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="subCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="categoryStore" id="categoryStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Add Sub-Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div>
                        <label class="form-label" for="Subject"> Category<span  class="required text-danger">*</span></label>
                        <select class="form-select" data-search="on" name="subject_id" id="subject_id" required oninvalid="this.setCustomValidity('Please Select Category')" oninput="setCustomValidity('')">
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br />
                    <div class="md-form">
                        <label class="form-label" for="category"> Sub-Category<span  class="required text-danger">*</span></label>
                        <input name="category" class="form-control" type="text" required oninvalid="this.setCustomValidity('Please Enter Sub-Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />

                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug<span  class="required text-danger">*</span></label>
                        <input name="slug" id="slug" class="form-control" type="text" />
                    </div>
                    <br />
                    <div>
                        <label class="form-label" for="status">Status<span  class="required text-danger">*</span></label><br />

                        <div class="custom-control custom-radio">
                            <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active" checked name="status" value="1" />
                            <label class="custom-control-label" for="Active">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive" name="status" value="0" />
                            <label class="custom-control-label" for="InActive">Inactive</label>
                        </div>
                    </div>
                    <br />

                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="ajaxSubmit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Model For Editing Subject -->
<div class="modal fade zoom" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="subCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="updateStore" id="updateStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Edit Sub-Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div>
                        <label class="form-label" data-error="wrong" data-success="right" for="Subject"> Category<span  class="required text-danger">*</span></label>
                        <select class="form-select" data-search="on" name="subject_id" id="subject_id1" required oninvalid="this.setCustomValidity('Please Select Category')" oninput="setCustomValidity('')" >
                            <option value="">Please Select</option>
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="subjectName">Sub-Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="category" id="name1" required oninvalid="this.setCustomValidity('Please Enter Sub-Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />

                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug</label>
                        <input name="slug" id="slug1" class="form-control" type="text" />
                    </div>
                    <br />
                    <label class="form-label" for="status">Status</label><br />

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active1" name="status" value="1" />
                        <label class="custom-control-label" for="Active1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive1" name="status" value="0" />
                        <label class="custom-control-label" for="InActive1">Inactive</label>
                    </div>
                    <br />

                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="Submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection @section('javascript')

<script>
    // Script For Storing
    $("#categoryStore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/admin/previous-year-questions/sub-categories/store",
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
                    $("#createCategory").modal("hide");
                    location.reload(true);

                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
                //   alert('data not saved')
            },
        });
    });
</script>

<!-- Script For Editing -->
<script>
    function editCategory(id) {
        $.get("/admin/previous-year-questions/sub-categories/edit/" + id, function (subject) {
            $("#id").val(subject.id);
            $("#subject_id1").val(subject.subject_id).change();
            $("#name1").val(subject.category);
            $("#slug1").val(subject.slug);



            if (subject.status == 0) $("#editCategory").find(":radio[name=status][value=0]").prop("checked", true);
            else $("#editCategory").find(":radio[name=status][value=1]").prop("checked", true);

            $("#editCategory").modal("toggle");
        });
    }
</script>

<!-- Script for updating -->
<script>
    $("#updateStore").submit(function (e) {
        e.preventDefault();
        let id = $("#id").val();
        $.ajax({
            url: "/admin/previous-year-questions/sub-categories/update/" + id,
            type: "post",
            data: $("#updateStore").serialize(),
            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
                    $(".alert-danger").hide();
                    $("#editCategory").modal("hide");
                    location.reload(true);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>

{{-- Sweet=Alert --}}
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
    url: "/admin/previous-year-questions/sub-categories/destroy/" + id,
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
    //Script For Auto-Closing Alert
    $(".alert").delay(1500).fadeOut(300);
</script>

@endsection
