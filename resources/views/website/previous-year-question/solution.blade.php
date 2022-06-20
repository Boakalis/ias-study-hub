@extends('website.Layout.master')
@section('meta_title')

@endsection
@section('title',@$fullreport->pyqtest->name.' - '.@$fullreport->pyqtest->category->category.' - '.@$fullreport->subject->name)
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
                                            <h1>Previous Year Questions</h1>
                                           <h2> {{ ucwords($fullreport->pyqtest->name).' - '.ucwords($fullreport->pyqtest->category->category).' - '.ucwords($fullreport->pyqtest->subject->name) }}</h2>
											<div class="test-answers-info">
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
												<h5 class="card-title">Question {{$key+1}}:</h5>
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
														@elseif ($question['answers']  != $i&& $question['user_answer'] == $i )
														<span class="btn btn-sm btn-light float-right bg-white"><i class="fa fa-times text-danger"></i></span>
														@endif
													</li>
													@endfor
												</ul>
                                                <h5 class="card-title">Explanation:</h5>
												<p class="card-text ">{!! $question['explanation'] !!}</p>
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


