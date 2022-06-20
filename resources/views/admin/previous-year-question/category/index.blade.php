@extends('admin.layouts.master') @section('content')
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase">
            Category Management

            <a href="{{route('create_previous')}}" class="btn btn-success btn-rounded float-right" data-toggle="modal" data-target="#createSubject"><em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>

<!-- Session Message -->
@include('admin.layouts.error')

<div class="card card-preview">
    <div class="card-inner">
        <table class="datatable-init table">
            <thead class="thead-dark">
                {{-- <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr> --}}
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Free/Premium</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                <tr id="sid{{$data->id}}">
                    <td class="text-center" scope="row">{{$key+1}}</td>
                    <td class="text-center">{{ $data->name }}</td>
                    <td class="text-center">
                        @if ($data->price != null)
                        {{ $data->price }}
                        @else
                        NA
                        @endif
                        </td>
                    <td class="text-center"> <img  style="height: 50px; width:50px;" src="{{ asset($data->image) }}" alt=""> </td>
                    <td class="text-center">
                        @if ( $data->status == 1 )
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>
                        @else
                        <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center" id="status" ><span  data-attr="{{route('batch_status',['id'=>$data->id ,'type' => 3])}}" class="btn btn-xs btn-dim batchstatus btn-outline-{{isset($data->isFree) && ($data->isFree == 1) ? "warning" : "success"}}">{{($data->isFree == 1)? "Free" : "Premium" }}</span></td>

                    <td class="text-center">
                            <a href="javascript:void(0)" onclick="editSubject({{$data->id}})"  title="Edit" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>
                            <button class=" btn btn-icon btn-xs btn-danger" onclick="deleteConfirmation(this)" data-id="{{ $data->id }}" data-url="{{ route('destroy_previous_subject',$data->id) }}"><em class="icon ni ni-trash"></em></button>

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
<!-- .card-preview -->



{{-- Model For Creating Subject --}}
<div class="modal fade zoom" id="createSubject" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-uppercase">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" name="categorystore" id="categorystore" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form  ">
                        <label class="form-label" data-error="wrong" data-success="right" for="subjectName">Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" required oninvalid="this.setCustomValidity('Please Enter Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />
                    <div class="md-form ">
                        <label class="form-label" data-error="wrong" data-success="right" for="price">Price (Rs)<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" id="price" required oninvalid="this.setCustomValidity('Please Enter Price')" oninput="setCustomValidity('')" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label" for="default-06">Select Banner Image<span  class="required text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" name="image" required oninvalid="this.setCustomValidity('Please Select Banner Image')" oninput="setCustomValidity('')"class="custom-file-input" id="image">
                                <label class="custom-file-label" for="customFile">Choose image</label>
                            </div>
                        </div>
                    </div>
                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug<span  class="required text-danger">*</span></label>
                        <input name="slug" id="slug" class="form-control " type="text" />
                    </div>
                    <br />
                    <label class="form-label" for="status">Status</label><br />

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="1" checked id="status_active" />
                        <label class="custom-control-label" for="status_active">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="0" id="status_inactive" />
                        <label class="custom-control-label" for="status_inactive">Inactive</label>
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


{{-- Model @e --}} {{-- Model For Editing Subject --}}
<div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" name="updateCategory" id="updateCategory"  enctype="multipart/form-data"  >
                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="subjectName">Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name1" required oninvalid="this.setCustomValidity('Please Enter Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />

                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="amount">Price (Rs)<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" id="price1" required oninvalid="this.setCustomValidity('Please Enter Price')" oninput="setCustomValidity('')" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label" for="default-06">Select Banner Image</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" name="image" class="custom-file-input" >
                                <label class="custom-file-label" for="customFile">Choose image</label>
                                <img id="image1" src="" style="height: 50px;">

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug</label>
                        <input name="slug" id="slug1" class="form-control col-md-5" type="text" />
                    </div>
                    <br />
                    <label class="form-label" for="status">Status<span  class="required text-danger">*</span></label><br />
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="1" checked id="status_active1" />
                        <label class="custom-control-label" for="status_active1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="0" id="status_inactive1" />
                        <label class="custom-control-label" for="status_inactive1">Inactive</label>
                    </div>

                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="Submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Model @e --}}

@endsection



@section('javascript') {{-- Script for Storing --}}
<script>

$("#categorystore").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData($('#categorystore')[0]);
    $.ajax({
        url: "/admin/previous-year-management/category/store",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
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
                $("#createSubject").modal("hide");
                // location.reload(true);
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
    function editSubject(id) {
        $.get("/admin/previous-year-management/category/edit/" + id, function (subject) {
            $("#id").val(subject.id);
            $("#name1").val(subject.name);
            $("#price1").val(subject.price);
            $("#image1").attr("src","/" + subject.image);
            $("#slug1").val(subject.slug);
            if (subject.status == 0) $("#editSubject").find(":radio[name=status][value=0]").prop("checked", true);
            else $("#editSubject").find(":radio[name=status][value=1]").prop("checked", true);

            $("#editSubject").modal("toggle");
        });
    }
</script>

{{-- Script for updating --}}
<script>
    $("#updateCategory").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($('#updateCategory')[0]);
        let id = $("#id").val();
        $.ajax({
            url: "/admin/previous-year-management/category/update/" + id,
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
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

{{-- Sweet=Alert --}}
<script type="text/javascript">
    function deleteConfirmation(d) {
    var id= $(d).data('id');
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
    type: 'POST',
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


{{-- Script For Auto-Closing Alert --}}
<script>
    $(".alert").delay(1500).fadeOut(300);
</script>


<script>
    $(".batchstatus").on("click", function (e) {
        e.preventDefault();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: $(this).attr("data-attr"),
            type: "post",
            data: {_token: CSRF_TOKEN},

            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },

            success: function (response) {
                location.reload();
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




@endsection
