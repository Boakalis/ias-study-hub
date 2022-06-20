<div class="tab-content">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Name:</h6>
        <p>{!! $datas->name !!}</p>
    </div>
</div>

<div class="tab-content pt-2">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Price:</h6>
        <p>{!! $datas->price !!}</p>
    </div>
</div>

<div class="tab-content pt-2">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Discount:</h6>
        <p>{!! $datas->discount !!}</p>
    </div>
</div>

<div class="tab-content pt-2">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Decription:</h6>
        <p>{!! $datas->description !!}</p>
    </div>
</div>

<div class="tab-content pt-2">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Starting Date:</h6>
        <p>{{date('d-M-Y',strtotime($datas->start_date))}}</p>
    </div>
</div>
</div>
