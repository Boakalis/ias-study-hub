@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Question Management <a href="{{route('question')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<!-- Session Message  -->

<div class="table">
@include('admin.layouts.error')
</div>

<div class="card card-preview">
    <div class="card-inner">
        <div class="card-body">
            <div class="card-head ">
                <h5 class="">Import Questions</h5>
            </div>
            <!-- <div class="pull-right">
                    <h5>Bulk Upload/Import</h5>
                </div> -->
            <div class="">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="file">Select File</label>

                            <div class="custom-file">
                                <input type="file" name="file" id="file" value="" onchange="OnFileValidation()" class="custom-file-input" accept=".csv, .xlsx" />
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Upload only below 2mb.
                              </small>
                            @if ($errors->has('file'))
                            <span class="text-danger">{{ $errors->first('file') }}</span><br />
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="file">Select Subject</label>
                            <select name="subject_id" class="form-select col-md-4" data-search="on" >
                                @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="file">&nbsp;</label>
                            <div class="d-block">
                                <button type="submit" class="btn btn-success">Import Question Data</button>
                            </div>
                            <!-- <a class="btn btn-warning" href="{{ route('export') }}">Export Question Data</a> -->
                        </div>
                    </div>
                </form>
            </div><br>

        </div>
    </div>
</div>
@endsection @section('javascript')
<script>
    //Script For Auto-Closing Alert
    $(".alert").delay(1500).fadeOut(300);
</script>

<script>

function OnFileValidation() {

var file = document.getElementById("file");

if (typeof (image.files) != "undefined") {

    var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);

    if(size > 2) {

        alert('Please select image size less than 2 MB');

    }else{

        alert('success');

    }

} else {

    alert("This browser does not support HTML5.");

}

}

</script>


@endsection
