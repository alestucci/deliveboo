@extends('layouts.page')

@section('title', 'DeliveBoo INDEX')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf

                    <!-- name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea type="text" class="form-control" id="description" rows="10" name="description" value="{{ old('description') }}"></textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- ingredients -->
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>
                        <textarea type="text" class="form-control" id="ingredients" rows="10" name="ingredients" value="{{ old('ingredients') }}"></textarea>
                    </div>
                    @error('ingredients')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- allergies -->
                    <div class="mb-3">
                        <label for="allergies" class="form-label">{{ __('Allergies') }}</label>
                        <textarea type="text" class="form-control" id="allergies" rows="10" name="allergies" value="{{ old('allergies') }}"></textarea>
                    </div>
                    @error('allergies')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('Price') }}</label>
                        <input class="form-control" id="price" rows="10" name="price">{{ old('price') }}>

                    </div>
                    @error('street')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- available -->
                    <div class="mb-3">
                        <label for="available" class="form-label">{{ __('Available') }}</label>
                        <input type="checkbox" class="form-control" id="available" rows="10" name="available" value="1">
                        
                    </div>
                    @error('available')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    

                    <!-- button -->
                    <button>Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
