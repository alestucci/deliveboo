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
                <a href="{{ route('user.dishes.show', $dish->id) }}">{{$dish->name}}</a>
            </li>
            <li>
                {{-- @if (Auth::user()->id === $dishes->user_id) --}}
                    <a class="btn btn-primary" href="{{ route('user.dishes.edit', $dish->id) }}">Edit</a>
                    <form method="POST" action="{{ route('user.dishes.destroy', $dish->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                {{-- @endif --}}
            </li>
        @endforeach   
    </ul>
@endsection