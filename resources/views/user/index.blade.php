@extends('layouts.page')

@section('title', 'DeliveBoo INDEX')

@section('content')
{{-- @dd($orders) --}}
    <h1>
        {{ $user->name }}
    </h1>
    <ul>
        @foreach ($dishes as $dish)
            <li></li>
                {{$dish->name}}
                <ul>
                    @foreach ($dish->orders as $order)
                        <li>
                            {{$order->order_number}} - {{$order->customer_surname}} 
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach   
    </ul>

    <ul>
        @foreach ($orders as $order)
            <li>
                {{$order->order_number}} - {{$order->customer_surname}} {{$order->customer_name}} - {{ number_format($order->final_price / 100, 2, ',', '')}} €
                <ul>
                    @foreach ($order->dishes as $dish)
                        <li>
                            {{$dish->pivot->quantity}} - {{$dish->name}} - {{ number_format($dish->price / 100, 2, ',', '') }} €
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
  






{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Siamo loggati grazie ad Alessandro Ballabio') }}
                </div>

                <a href="#!" class="btn btn-primary">
                    Dashboard
                </a>
                
            </div>
        </div>
    </div>
</div> --}}
@endsection
