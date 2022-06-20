@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Batch Management <a href="{{route('create_batch')}}" class="btn btn-success btn-rounded float-right"> <em
                    class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>

<div class="table px-2">
    @include('admin.layouts.error')
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table table table-bordered table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Batch Name</th>
                        <th scope="col">Series</th>
                        <th scope="col" class="">Price(₹)</th>
                        <th scope="col" class="text-center">Discount(%)</th>
                        <th scope="col" class="text-center">Starting Date</th>
                        <th scope="col" class="text-center">ON/OFF</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($datas as $key => $data)
                    <tr class="row1" data-id="{{ $data->id }}">
                        <td>{{$key+1}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->series['name']}}</td>
                        <td class="">{{$data->price}}</td>
                        <td class="text-center">{{$data->discount}}</td>
                        <td class="text-center">{{date('M-Y',strtotime($data->start_date))}}</td>

                        <td class="text-center" id="status" ><span  data-attr="{{route('batch_status',['id'=>$data->id ,'type' => 2])}}" class="btn btn-xs btn-dim batchstatus btn-outline-{{isset($data->isClosed) && ($data->isClosed == 1) ? "danger" : "success"}}">{{($data->isClosed == 1)? "OFF" : "ON" }}</span></td>

                        <td class="text-center" id="status" ><span  data-attr="{{route('batch_status',['id'=>$data->id ,'type' => 1])}}" class="btn btn-xs btn-dim batchstatus btn-outline-{{isset($data->status) && ($data->status == 1) ? "success" : "danger"}}">{{($data->status == 1)? "Active" : "Inactive" }}</span></td>
                        <td>
                            <a href="#" class="btn btn-icon btn-xs btn-primary" data-toggle="modal" id="showButton"
                                data-target="#showModal" data-attr="{{route('show_batch',$data->id)}}" title="View">
                                <em class="icon ni ni-eye"></em>
                            </a>
                            <a class="btn btn-icon btn-xs btn-secondary" href="{{ route('edit_batch',$data->id) }}">
                                <em class="icon ni ni-edit"></em>
                            </a>
                            <button class="btn btn-icon btn-xs btn-danger"
                                onclick="deleteConfirmation({{$data->id}})"><em class="icon ni ni-trash"></em></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div style="float:left;">
        {{ ($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)}} of {{$datas->total()}} entries
        </div>
        <div style="float:right;">
        {{ $datas->appends(request()->input())->links() }}
        </div>
</div>


<div class="modal fade zoom" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">Batch View</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>

            <div class="modal-body" id="showBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>



@endsection @section('javascript')



{{-- display a show modal) --}}
<script>
    $(document).on("click", "#showButton", function (event) {
        event.preventDefault();
        let href = $(this).attr("data-attr");
        $.ajax({
            url: href,
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $("#showModal").modal("show");
                $("#showBody").html(result).show();
            },
            complete: function () {
                $("#loader").hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $("#loader").hide();
            },
            timeout: 8000,
        });
    });

</script>

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
                    url: "{{url('/admin/ias/batch/destroy/')}}/" + id,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    beforeSend: function () {
                        // Show image container
                        $("#loader").show();
                    },
                    success: function (results) {
                        location.reload(true);

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
