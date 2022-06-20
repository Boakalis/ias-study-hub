@extends('website.Layout.master')
@section('title',$data->name)
@section('content')
    <!-- content @s -->
    <div class="nk-content px-0">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 ">
                                <div class="card">
                                    <div class="card-inner card-inner-md">
                                        <div class="nk-block-head nk-block-head-md">
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content col-lg-12 px-0 ">
                                                    <h4 class="nk-block-title text-uppercase float-left ">{{$data->name}} </h4>
                                                        <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="nk-data data-list mt-0">
                                            @include('admin.layouts.error')

                                            <ul class="sp-pdl-list">
                                                @if (isset($data->batch) && !empty($data->batch))
                                                @foreach($data->batch as $batch)
                                                <input type="hidden" id="batch{{$batch->id}}" value="{{route('testoverview',['series_slug' =>$batch->series->slug, 'batch_slug' =>$batch->slug])}}" >
                                                @if ($batch->isClosed == 1)
                                                <li onclick="modalfun(this)" data-name="{{$batch->name}}" class="btn btn-hover color-1 mt-2 mb-2 ml-0 test-series-box">
                                                @else
                                                <li onclick="routefun({{$batch->id}})" class="btn btn-hover color-1 mt-2 mb-2 ml-0 test-series-box">
                                                @endif
                                                    <div class="nk-block">

                                                            @if ($batch->isClosed == 1)
                                                            <h6 class="mb-2"><a href="#" onclick="modalfun(this)"  data-name="{{$batch->name}}" class="text-center text-white"> {{$batch->name}}</a></h6>
                                                            @else
                                                            <h6 class="mb-2"><a href="{{route('testoverview',['series_slug' =>$batch->series->slug, 'batch_slug' =>$batch->slug])}}" class="text-white">{{$batch->name}}</a></h6>
                                                            @endif

                                                            {{-- <span class="badge badge-dim badge-primary badge-pill">Free</span> --}}

                                                            <table class="table table-bordered font-16">
                                                                <tr class="text-white">
                                                                    <td>Total Test</td>
                                                                    <td>{{ $batch->test->count() }}</td>
                                                                </tr>
                                                                @if ($batch->isClosed == 1)
                                                                <tr>
                                                                    <th colspan="2"> <span class="btn btn-md btn-warning d-block  font-16">Batch Closed</span></th>
                                                                </tr>
                                                                 @else
                                                                <tr class="text-white">
                                                                    <td>Start Date</td>
                                                                    <td>{{ date('d-M-Y',strtotime($batch->start_date)) }}</td>
                                                                </tr>
                                                                @endif
                                                                <tr>
                                                                    <th colspan="2"> <span class="btn btn-md btn-warning d-block  font-16">
                                                                            {{-- This Condition is provided for client need not included in development logic so ignore --}}
                                                                            @if ($batch->slug === 'pts-1' || $batch->slug === 'pts-2' )
                                                                            Online Only
                                                                            @else
                                                                            Online + PDF
                                                                            @endif
                                                                        </span></th>
                                                                </tr>
                                                            </table>
                                                            {{--<h5 class="text-center text-white">Total Tests: <span>{{ $batch->test->count() }}</span></h5>
                                                            @if ($batch->isClosed == 1)
                                                                    <span class="btn btn-md btn-warning d-block">Batch Closed </span>
                                                            @else
                                                                <span>Start Date:</span>
                                                                <span>{{ date('d-M-Y',strtotime($batch->updated_at)) }}</span>
                                                            @endif


                                                            <small>Online + PDF </small>
                                                            --}}

                                                    </div>
                                                    {{-- <div class="sp-pdl-btn">
                                                        <a href="{{route('testoverview',['series_slug' =>$batch->series->slug, 'batch_slug' =>$batch->slug])}}" class="btn btn-primary text-uppercase">Batch Test</a>
                                                    </div> --}}
                                                </li><!-- .sp-pdl-item -->
                                                @endforeach

                                                @endif
                                            </ul>
                                        </div><!-- data-list -->

                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="batchModal" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body"  >

            </div>
          </div>
        </div>
      </div>
    @endsection

@section('javascript')

<script>
    function routefun(id) {
        let url = id
        url_path = $('#batch'+id).val()
        document.location.href = url_path;
    }


</script>

<script>
    function modalfun(e){
        var name  = $(e).attr('data-name');
        Swal.fire({
            icon : 'error',
            title: name+' closed.',
            text: 'Please proceed to the current batch',
            //padding: '3em',
            background: '#fff url(/images/trees.png)',
            timer:1500,
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `
})
                    }

</script>

@endsection

