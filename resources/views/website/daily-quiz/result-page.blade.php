<div class="card-inner">
    <div class="quiz-result">
		<div>
			<div class="">
				@foreach ($questions_html as $key => $question)
				<div class="p-2">
					<h5 class="card-title text-success ">Question {{$key+1}}:</h5>
					<div class="text-questions-details ">{!!$question['question']!!}</div>
					<ul class="list-group">
						@for($i=1;$i<=4;$i++)
						@php($option ='option_'.$i)
						<li class="list-group-item
						@if($question['answers']  == $i && $question['user_answer'] == $i)
						list-group-item-success
						@elseif($question['answers']  == $i && $question['user_answer'] != $i )
						list-group-item-success
						@elseif($question['answers']  != $i&& $question['user_answer'] == $i )
						list-group-item-danger
						@else
						@endif
						">
						{!!$question[$option]!!}
							@if($question['answers']  == $i && $question['user_answer'] == $i)
							<span class="btn btn-sm btn-light float-right bg-white"><i class="fa fa-check text-success"></i></span>
                            @elseif($question['answers']  == $i && $question['user_answer'] != $i)
                            <span class="btn btn-sm btn-light float-right bg-white"><i class="fa fa-check text-success"></i></span>
							@elseif ($question['answers']  != $i&& $question['user_answer'] == $i )
							<span class="btn btn-sm btn-light float-right bg-white"><i class="fa fa-times text-danger"></i></span>
							@endif
						</li>
						@endfor
					</ul><br>
                    <h5 class="card-title text-info ">Explanation:</h5>
                    <div class="question-explanation-details">
                    {!! $question['explanation'] !!}</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>



