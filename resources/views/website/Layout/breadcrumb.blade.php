<ol class="breadcrumb breadcrumb-arrow">
    <li class="breadcrumb-item" >
        <i class="fa fa-home"></i>
        <a href="{{route('home')}}">HOME</a>
    </li>

    @for($i = 2; $i <= count(Request::segments()); $i++)
       <li class="breadcrumb-item" >
          <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
             {{strtoupper(Request::segment($i))}}
          </a>
       </li>
    @endfor
 </ol>

