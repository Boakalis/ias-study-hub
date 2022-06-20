@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Order Analytics Reports
        </h3>
    </div>
</div>

<div class="table">

    @include('admin.layouts.error')
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table table table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Referer Name</th>
                        <th scope="col">Order-ID</th>
                        <th scope="col" class="text-center">Amount</th>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Referer Medium</th>
                        <th scope="col" class="text-center">Campaign Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderAnalyticss as $key => $orderAnalytics)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ ucfirst(@$orderAnalytics->utm_source == null ? 'Direct':$orderAnalytics->utm_source

                        ) }}</td>
                        <td>
                            {{@$orderAnalytics->order_id}}
                        </td>
                        <td class="text-center">
                            {{@$orderAnalytics->amount}}
                        </td>
                        <td class="text-center">
                            {{@$orderAnalytics->date}}
                        </td>
                        <td>{{ ucfirst(@$orderAnalytics->utm_medium == null ? 'Direct':$orderAnalytics->utm_medium

                            ) }}</td>

<td>{{ ucfirst(@$orderAnalytics->utm_campaign == null ? 'Direct':$orderAnalytics->utm_campaign

    ) }}</td>

                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
<br>
    {{-- <div style="float:left;">
        {{ ($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)}} of {{$datas->total()}} entries
        </div>
        <div style="float:right;">
        {{ $datas->appends(request()->input())->links() }}
        </div> --}}
</div>



    @endsection

