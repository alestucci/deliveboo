@extends('layouts.page')

@section('title', 'My Dishes')

@section('content')
{{-- @dd($orders) --}}
    <h1>
        {{ $user->name }}
    </h1>
    <ul>
        @foreach ($dishes as $dish)
            <li>
                {{$dish->name}}
            </li>
            <li>
                {{-- @if (Auth::user()->id === $dishes->user_id) --}}
                    <a class="btn btn-primary" href="{{ route('user.dishes.edit') }}">Edit</a>
                {{-- @endif --}}
            </li>
        @endforeach   
    </ul>
@endsection