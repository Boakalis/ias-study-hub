@extends('website.Layout.master')
@section('title',@$fullreport->test->batch->series->name.' - '.@$fullreport->test->batch->name.' - '.@$fullreport->test->name)
@section('content')

<div class="nk-content ">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">

				<div class="nk-block">
					<div class="card card-bordered card-stretch">
						<div class="card-inner-group">
							<!-- .card-inner -->
							<!-- .card-inner -->
                            <div class="card-inner">
								<div class="g-3">
									<div>
										<div class="">
                                            <center><h4 class="text-uppercase" >IAS Test Series</h4></center><br>
                                         <center> <h5 class="text-uppercase" > {{ @$fullreport->test->batch->series->name.' - '.@$fullreport->test->batch->name.' - '.@$fullreport->test->name }} </h5> </center><br>
											<div class="test-answers-info text-center ">
												<ul>
													<li><span class=" btn btn-sm btn-danger"
														title="No.of Incorrect Question">{{$fullreport['incorrect']}}</span>
													Wrong</li>
													<li><span class=" btn btn-sm btn-secondary"
														title="No.of Incorrect Question">{{$fullreport['correct']}}</span>
													Correct</li>
													<li><span class=" btn btn-sm btn-outline-secondary"
														title="No.of Unattempted Question">{{$fullreport['unattempt']}}</span>
													Not Attend</li>
												</ul>
											</div>
											@foreach ($questions_html as $key => $question)
											<div class="p-2">
												<h5 class="card-title text-success ">Question {{$key+1}}:</h5>
												<p class="card-text ">{!! $question['question'] !!}</p>
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
													">{!! $question[$option] !!}
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
												<div class="question-explanation-details">{!! $question['explanation'] !!}</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>

							</div>

						</div><!-- .card-inner-group -->
					</div><!-- .card -->
				</div><!-- .nk-block -->
			</div>
		</div>
	</div>
</div>
@endsection


