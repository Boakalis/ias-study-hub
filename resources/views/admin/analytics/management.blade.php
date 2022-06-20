@extends('admin.layouts.master') @section('content')
<div class="row">
    {{-- @include('website.Layout.breadcrumb') --}}
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Referer Management <a href="#" data-toggle="modal" data-target="#createSubject" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Referer URL</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                <tr id="sid{{$data->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{Str::ucfirst($data->name)}}</td>
                    <td>{{($data->url)}}</td>
                    <td class="text-center">
                        @if ($data->status==1)
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>

                        @else
                        <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                        @endif
                    </td>

                    <td class="text-center">
                        <a href="javascript:void(0)" onclick="editSubject({{$data->id}})" title="edit" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>
                        <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation({{$data->id}})" title="Delete"><em class="icon ni ni-trash"></em></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{-- <div style="float:left;">
        {{ ($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)}} of {{$datas->total()}} entries
        </div>
        <div style="float:right;">
        {{ $datas->appends(request()->input())->links() }}
        </div> --}}
</div>

<!-- Model For Creating Subject  -->
<div class="modal fade zoom" id="createSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="subjectStore" id="subjectStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Referer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Enter Name<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" required oninvalid="this.setCustomValidity('Please Enter Name')" oninput="setCustomValidity('')" />
                    </div>
                    <br />
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Enter Password<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="password" id="password" required oninvalid="this.setCustomValidity('Please Enter Password')" oninput="setCustomValidity('')" />
                    </div>
                    <br />
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Generate Camapign Url<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="url" id="url" required oninvalid="this.setCustomValidity('Please Generate Url')" oninput="setCustomValidity('')" />
                    </div>
                    <small><a target="_blank"  href="https://ga-dev-tools.web.app/ga4/campaign-url-builder/">Generate URL Now <i class="fas fa-external-link-alt"></i>  </a><span class="btn btn-xs btn-info" onclick="copyText()">Copy text</span></small>

                    <br /><br>

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
<div class="modal fade zoom" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="updateStore" id="updateStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Referer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Enter Name<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name1" required oninvalid="this.setCustomValidity('Please Enter Name')" oninput="setCustomValidity('')" />
                    </div>
                    <br />
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Enter Password<span  class=" text-danger">*</span></label>
                        <input type="text" class="form-control" name="password" id="password1" placeholder="Change Password if needed or leave the field empty"  />
                    </div>
                    <br />
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Generate Camapign Url<span  class="required text-danger">*</span></label>
                        <input type="text"  class="form-control" name="url" id="url1" required oninvalid="this.setCustomValidity('Please Generate Url')" oninput="setCustomValidity('')" />
                    </div>
                    <small><a target="_blank"  href="https://ga-dev-tools.web.app/ga4/campaign-url-builder/">Generate URL Now <i class="fas fa-external-link-alt"></i> </a><span class=" btn-xs btn btn-info" onclick="copy()">Copy text</button> </small>

                    <br /><br>

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


@endsection
@section('javascript')
{{-- Script For Storing --}}
<script>
    $("#subjectStore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('create_referer') }}",
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
                    setTimeout(function(){
                          $(".alert-danger").hide();
                    }, 3000);
                } else {
                    $(".alert-danger").hide();
                    // $("#createSubject").modal("hide");
                    // location.reload(true);
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

<script>
    function editSubject(id) {
        $.get("/admin/edit-referer/" + id, function (subject) {
            $("#id").val(subject.id);
            $("#name1").val(subject.name);
            $("#url1").val(subject.url);
            if (subject.status == 0) $("#editSubject").find(":radio[name=status][value=0]").prop("checked", true);
            else $("#editSubject").find(":radio[name=status][value=1]").prop("checked", true);

            $("#editSubject").modal("toggle");
        });
    }
</script>

<script>
    $("#updateStore").submit(function (e) {
        e.preventDefault();
        let id = $("#id").val();
        $.ajax({
            url: "/admin/update-referer/" + id,
            type: "post",
            data: $("#updateStore").serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },
            success: function (response) {
                //console.log(response);
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });

                     setTimeout(function(){
                          $(".alert-danger").hide();
                    }, 3000);

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

<script>

function copyText() {
  var copyText = document.getElementById("url");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  navigator.clipboard.writeText(copyText.value);
}

function copy() {
  var copyText = document.getElementById("url1");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  navigator.clipboard.writeText(copyText.value);
}

</script>

@endsection
