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
