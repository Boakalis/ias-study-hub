
   <label class="form-label"   for="subject"> Subject</label>
    <input type="text" readonly class="form-control" value="{{$datas->subject['subject']}}" >
  <br>
   <label class="form-label"   for="subject"> Category</label>
   <input type="text" readonly class="form-control" value="{{$datas->category['category']}}" >
 <br>

 @foreach ($questions as $key => $question)
 <label class="form-label"   for="question"> Question {{ $key+1}}</label>
 <input type="text" readonly class="form-control" value="{{$question->question->question}}" >
 <br>

 @endforeach


