@extends('admin.layouts.master')

@section('content')

<div class="row">
    @include('website.Layout.breadcrumb')
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            FAQ <button type="button" class="r-btnAdd btn btn-primary float-right">Add +</button>
        </h3>
    </div>
</div>
<div class="table">
    @include('admin.layouts.error')
</div>
<div class="card card-preview">
    <div class="card-inner">
        <div class="card-body">


            <form class="mb-5" action="{{ route('faq.update') }}" method="POST" id="question-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ @$datas->id }}">
                <div class="pb-4">
                    @if(!$faqs->isEmpty())
                    @foreach($faqs as $faq)
                    <div class="r-group" style="margin-top:10px">

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Category</label>
                            <div class="col-md-9">
                           <select class="form-control" name="category_id[]">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($category->id  == $faq->category_id)?'selected':'' }}>{{ $category->name }}</option>
                                @endforeach
                           </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Question</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="question[]">{{ $faq->question }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Answer</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="answer[]">{{ $faq->answer }}</textarea>
                            </div>
                        </div>

                        <button type="button" class="r-btnRemove btn btn-danger">Remove</button>

                    </div>
                    @endforeach
                    @else
                    <div class="r-group" style="margin-top:10px">

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Category</label>
                            <div class="col-md-9">
                           <select class="form-control" name="category_id[]">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                           </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Question</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="question[]"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Answer</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="answer[]"></textarea>
                            </div>
                        </div>
                        <button type="button" class="r-btnRemove btn btn-danger">Remove</button>
                    </div>
                    @endif
                    <div id="append-fields">

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
@endsection
@section('javascript')
<script type="text/javascript">

    $(document).ready(function() {


        $(".r-btnAdd").click(function(){
            var html = '<div class="r-group" style="margin-top:10px">'+

                        '<div class="form-group row">'+
                            '<label class="form-label col-md-3" for="file">Category</label>'+
                            '<div class="col-md-9">'+
                           '<select class="form-control" name="category_id[]">'+
                                '@foreach ($categories as $category)'+
                                    '<option value="{{ $category->id }}">{{ $category->name }}</option>'+
                                '@endforeach'+
                           '</select>'+
                            '</div>'+
                        '</div>'+

                        '<div class="form-group row">'+
                            '<label class="form-label col-md-3" for="file">Question</label>'+
                            '<div class="col-md-9">'+
                            '<textarea class="form-control tinymce-editor" name="question[]"></textarea>'+
                            '</div>'+
                        '</div>'+

                        '<div class="form-group row">'+
                            '<label class="form-label col-md-3" for="file">Answer</label>'+
                            '<div class="col-md-9">'+
                            '<textarea class="form-control tinymce-editor" name="answer[]"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<button type="button" class="r-btnRemove btn btn-danger">Remove</button>'+
                    '</div>';
            $("#append-fields").append(html);
            tinymce.init(editor_config);
        });


        $("body").on("click",".r-btnRemove ",function(){
            $(this).parents(".r-group").remove();
        });

    });

</script>
@endsection
