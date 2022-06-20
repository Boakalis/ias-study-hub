@extends('website.Layout.master')
@section('meta_title')
<title>IAS Test Series Reports | IAS StudyHub</title>
@endsection
@section('content')
<!-- content @s -->
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">IAS TEST SERIES REPORT</h4>
                                <p> <span class="btn btn-xs btn-outline-info" >Note</span> Click <i class="fas fa-plus text-dark " ></i> &nbsp; Symbol in S.No to view Hidden details</p>

                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr >

                                            <th width=10%  class="text-center" > <span class="" >S.NO</span> </th>
                                            <th width=50% class="text-center" > <span class="" > TEST DETAILS</span></th>
                                            {{-- <th >Mark Obtained</th> --}}
                                            <th width=20%  class="text-center"> <span class="" >ATTEMPT DATE</span> </th>
                                            <th width=20%  class="text-center"> <span class="" >VIEW
                                                {{-- /DOWNLOAD --}}
                                            </span> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (isset($datas) && !empty($datas))
                                        @foreach ($datas as $key => $data)
                                        <tr >
                                            <td width=10% >
                                                {{$key +1 }}
                                            </td>
                                            <td width=50% >
                                               {{$data->test->name}}
                                               <span class="badge badge-dot badge-gray d-flex">BATCH NAME:{{$data->batch->name}}</span>
                                               <span class="badge badge-dot badge-gray d-flex">SERIES NAME:{{$data['batch']['series']['name']}}</span>
                                            </td>
                                            {{-- <td>
                                                {{$data->marks_obtained}}
                                            </td> --}}
                                            <td width=20% >
                                                <span class="badge badge-dot badge-gray d-flex">{{date('d-F-Y',strtotime($data->date))}}</span>


                                            </td>

                                            <td width=20%>
                                                <button class="btn btn-xs btn-dim btn-primary p-1" data-toggle="modal" id="reportShow" data-target="#test-report"
                                                data-attr="{{route('show_report',$data->id)}}" title="show">
                                                <em class="fas fa-eye "></em>&nbsp;View</button>

                                                {{----}}
                                                 <form action="{{route('generatePDF',['parameter' => Crypt::encrypt($data->id) , 'encrypted_user_id' =>Crypt::encrypt(Auth::user()->id)])}}" method="get"  class="d-inline-block">
                                                    @csrf

                                                    <input type="hidden" name="test" value="{{$data->test['name']}}">
                                                    <input type="hidden" name="batch" value="{{$data->batch['name']}}">
                                                    <input type="hidden" name="course_id" value="1">
                                                    <input type="hidden" name="test_id" value ="{{$data->id}}">
                                                    <input type="hidden" name="series" value="{{$data->batch['series']['name']}}">
                                                    <button class="btn btn-dim btn-xs btn-warning p-1" href="" title="download"><i class="fas fa-cloud-download-alt"></i>&nbsp;Download</button>
                                                </form> {{----}}

                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- medium modal -->
<div class="modal fade zoom" id="test-report" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Test Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="body">
            <div>
                <!-- the result to be displayed apply here -->
            </div>
        </div>
    </div>
</div>
</div>




<div class="modal fade zoom" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Answers</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="nk-block">
                            <div class="row gy-gs">
                                <div class="col-md-4 col-lg-4">
                                    <div class="nk-wg-card is-s1 card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Correct<em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text">
                                                    <div class="nk-iv-wg2-amount"> 5 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-4 col-lg-4">
                                    <div class="nk-wg-card is-s1 card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Incorrect <em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text">
                                                    <div class="nk-iv-wg2-amount"> 4</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-4 col-lg-4">
                                    <div class="nk-wg-card is-s1 card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Un-Attempted <em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text">
                                                    <div class="nk-iv-wg2-amount"> 3</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                            <div class="row gy-gs">
                                <div class="col-md-12 col-lg-12">
                                    <div class="nk-wg-card is-dark card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2 text-center">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Your Result <em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text text-center">
                                                    <div class="nk-iv-wg2-amount d-block"> 25/30</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                    </div><!-- .tab-pane -->
                    <div class="tab-pane" id="address">
                        <div class="gy-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Correct Answer</th>
                                        <th scope="col">Your Answer</th>
                                        <th scope="col">Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>A</td>
                                        <td>B</td>
                                        <td>Correct</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>A</td>
                                        <td>B</td>
                                        <td>Inorrect</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>A</td>
                                        <td>B</td>
                                        <td>Un-Attempted</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<!-- content @e -->
@endsection

@section('javascript')
<script>
    // display a modal (small modal)
    $(document).on('click', '#reportShow', function(event) {
        event.preventDefault();

        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#body').html(result.html).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000

        })


    });
</script>

@endsection
