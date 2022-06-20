@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            QUESTION-BANK - Test Management - Edit <a href="{{route('question_bank_question')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card card-preview">
        <div class="card-inner">
            @include('admin.layouts.error')
            <ul class="nav nav-tabs mt-n3">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->get('tab') == 1)?'active':'' }}"  data-toggle="tab" href="#editTabContent" id="editTabNav" ><em class="icon ni ni-edit"></em><span class="text-uppercase" >Edit details</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->get('tab') == 2 || (isset($tab) && $tab ==2))?'active':'' }}" data-toggle="tab" href="#addQuestionTab" id="edittab" ><em class="icon ni ni-plus"></em><span class="text-uppercase" >Add Questions</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->get('tab') == 3)?'active':'' }}" data-toggle="tab" href="#removeQuestionTab"><em class="icon ni ni-minus"></em><span class="text-uppercase" >Remove Questions</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane {{ (request()->get('tab') == 1)?'active':'' }}"  id="editTabContent">
                    <div class="nk-block nk-block-lg">
                        <div class="row g-gs">
                            <div class="col-lg-12">
                                <div class="card h-100">
                                    <form id="form1" action="{{route('update_question_bank',$datas->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="">


                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="name">Test Name<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" class="form-control" value="{{$datas->name}}" />
                                                        @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="category">Category<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="subject_id" data-search="on" id="category">
                                                            <option value="">Please Select</option>
                                                            @foreach ($subjects as $subject)
                                                            <option value="{{$subject->id}}" {{$subject->id == $datas->subject['id'] ? 'selected' : '' }}> {{$subject->subject}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('subject_id'))
                                                        <span class="text-danger">{{ $errors->first('subject_id') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="category_id">Sub-Category<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <select class=" form-select " name="category_id" data-search="on" id="subcategory">
                                                            <option value="">Please Select</option>
                                                            @foreach ($categories as $subcategory)
                                                            <option value="{{$subcategory->id}}" {{$subcategory->id == $datas->category['id'] ? 'selected' : '' }}> {{$subcategory->category}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('category_id'))
                                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="mark">Mark<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mark" class="form-control" value="{{$datas->mark}}" />
                                                        @if ($errors->has('mark'))
                                                        <span class="text-danger">{{ $errors->first('mark') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="duration">Test Duration (in minutes)<span
                                                style="color: red" class="required">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="duration" value="{{$datas->duration}}"
                                                        class="form-control">
                                                        @if ($errors->has('duration'))
                                                        <span class="text-danger">{{ $errors->first('duration') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="negativemark">Negativemark<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="negativemark" class="form-control" value="{{$datas->negativemark}}" />
                                                        @if ($errors->has('negativemark'))
                                                        <span class="text-danger">{{ $errors->first('negativemark') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="type">Type<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="type" data-search="on" id="type">
                                                            <option value="0" {{$datas->type==0 ? 'selected' : ''}} >Free</option>
                                                            <option value="1" {{$datas->type==1 ? 'selected' : ''}} >Paid</option>
                                                        </select>
                                                        @if ($errors->has('category_id'))
                                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="slug">Slug<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="slug" class="form-control" value="{{$datas->slug}}" />
                                                        @if ($errors->has('slug'))
                                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="status">Status<span style="color: red;"
                                                class="required">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">

                                                        <div class="custom-control custom-radio">
                                                            <input
                                                            class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}"
                                                            id="ForActive" type="radio" name="status" value="1"
                                                            {{ ($datas->status ==1)?'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                            for="ForActive">Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                            class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}"
                                                            id="ForInactive" type="radio" name="status" value="0"  {{ ($datas->status ==0)?'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                            for="ForInactive">Inactive</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="slug">Slug<span   class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-lg btn-primary btn-xs ">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .nk-block -->
                </div>

                <div class="tab-pane {{ (request()->get('tab') == 2 || (isset($tab) && $tab ==2))?'active':'' }}" id="addQuestionTab">
                    <div class="card card-preview">

                        <div class="bg-light p-2 mb-2">
                            <form action="{{route('search_question_bank_test',$datas->id)}}" method="get" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-4">
                                        <select name="level" class="form-select" data-search="on" id="custom">
                                            <option value="">Filter By Level</option>
                                            <option value="1">Easy</option>
                                            <option value="2">Medium</option>
                                            <option value="3">Hard</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <select name="subject_id" id="subject" class="form-select" data-search="on">
                                                <option value="">Filter By Subject</option>
                                                @foreach ($category as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <a href="{{route('edit_question_bank_question',['id'=>$datas->id,'tab'=>2])}}" class="btn btn-sm float-left btn-secondary">Reset</a>
                                            <button class="btn btn-primary btn-sm ml-2">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <form id="form2" action="{{route('update_question_bank_question',$datas->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="row" style="margin-left: 0px;">
                                <input type="button" onclick='selects()' class="btn btn-xs btn-dark"  value="Select All"/> &nbsp;
                                <input type="button" onclick='deselects()' class="btn btn-xs btn-danger"  value="De-Select All"/>

                            </div><br>

                            <table id="" class="table table-striped datatable-init py-2 display" cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" >Serial.No</th>
                                        <th scope="col" >S.No</th>

                                        <th scope="col">Question</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Edit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>

                                        <td><input type="checkbox" class="chk" name="question_id[]" value="{{$value->id}}" /></td>

                                        <td>{!! $value->question !!}</td>
                                        <td>{{$value->subject['name']}}</td>
                                        <td>
                                            @if ($value['level']==1) Easy @elseif($value['level']==2) Medium @else Hard @endif
                                        </td>
                                        <td><a target="_blank" href="{{route('edit_question',$value->id)}}" class="btn btn-xs btn-dark " ><em class="icon ni ni-edit"></em></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="bank_id" value="{{$datas->id}}" />
                            @if ($questions->isEmpty() )
                            <button class=" mt-3 btn btn-danger btn-sm" style="display:none;" type="submit">Add</button>
                            @else
                            <button class=" mt-3 btn btn-primary btn-xs" type="submit">Add</button>
                            @endif
                        </form>
                    </div>
                    <br>
                    <div style="float:left;">
                        {{ ($questions ->currentpage()-1) * $questions ->perpage() +count ($questions)}} of {{$questions->total()}} entries
                        </div>
                        <div style="float:right;">
                            <span id="pagination_click"  >{{$questions->links()}}</span>
                        </div>
                    </div>

                    <!-- .card-preview -->

                <div class="tab-pane {{ (request()->get('tab') == 3)?'active':'' }}" id="removeQuestionTab">
                    <div class="card card-preview">

                        <form action="{{route('destroy_question_bank_question',$datas->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-striped datatable-init">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Serial.No</th>

                                        <th scope="col"><input type="checkbox" name="delete_all" value="1" id="master" /></th>

                                        <th scope="col">Question</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">level</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showQuestion as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$value->id}}" name="question_id[]" value="{{$value->id}}" /></td>

                                        <td>{!! $value->question['question'] !!}</td>
                                        <td>{{$value->question->subject['name']}}</td>
                                        <td>
                                            @if ($value->question['level']==1) Easy @elseif($value->question['level']==2) Medium @else Hard @endif
                                        </td>

                                        <td><a target="_blank" href="{{route('edit_question',$value->question->id)}}" class="btn btn-xs btn-dark " ><em class="icon ni ni-edit"></em></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($showQuestion->isEmpty() )
                            <button class=" mt-3 btn btn-danger btn-sm" style="display:none;" type="submit">Delete</button>
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
        $(document).ready(function () {

            $("#category").trigger('click');

            var table = $("#example").DataTable({
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

        // $("#master1").on("click", function (e) {
        //     var rows = table
        //     .rows({
        //         search: "applied",
        //     })
        //     .nodes();
        //     // Check/uncheck checkboxes for all rows in the table
        //     $('input[type="checkbox"]', rows).prop("checked", this.checked);
        // });

        $("#master").on("click", function (e) {
            if ($(this).is(":checked", true)) {
                $(".sub_chk").prop("checked", true);
                } else {
                $(".sub_chk").prop("checked", false);
            }
        });
    });

    $("#category").on("click change", function (e) {
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

</script>
{{--
<script type="text/javascript">
    $(document).ready(function () {
        $("#subcategory").on("click change", function (e) {
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
                        $("#subcategory").append('<option value="' + subcategory.id + '" >' + subcategory.category + "</option>");
                    });
                },
            });
        });
    });
</script> --}}

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


