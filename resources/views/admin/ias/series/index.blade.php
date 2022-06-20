@extends('admin.layouts.master') @section('content')
<div class="row">
    {{-- @include('website.Layout.breadcrumb') --}}
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Series Management <a href="{{route('create_series')}}" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>

<div class="table px-2">
 @include('admin.layouts.error')
<div class="col-lg-12">
    <span class=" alert-success   " role="alert" style="display: none" id="position_alert" > Position Updated Successfully</span><br>

</div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table table table-bordered table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Banner Image</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="tablecontents" >
                    @foreach ($datas as $key => $data)
                    <tr class="row1" data-id="{{ $data->id }}" >
                        <td class="sort-class" >{{$key+1}}</td>
                        <td class="sort-class"  >{{$data->name}}</td>
                        <td class="sort-class text-center "  > <img   style="height: 50px; width: 50px;" src="{{asset($data->image)}}" alt=""> </td>
                        <td class="sort-class text-center "  ><span class="btn btn-xs btn-dim btn-outline-{{isset($data->status) && ($data->status == 1) ? "success" : "danger"}}">{{($data->status == 1)? "Active" : "Inactive" }}</span></td>
                        <td class="text-center sort-class ">
                            <form action="{{ route('destroy_series',$data->id) }}" method="POST">
                                <a class="btn btn-icon btn-xs btn-primary" href="{{ route('show_series', $data->id )}}" >
                                    <em class="icon ni ni-eye"></em>
                                </a>
                                <a href="{{ route('edit_series',$data->id) }}" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>
                                @csrf @method('post')
                                <button class="btn btn-icon btn-xs btn-danger" onclick="deleteConfirmation({{$data->id}})" type="submit"><em class="icon ni ni-trash"></em></button>
                            </form>
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

@endsection @section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


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
    url: "{{url('/admin/ias-series/destroy-series/')}}/" + id,
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


<script type="text/javascript">
    $(function () {

        $("#table").DataTable();


        $("#tablecontents").sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function () {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];
            var token = $('meta[name="csrf-token"]').attr('content');
            $('tr.row1').each(function (index, element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index + 1
                });

            });

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('order_change') }}",
                data: {
                    order: order,
                    _token: token
                },
                success: function (response) {
                    if (response.status == 200) {
                         $("#position_alert").show();
                         setTimeout(function(){ $("#position_alert").hide(); }, 1000);

                    } else {
                        console.log(response);
                    }
                }
            });
        }
    });

</script>



@endsection
