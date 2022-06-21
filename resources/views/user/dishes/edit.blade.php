@extends('layouts.page')

@section('title', $dish->name)

@section('content')
<main>
<div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('user.dishes.update', $dish->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <!--   name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input required type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name ) }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea required type="text" class="form-control" id="description" rows="10" name="description">{{ old('description', $dish->description) }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- ingredients -->
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>
                        <textarea required type="text" class="form-control" id="ingredients" rows="10" name="ingredients">{{ old('ingredients', $dish->ingredients) }}</textarea>
                    </div>
                    @error('ingredients')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- allergies -->
                    <div class="mb-3">
                        <label for="allergies" class="form-label">{{ __('Allergies') }}</label>
                        <textarea required type="text" class="form-control" id="allergies" rows="10" name="allergies">{{ old('allergies', $dish->allergies) }}</textarea>
                    </div>
                    @error('allergies')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('Price') }}</label>
                        <input required class="form-control" id="price" rows="10" name="price" value="{{ old('price', $dish->price) }}">

                    </div>
                    @error('street')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- available -->                    
                    <div class="mb-3">
                        <input required type="radio" class="form-control" id="available" name="available" @if ($dish->available === 1) checked @endif value=1>
                        <label for="available">Disponibile</label>
                        <input required type="radio" class="form-control" id="not-available" name="available" @if ($dish->available === 0) checked @endif value=0>
                        <label for="not-available">Non disponibile</label>
                    </div>
                    @error('available')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    

                    <!-- button -->
                    <button>Update</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection