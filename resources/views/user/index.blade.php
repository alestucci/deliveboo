@extends('layouts.page')

@section('title', 'DeliveBoo INDEX')

@section('content')
<main class="dashboard">
    <div class="container">

        {{-- <a href="{{ route('user.dishes.index', $user->id) }}">Modifica piatti</a> --}}
        <h1 class="text-center py-5">
            {{ $user->name }}
        </h1>
        {{-- <ul>
            @foreach ($dishes as $dish)
            <li>
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
                {{$order->order_number}} - {{$order->customer_surname}} {{$order->customer_name}} - {{
                number_format($order->final_price / 100, 2, ',', '')}} €
                <ul>
                    @foreach ($order->dishes as $dish)
                    <li>
                        {{$dish->pivot->quantity}} - {{$dish->name}} - {{ number_format($dish->price / 100, 2, ',', '') }} €
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul> --}}
        <div class="row row-cols-1 row-cols-sm-2 py-3 align-items-stretch">
            <div class="col mb-4">
                <div class="square p-4 bg-tealblue position-relative h-100">
                    <h2 class="pb-2 text-center text-uppercase">I tuoi ultimi ordini</h2>
                    <table class="w-100">
                        <thead>
                            <th>Numero Ordine</th>
                            <th>Cliente</th>
                            <th>Importo</th>
                        </thead>
                        <tbody>
                            @foreach (array_slice($orders, -3) as $order)
                            <tr>
                                <td>{{$order->order_number}}</td>
                                <td>{{$order->customer_surname}} {{$order->customer_name}}</td>
                                <td>{{
                                    number_format($order->final_price / 100, 2, ',', '')}} €</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="bg-white corner rounded-pill">
                        <a href="#!" class="p-3">Vedi tutti gli ordini &#x2192;</a>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="square p-4 bg-bluemunsell position-relative h-100">
                    <h2 class="pb-2 text-center text-uppercase">I tuoi ultimi piatti</h2>
                    <table class="w-100">
                        <thead>
                            <th>Piatto</th>
                            <th>Ingredienti</th>
                            <th>Prezzo</th>
                        </thead>
                        <tbody>
                            @foreach (array_slice($dishes->toArray(), -3) as $dish)
                            <tr>
                                <td>{{$dish['name']}}</td>
                                <td>{{$dish['ingredients']}}</td>
                                <td>{{
                                    number_format($dish['price'] / 100, 2, ',', '')}} €</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="bg-white corner rounded-pill">
                        <a href="{{ route('user.dishes.index') }}" class="p-3">Vedi tutti i piatti &#x2192;</a>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="square p-4 bg-sandybrown position-relative h-100">
                    <h2 class="text-center text-uppercase">Statistiche ordini</h2>
                    <div class="bg-white corner rounded-pill">
                        <a href="#!" class="p-3">Vai alle statistiche &#x2192;</a>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="square p-4 bg-sweetbrown position-relative h-100">
                    <h2 class="text-center text-uppercase">Statistiche piatti</h2>
                    <div class="bg-white corner rounded-pill">
                        <a href="#!" class="p-3">Vai alle statistiche &#x2192;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection