@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Question Management - Add New<a href="{{route('question')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
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
            
            
            <form class="mb-5" action="{{ route('store_question') }}" method="POST" id="question-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="pb-4">
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Select Subject</label>
                        <div class="col-md-9">
                            <select name="subject_id" class="form-select col-md-4" data-search="on" id="">
                                @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="inputEmail4">Question<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="question"  class="form-control tinymce-editor" placeholder="Enter Your Question Here"></textarea>
                            @if ($errors->has('question'))
                            <span class="text-danger">{{ $errors->first('question') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="option_1">Option 1<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="option_1"  class="form-control tinymce-editor" placeholder="Enter Options For Question Here"></textarea>
                            @if ($errors->has('option_1'))
                            <span class="text-danger">{{ $errors->first('option_1') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="option_2">Option 2<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="option_2"  class="form-control tinymce-editor" placeholder="Enter Options For Question Here" )></textarea>
                            @if ($errors->has('option_2'))
                            <span class="text-danger">{{ $errors->first('option_2') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="option_3">Option 3<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="option_3"  class="form-control tinymce-editor" placeholder="Enter Options For Question Here"></textarea>
                            @if ($errors->has('option_3'))
                            <span class="text-danger">{{ $errors->first('option_3') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="option_4">Option 4<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="option_4"  class="form-control tinymce-editor" placeholder="Enter Options For Question Here" )></textarea>
                            @if ($errors->has('option_4'))
                            <span class="text-danger">{{ $errors->first('option_4') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3">Select option for Answer<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="form-control-wrap">
                                <select class="form-select" data-search="on" name="answers">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                </select>
                            </div>
                            @if ($errors->has('answers'))
                            <span class="text-danger">{{ $errors->first('answers') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="explanation">Explanation<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="explanation"  class="form-control tinymce-editor" placeholder="Enter Explanation For Question Here"></textarea>
                            @if ($errors->has('explanation'))
                            <span class="text-danger">{{ $errors->first('explanation') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="hint">Hint</label>
                        <div class="col-md-9">
                            <textarea name="hint"  class="form-control tinymce-editor" placeholder="Enter Hint For Question Here"></textarea>
                            @if ($errors->has('hint'))
                            <span class="text-danger">{{ $errors->first('hint')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="level">Difficulty Level<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <select name="level" id="level" class="form-select form-control-sm" style="" data-search="on">
                                <option value="1">Easy</option>
                                <option value="2">Medium</option>
                                <option value="3">Hard</option>
                            </select>
                        </div>
                        @if ($errors->has('level'))
                        <span class="text-danger">{{ $errors->first('level') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="status ">Status<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="1" checked id="status_active" />
                                <label class="custom-control-label" for="status_active">Active</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="0" id="status_inactive" />
                                <label class="custom-control-label" for="status_inactive">Inactive</label>
                            </div>
                            @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="form-label col-md-3">&nbsp;</label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            
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