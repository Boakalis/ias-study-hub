    <div class="form-group"  >
        @foreach ($datas as $data)
        <div class="custom-control mt-2 mb-2 custom-control-lg custom-checkbox">
            <input type="checkbox" name="ids[]" class="custom-control-input chk " id="subject{{@$data->slug}}" value="{{\Crypt::encrypt($data->id)}}" id="
            ids"  data-price="{{$data->price}}" >
            <label class="custom-control-label" for="subject{{@$data->slug}}">{{@$data->subject}}&nbsp;(Rs.{{@$data->price}}/-) </label>
        </div><br>

        @endforeach

    </div>
