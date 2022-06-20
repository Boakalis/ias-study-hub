@if(!$faqs->isEmpty())
<div class="accordion accordion--inner" id="accordionExample2">
    @foreach ($faqs as $key => $faq)
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
            {{ $faq->question }}
        </button>
        </h2>
        <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ ($key ==0)?'show':'' }}" aria-labelledby="headingFive" data-bs-parent="#accordionExample2">
        <div class="accordion-body">
            {{ $faq->answer }}
        </div>
        </div>
    </div>
    @endforeach
</div>
@else
    <h3 class="text-center"> No FAQ Found(S) </h3>
@endif
