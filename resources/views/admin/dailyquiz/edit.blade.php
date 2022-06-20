@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Quiz Management - Edit<a href="{{route('daily_quiz')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card card-preview">
        <div class="card-inner">
            @include('admin.layouts.error')
            <ul class="nav nav-tabs mt-n3">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->get('tab') == 1)?'active':'' }}  " data-toggle="tab" href="#editTabContent" id="editTabNav" ><em class="icon ni ni-edit"></em><span>Edit Test</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->get('tab') == 2 || (isset($tab) && $tab ==2))?'active':'' }}" data-toggle="tab" href="#addQuestions" id="edittab" ><em class="icon ni ni-plus"></em><span>Add Questions</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->get('tab') == 3)?'active':'' }}  " data-toggle="tab" href="#removeQuestions"><em class="icon ni ni-minus"></em><span>Remove Questions</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane {{ (request()->get('tab') == 1)?'active':'' }}  " id="editTabContent">
                    <div class="nk-block nk-block-lg">
                        <div class="row g-gs">
                            <div class="col-lg-12">
                                <div class="card h-100">
                                    <div class="card-inner">
                                        <form id="updateForm" action="{{route('update_daily_quiz',$datas->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="">

                                                <div class="form-group row">
                                                    <label class="form-label col-md-3" for="name">Test Name</label>
                                                    <div class="col-md-9">
                                                        <div class="form-control-wrap">
                                                            <input type="text" value="{{$datas->name}}" name="name" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="form-label col-md-3" for="duration">Test Duration (in minutes)</label>
                                                    <div class="col-md-9">
                                                        <div class="form-control-wrap">
                                                            <input type="text" value="{{$datas->duration}}" name="duration" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="form-label col-md-3">Date</label>
                                                    <div class="col-md-9">
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="date" class="form-control date-picker-alt" data-date-format="dd-mm-yyyy" value="{{ date('d-M-y',strtotime($datas->date)) }}" >
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label class="form-label col-md-3">Time</label>
                                                    <div class="col-md-9">
                                                        <div class="form-control-wrap has-timepicker">
                                                            <input type="text" class="form-control time-picker" name="time" placeholder="Select Time"
                                                            value="{{
                                                            date('h:i A',strtotime($datas->time)) }}" >
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="form-label col-md-3" for="mark">Mark</label>
                                                    <div class="col-md-9">
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="mark" value="{{$datas->mark}}" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>





                                                <div class="form-group row">
                                                    <label class="form-label col-md-3" for="slug">Slug </label>
                                                    <div class="col-md-9">
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="slug" value="{{$datas->slug}}" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="status" class=" col-md-3">Status</label>
                                                    <div class="col-md-9">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active" name="status" value="1" {{ ($datas->status ==1)?'checked' : '' }} />
                                                            <label class="custom-control-label" for="Active">Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive" name="status" value="0" {{ ($datas->status ==0)?'checked' : '' }} />
                                                            <label class="custom-control-label" for="InActive">Inactive</label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="form-label col-md-3" for=""> </label>
                                                    <div class="col-md-9">
                                                        <button type="submit" class="btn btn-xs btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .nk-block -->
                </div>

                <div class="tab-pane {{ (request()->get('tab') == 2 || (isset($tab) && $tab ==2))?'active':'' }}" id="addQuestions">
                    <div class="card card-preview">
                        <div class="bg-light p-2 mb-2">
                            <form action="{{route('search_daily_quiz',$datas->id)}}" method="get" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-4">
                                        <select name="level" class="form-select" data-search="on" id="custom">
                                            <option value="">Filter By Level</option>
                                            <option value="0">All</option>
                                            <option value="1" {{ ( isset($level) &&($level ==1))?'selected' : '' }}>Easy</option>
                                            <option value="2" {{ ( isset($level) &&($level ==2))?'selected' : '' }}>Medium</option>
                                            <option value="3" {{ ( isset($level) &&($level ==3))?'selected' : '' }}>Hard</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <select name="subject_id" id="subject" class="form-select" data-search="on">
                                                <option value="">Filter By Subject</option>
                                                <option value="0">All</option>
                                                @foreach ($subjects as $value)
                                                <option value="{{$value->id}}"
                                                @if(isset($subject) && !empty($subject) && ($subject == $value->id))
                                                    Selected = "selected"
                                                @endif>{{$value->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <a href="{{route('edit_daily_quiz',$datas->id)}}" class="btn btn-sm float-left btn-secondary">Reset</a>
                                            <button class="btn btn-primary btn-sm ml-2">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <form id="form2" action="{{route('update_daily_test_quiz',$datas->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-left: 0px;">
                                <input type="button" onclick='selects()' class="btn btn-xs btn-dark"  value="Select All"/> &nbsp;
                                <input type="button" onclick='deselects()' class="btn btn-xs btn-danger"  value="De-Select All"/>

                            </div><br>

                            <table id="" class="table table-striped datatable-init py-2  table" cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Serial.No</th>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($q as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><input type="checkbox" class="chk" name="question_id[]" value="{{$value->id}}" /></td>

                                        <td>{!!$value->question!!}</td>
                                        <td>{{$value->subject['name']}}</td>
                                        <td>
                                            @if ($value['level']==1) Easy @elseif($value['level']==2) Medium @else Hard @endif
                                        </td>
                                        <td><a target="_blank" href="{{route('edit_question',$value->id)}}" class="btn btn-xs btn-dark " ><em class="icon ni ni-edit"></em></a></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="test_id" value="{{$datas->id}}" />
                            @if ($q->isEmpty() )
                            <button class=" mt-3 btn btn-danger btn-xs" style="display:none;" type="submit">Add</button>
                            @else
                            <button class=" mt-3 btn btn-primary btn-xs" type="submit">Add</button>
                            @endif
                        </form>

                    </div>
                    <br>
                    <div style="float:left;">
                        {{ ($q ->currentpage()-1) * $q ->perpage() +count ($q)}} of {{$q->total()}} entries
                        </div>
                        <div style="float:right;">
                            <span id="pagination_click"  >{{$q->links()}}</span>

                        </div>

                </div>
                <!-- .card-preview -->

                <div class="tab-pane {{ (request()->get('tab') == 3)?'active':'' }}  " id="removeQuestions">
                    <div class="card card-preview">
                        <form action="{{route('delete_daily_test_quiz',$datas->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-striped datatable-init">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Serial.No</th>
                                        <th scope="col"><input type="checkbox" name="delete_all" value="1" id="selectallDelete" /></th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">level</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($show as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$value->id}}" name="question_id[]" value="{{$value->id}}" /></td>

                                        <td>{!!$value->question['question']!!}</td>
                                        <td>{{$value->question->subject['name']}}</td>
                                        <td>
                                            @if ($value->question['level']==1) Easy @elseif($value->question['level']==2) Medium @else Hard @endif

                                        </td>
                                        <td><a target="_blank" href="{{route('edit_question',$value->question['id'])}}" class="btn btn-xs btn-dark " ><em class="icon ni ni-edit"></em></a></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($show->isEmpty() )
                            <button class=" mt-3 btn btn-danger btn-xs" style="display:none;" type="submit">Delete</button>
                            @else
                            <button class=" mt-3 btn btn-danger btn-xs" type="submit">Remove</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @section('javascript')

<script>
    $("#datePicker").datepicker().datepicker("setDate", new Date());
</script>

<script>
    $(document).ready(function () {
        $("#category").on("click", function (e) {
            var subject_id = e.target.value;
            $.ajax({
                url: "{{ route('subcat') }}",
                type: "POST",
                data: {
                    subject_id: subject_id,
                },

                success: function (data) {
                    $("#subcategory").empty();
                    $.each(data.subcategories, function (index, subcategory) {
                        if (subcategory.id == subject_id) {
                            $("#subcategory").append('<option value="' + subcategory.id + '">' + subcategory.category + "</option>");
                            } else {
                            $("#subcategory").append('<option value="' + subcategory.id + '">' + subcategory.category + "</option>");
                        }
                    });
                },
            });
        });

        var table = $("#addTable").DataTable({
            columnDefs: [
            {
                targets: 0,
                searchable: true,
                orderable: false,
                className: "dt-head-center",
            },
            ],
            aoColumns: [
            {
                sName: "",
            },
            {
                sName: "question",
            },
            {
                sName: "subject",
            },
            {
                sName: "level",
            },
            ],
            order: [[1, "asc"]],
            dom: "lrtip",
        });

        // $("#selectAllAdd").on("click", function (e) {
        //     var rows = table
        //     .rows({
        //         search: "applied",
        //     })
        //     .nodes();
        //     // Check/uncheck checkboxes for all rows in the table
        //     $('input[type="checkbox"]', rows).prop("checked", this.checked);
        // });

        $("#selectallDelete").on("click", function (e) {
            if ($(this).is(":checked", true)) {
                $(".sub_chk").prop("checked", true);
                } else {
                $(".sub_chk").prop("checked", false);
            }
        });



        $("[data-toggle=confirmation]").confirmation({
            rootSelector: "[data-toggle=confirmation]",
            onConfirm: function (event, element) {
                element.trigger("confirm");
            },
        });






        // Handle form submission event
        $("#frm-example").on("submit", function (e) {
            var form = this;

            // Iterate over all checkboxes in the table
            table.$('input[type="checkbox"]').each(function () {
                // If checkbox doesn't exist in DOM
                if (!$.contains(document, this)) {
                    // If checkbox is checked
                    if (this.checked) {
                        // Create a hidden element
                        $(form).append($("<input>").attr("type", "hidden").attr("name", this.name).val(this.value));
                    }
                }
            });
        });
    });
</script>

<script type="text/javascript">
    function selects(){
        var ele=document.getElementsByClassName('chk');
        for(var i=0; i<ele.length; i++){
            if(ele[i].type=='checkbox')
                ele[i].checked=true;
        }
    }
    function deselects(){
        var ele=document.getElementsByClassName('chk');
        for(var i=0; i<ele.length; i++){
            if(ele[i].type=='checkbox')
                ele[i].checked=false;

        }
    }
</script>

<script>
    var url = window.location.href;

    if (url.search("%40%24") >= 0) {

        $('#editTabNav').removeClass('active');
        $('#editTabContent').removeClass('active');
        $('#addQuestionTab').addClass('active');
        $('#edittab').addClass('active');

    }
 </script>


<script>

$('.page-link').on('click', function (e) {
e.preventDefault();
var url_num = $(this).text();

const urlParams = new URLSearchParams(window.location.search);

urlParams.set('set', '@$');
urlParams.toString();
urlParams.set('page', url_num);

window.location.search = urlParams;



});
</script>




@endsection
