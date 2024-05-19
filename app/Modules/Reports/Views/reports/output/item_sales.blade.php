@extends('reports.layouts.master')

@section('content')

    <h1 style="margin-bottom: 0;">@lang('ip.item_sales')</h1>
    <h3 style="margin-top: 0;">{{ $results['from_date'] }} - {{ $results['to_date'] }}</h3>

    @foreach ($results['records'] as $key=>$items)
        <h4>{{ $key }}</h4>
        <table class="alternate">
            <thead>
            <tr>
                <th style="width: 10%; text-align: left;">@lang('ip.date')</th>
                <th style="width: 10%; text-align: left;">@lang('ip.invoice')</th>
                <th style="width: 30%; text-align: left;">@lang('ip.client')</th>
                <th class="amount" style="width: 10%;">@lang('ip.price')</th>
                <th class="amount" style="width: 10%;">@lang('ip.quantity')</th>
                <th class="amount" style="width: 10%;">@lang('ip.subtotal')</th>
                <th class="amount" style="width: 10%;">@lang('ip.tax')</th>
                <th class="amount" style="width: 10%;">@lang('ip.total')</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($items['items'] as $item)
                <tr>
                    <td>{{ $item['date'] }}</td>
                    <td>{{ $item['invoice_number'] }}</td>
                    <td>{{ $item['client_name'] }}</td>
                    <td class="amount">{{ $item['price'] }}</td>
                    <td class="amount">{{ $item['quantity'] }}</td>
                    <td class="amount">{{ $item['subtotal'] }}</td>
                    <td class="amount">{{ $item['tax'] }}</td>
                    <td class="amount">{{ $item['total'] }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="amount"><strong>@lang('ip.total')</strong></td>
                <td class="amount"><strong>{{ $items['totals']['quantity'] }}</strong></td>
                <td class="amount"><strong>{{ $items['totals']['subtotal'] }}</strong></td>
                <td class="amount"><strong>{{ $items['totals']['tax'] }}</strong></td>
                <td class="amount"><strong>{{ $items['totals']['total'] }}</strong></td>
            </tr>
            </tbody>

        </table>
    @endforeach

@stop