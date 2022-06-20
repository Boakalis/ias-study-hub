<!DOCTYPE html>
<html>
    <head>
        <title>IAS STUDY HUB</title>
        <style type="text/css">
            @page {
                size: A4;
                margin: 0.1in;
                padding: 0;
            }

            body {
                width: 100%;
                margin: 0px auto;
            }
            .border-0 tr,
            td {
                border: 0;
            }
            ul {
                margin: 0;
                padding: 0;
            }
            .list-none ul li {
                list-style: decimal;
                margin: 0 0 0 25px;
                padding: 0 0 0 20px;
                line-height: normal;
            }
            .list-none ul li::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0px;
                width: 25px;
                height: 25px;
                line-height: 25px;
                font-size: 14px;
                padding-right: 15px;
            }
            .list-number {
                margin: 0;
                padding-left: 17px;
            }
            .list-number li {
                list-style: decimal;
                margin: 0;
                padding: 0;
                line-height: 24px;
            }
            .list-square {
                margin: 0;
                padding-left: 17px;
            }
            .list-square li {
                list-style: square;
                margin: 0;
                padding: 0;
                line-height: 24px;
            }
            .title-bg-blue {
                background: #07538f;
                padding: 5px 15px;
                color: #fff;
                float: left;
                border-radius: 20px;
                font-size: 16px;
            }
            .title-bg-blue-full-width {
                text-align: center;
                font-weight: bold;
            }
            .title-bg-blue-full-width-text {
                background: #07538f;
                padding: 3px 10px;
                color: #fff;
                border-radius: 20px;
                font-size: 28px;
                font-weight: bold;
            }
            .title-bg-light-blue-full-width-text {
                background: #5c9bd3;
                padding: 3px 10px;
                color: #fff;
                border-radius: 20px;
                font-size: 28px;
                font-weight: bold;
            }
            .title-bg-orange-full-width-text {
                background: #ec7d30;
                padding: 3px 10px;
                color: #fff;
                border-radius: 20px;
                font-size: 28px;
                font-weight: bold;
            }
            .title-txt-blue {
                color: #07538f;
                font-size: 16px;
                font-weight: bold;
            }
            .title-txt-grey {
                color: #727273;
                font-size: 24px;
                font-weight: bold;
                line-height: normal;
            }
            .title-txt-grey-20 {
                color: #3e4a5f;
                font-size: 18px;
                font-weight: normal;
                line-height: normal;
            }
            .background-image {
                background-position: center center;
                background-repeat: no-repeat;
            }
            .bg-dark-blue {
                background-color: #17355e;
            }
            .bg-light-blue {
                background-color: #85b1df;
            }
            .bg-violet-blue {
                background-color: #545371;
            }
            .bg-orange {
                background-color: #e7a12b;
            }
            .text-justify {
                text-align: justify;
                padding: 3px;
            }
            .text-uppercase {
                text-transform: uppercase;
            }
            p {
                margin: 0 0 10px 0;
                line-height: normal;
                padding: 0;
            }
            .grey-color {
                color: #727172;
            }
            .text-white {
                color: #fff;
            }
            .light-blue-text-title {
                background-color: #c4e0f6;
                padding: 3px 10px 3px 5px;
                font-weight: normal;
                color: #144271;
            }
            .dark-blue-text-title {
                background-color: #144271;
                padding: 3px;
                font-weight: normal;
                color: #fff;
            }
            .blur-section {
                filter: blur(8px);
                -webkit-filter: blur(8px);
            }
            .main-title {
                color: #2aa87e;
                font-size: 70px;
            }
            .report-result-title {
                margin-top: 10px;
                font-size: 24px;
            }
            .br-5 {
                border-radius: 5px;
            }
            .p-5 {
                padding: 5px;
            }
            .bg-success {
                background-color: #1ee0ac !important;
            }
            .bg-danger {
                background-color: #e85347 !important;
            }
            .bg-info {
                background-color: #09c2de !important;
            }
            .bg-warning {
                background-color: #f4bd0e !important;
            }
            .clear {
                clear: both;
            }
            .w-100 {
                width: 100%;
            }
            .text-center {
                text-align: center;
            }
            .text-left {
                text-align: left;
            }
            .mb-4 {
                margin-bottom: 30px;
            }
            .mb-1 {
                margin-bottom: 10px;
            }
            .font-24 {
                font-size: 24px;
            }
            .text-primary {
                color: #09c2de;
            }
            .page_break {
                page-break-after: always;
            }
            .text-questions-details {
            }
            .text-questions-details ol {
                display: block;
                list-style-type: decimal;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                padding-inline-start: 40px;
                margin-bottom: 10px;
            }
            .text-questions-details ul {
                display: block;
                list-style-type: circle;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                padding-inline-start: 40px;
                margin-bottom: 10px;
            }
            .text-questions-details ol li {
                margin-bottom: 5px;
            }
            .text-questions-details ul li {
                margin-bottom: 5px;
            }
            .question-explanation-details {
            }
            .question-explanation-details ol {
                display: block;
                list-style-type: decimal;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                padding-inline-start: 40px;
                margin-bottom: 10px;
            }
            .question-explanation-details ul {
                display: block;
                list-style-type: circle;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                padding-inline-start: 40px;
                margin-bottom: 10px;
            }
            .question-explanation-details ol li {
                margin-bottom: 5px;
            }
            .question-explanation-details ul li {
                margin-bottom: 5px;
            }
        </style>
    </head>

    <body>
        <table class="border-0 background-image" style="border-collapse: collapse; width: 100%;" border="0" rules="rows" cellspacing="0" cellpadding="5">
            <tbody>
                <!-- Page 1 -->
                <tr>
                    <td width="1%">&nbsp;</td>

                    <td width="98%">
                        <div style="background-image: url({{public_path('images/pdf/1.jpg') }}); background-position: top left; background-repeat: no-repeat; background-size: 100%; padding: 0; width:99%; height:99%;">
                            <!-- <p class="username" style="position: absolute; bottom: 0px; right: 10px; font-size: 20px; color: #064d86; text-transform: capitalize;">Name: {{$fname}}&nbsp;{{$lname}}</p>
                            <p class="reportdate" style="position: absolute; bottom: 0; left: 0;">{{$email}}</p> -->
                        </div>
                    </td>

                    {{--
                    <td width="98%"><img src="{{public_path('images/pdf/1.jpg') }}" style="width: 100%;" /></td>
                    --}}
                    <td width="1%">&nbsp;</td>
                </tr>
                <!-- Page 2 -->
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%" align="center">
                        <div class="title-bg-blue-full-width">
                            <div class="title-bg-blue-full-width-text">Performance Report</div>
                        </div>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%">
                        <div class="title-txt-blue">
                            <p class="text-uppercase text-center font-24">{{$course}}</p>
                        </div>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%">
                        <div class="title-txt-blue">
                            <p class="text-uppercase text-center font-24">{{$series}}/{{$batch}}</p>
                        </div>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>

                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%">
                        <div class="title-txt-grey-20 font-24">Name: {{$fname}}&nbsp;{{$lname}}</div>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%">
                        <div class="title-txt-grey-20 font-24">Email: {{$email}}</div>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>

                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%">
                        <table width="100%" style="table-layout: fixed;">
                            <tbody class="text-center">
                                <tr>
                                    <td colspan="5">
                                        <div class="bg-light-blue bg-success text-justify text-white p-5 br-5 text-center">
                                            <div class="text-white report-result-title text-center">
                                                <h1>Correct</h1>
                                                {{$correct}}
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="5">
                                        <div class="bg-violet-blue bg-danger text-justify text-white p-5 br-5 text-center">
                                            <div class="text-white report-result-title text-center">
                                                <h1>In-Correct</h1>
                                                {{$incorrect}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="bg-light-blue bg-warning text-justify text-white p-5 br-5 text-center">
                                            <div class="text-white report-result-title">
                                                <h1>Un-Attempt</h1>
                                                {{$unattempt}}
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="5">
                                        <div class="bg-violet-blue bg-info text-justify text-white p-5 br-5 text-center">
                                            <div class="text-white report-result-title text-center">
                                                <h1>Marks Obtained</h1>
                                                {{$total}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>
                <!-- Questions -->
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%" align="center"></td>
                    <td width="1%">&nbsp;</td>
                </tr>
                @if (isset($solutions) && !empty($solutions)) @foreach ($solutions as $key => $solution)
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="98%" align="center" class="text-left title-txt-grey-20">
                        <div class="mb-1">
                            <p class="font-24 text-primary"><b>Question &nbsp;{{$key+1}}:</b></p>

                            <div class="text-questions-details">{!!$solution['question']!!}</div>
                            <div class="clear w-100 mb-2"></div>
                            <p><b>Options</b></p>
                            <ul class="list-square">
                                <li>{!!$solution['option_1']!!}</li>
                                <li>{!!$solution['option_2']!!}</li>
                                <li>{!!$solution['option_3']!!}</li>
                                <li>{!!$solution['option_4']!!}</li>
                            </ul>

                            <div class="clear w-100 mb-2"></div>
                            <p class="mb-1"><b>Your Answer</b></p>
                            {!!isset($solution['user_answer'])&&!empty($solution['user_answer'])?$solution['user_answer'] : 'NOT ANSWERED'!!}
                            <div class="clear w-100 mb-2"></div>
                            <p class="mb-1"><b>Correct Answer</b></p>
                            {!!$solution['answers']!!}
                            <div class="clear w-100 mb-2"></div>
                            <p><b>Explanation</b></p>
                            <div class="question-explanation-details">{!!$solution['explanation']!!}</div>
                            <div class="clear w-100"></div>
                        </div>
                        <div class="clear w-100 mb-1"></div>
                        <hr />
                        <div class="clear w-100 mb-1"></div>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>
                @endforeach @endif
            </tbody>
        </table>
    </body>
</html>