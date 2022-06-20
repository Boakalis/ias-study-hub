@extends('admin.layouts.master')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
<div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">Dashboard</h3>
    {{-- <div class="">
        <div class="card card-full overflow-hidden">
            <div class="nk-ecwg nk-ecwg4 h-100">
                <div class="card-inner flex-grow-1">
                    <div class="card-title-group mb-4">
                        <div class="card-title">
                            <h6 class="title">Top Referers</h6>
                        </div>
                        <div class="card-tools">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle link link-light link-sm dropdown-indicator" data-toggle="dropdown" aria-expanded="false">Change</a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a class="topRefers" onclick="getTopRefer(15)"  href="javascript:void(0)"><span>15 Days</span></a></li>
                                        <li><a class="topRefers" onclick="getTopRefer(30)" href="javascript:void(0)" class="active"><span>30 Days</span></a></li>
                                        <li><a  class="topRefers" onclick="getTopRefer(90)" href="javascript:void(0)"><span>3 Months</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="data-group" id="contentdiv" >

                        <ul class="nk-ecwg4-legends">
                            @foreach ($topReferrers as $referer)
                            <li>
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#9cabff" style="background: rgb(156, 171, 255) none repeat scroll 0% 0%;"></span>
                                    <span>{{ucfirst($referer['url']=='(direct)'?'Direct Source':$referer['url'])}}</span>
                                </div>
                                <div class="amount amount-xs"  >{{($referer['pageViews'])}}</div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div><!-- .card-inner -->
                <div class="card-inner card-inner-md bg-light">
                    <div class="card-note">
                        <em class="icon ni ni-info-fill"></em>
                        <span>Traffic channels have beed generating the most traffics over past days.</span>
                    </div>
                </div>
            </div>
        </div><!-- .card -->
    </div> --}}
</div>
    </div></div>
@endsection

