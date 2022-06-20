@extends('layouts.page')

@section('title', 'My Dishes')

@section('content')
{{-- @dd($orders) --}}
<main>
    <div class="container">
        <h1 class="text-center">{{ $user->name }}</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($dishes as $dish)
            <div class="col">
                <div class="card h-100 r-15">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('user.dishes.show', $dish->id) }}">{{$dish->name}}</a>
                        </h5>
                        <p class="card-text">{{$dish->ingredients}}</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary text-white"
                                href="{{ route('user.dishes.edit', $dish->id) }}">Edit</a>
                            <form method="POST" action="{{ route('user.dishes.destroy', $dish->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger text-white mx-3">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</main>
@endsection

{{-- <li>
    <a href="{{ route('user.dishes.show', $dish->id) }}">{{$dish->name}}</a>
</li>
<li>
    @if (Auth::user()->id === $dishes->user_id)
    <a class="btn btn-primary" href="{{ route('user.dishes.edit', $dish->id) }}">Edit</a>
    <form method="POST" action="{{ route('user.dishes.destroy', $dish->id) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete</button>
    </form>
    @endif
</li> --}}