
    <div class="nk-block-head nk-block-head-md">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Daily Free Quiz - January 2021</h4>
                <div class="nk-block-des">
                    <p></p>
                </div>
            </div>
            <div class="nk-block-head-content align-self-start d-lg-none">
                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="nk-data data-list">
            <ul class="sp-pdl-list">
                @if (sizeOf($datas)>0  )
                @foreach ($datas as $data)
                <li class="sp-pdl-item">
                    <div class="sp-pdl-desc">
                        <div class="sp-pdl-img"><em class="icon ni ni-play-circle font-35 text-primary"></em></div>
                        <div class="sp-pdl-info">
                            <h6 class="sp-pdl-title"><span class="sp-pdl-name">{{$data->name}}</span> <span class="badge badge-dim badge-primary badge-pill">Free</span></h6>
                            <div class="sp-pdl-meta">
                                <span class="release">
                                    <span class="text-soft">Date: </span> <span>{{ \Carbon\Carbon::parse($data->date)->format('d F Y') }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="sp-pdl-btn">
                        <a href="#" data-attr="{{route('quizTestPage',$data->id)}}" class="btn btn-primary text-uppercase test-page ">Take Now</a>
                    </div>
                </li><!-- .sp-pdl-item -->
                @endforeach

                @else
          <span>Test Under Maintanence</span>
                @endif



            </ul>
        </div><!-- data-list -->

    </div><!-- .nk-block -->
