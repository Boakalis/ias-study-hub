
 <div class="tab-content ">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Question:</h6>
        <p>    {!! $datas->question  !!}
        </p>
    </div>
</div>

<div class="tab-content pt-2">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Options:</h6>
        <label class="form-comtrol">Option 1::</label>
            {!! $datas->option_1  !!} <br>
        <label class="form-comtrol">Option 2::</label>
         {!! $datas->option_2  !!}  <br>
         <label class="form-comtrol">Option 3::</label>
          {!! $datas->option_3 !!} <br>
          <label class="form-comtrol">Option 4::</label>
          {!! $datas->option_4  !!}

    </div>
</div>

<div class="tab-content pt-3">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Explanation:</h6>
        <p>{!! $datas->explanation !!}</p>
    </div>
</div>

<div class="tab-content pt-2">
    <div class="tab-pane active" id="tabItem1">
        <h6 class="title">Hint:</h6>
        <p>{!! $datas->hint !!}</p>
    </div>
</div>

