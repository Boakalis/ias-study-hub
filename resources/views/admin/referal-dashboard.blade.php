<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Referer Dashboard</title>
</head>
<body>
    <div class="card card-preview">
        <div class="card-inner">
            <table class=" table table table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Order-ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                    <tr id="sid{{$data->id}}">
                        <td>{{$key+1}}</td>
                        <td>{{($data->order_id)}}</td>
                        <td>{{($data->user_id)}}</td>
                        <td class="text-center">
                            {{$data->date}}
                        </td>

                        <td class="text-center">
                            {{$data->amount}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        {{-- <div style="float:left;">
            {{ ($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)}} of {{$datas->total()}} entries
            </div>
            <div style="float:right;">
            {{ $datas->appends(request()->input())->links() }}
            </div> --}}
    </div>

</body>
</html>
