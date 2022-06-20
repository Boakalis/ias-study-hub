@extends('website.website-layout.master')
@section('content')
<div class="page-title-content text-center bg-default-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7">
          <h2 class="page-title-content__heading">FAQs</h2>
          
        </div>
      </div>
    </div>
    <div class="shape">
      <img class="w-100" src="{{ asset('website/image/png/inner-banner-shape.png') }}" alt="">
    </div>
  </div>
<div class="faqs-area faqs-area--inner bg-default pt-5 mt-5">
    <div class="container">
      
      <div class="faq-body bg-default">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row justify-content-center justify-md-content-start">
              <div class="col-xl-3 col-lg-4 col-md-5 col-xs-8 mb-6 mb-lg-0">
                <div class="faq-tabs">
                  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($categories as $category)
                        <a class="nav-link show-faq" data-category="{{ $category->id }}" data-category-name="{{ $category->name }}" id="v-pills-{{ $category->name }}-tab" data-bs-toggle="pill" href="#v-pills-{{ $category->name }}" role="tab" aria-controls="v-pills-{{ $category->name }}" aria-selected="true">{{ $category->name }}</a>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-xl-9 col-lg-8 col-md-11">
                <div class="tab-content" id="v-pills-tabContent">

                @foreach ($categories as $category)
                  <div class="tab-pane fade " id="v-pills-{{ $category->name }}" role="tabpanel" aria-labelledby="v-pills-{{ $category->name }}">

                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ .Testimonial Area -->
@endsection
@section('javascript')
<script>

    $(function(){
        $('.show-faq:first-child').trigger('click');
    })
    $('.show-faq').on('click',function(){
        var category = $(this).data('category');
        var category_name =  $(this).data('category-name');

        if(category != undefined && category != null){
            $.ajax({
                method:"GET",
                url:"{{ route('getCategoryFaq') }}",
                data:{"_token":"{{ csrf_token() }}",'category':category},
                success:(function(response){
                    $('#v-pills-'+category_name).html(response.html);
                    $('.tab-pane').removeClass('show active');
                    $('#v-pills-'+category_name).addClass('show active');
                })
            })
        }
    })
</script>
@endsection
