@extends('layouts.page')

@section('title', 'Inserisci un piatto')

@section('content')
<main class="form">
    <div class="container">
        <div class="row">
            <div class="col">
        <div class="wrapper">
        <form action="{{ route('user.dishes.store') }}" method="post">
            @csrf
            <!-- name -->
            <div class="form-input">
                <input type="text" class="form-element-input" id="name" name="name" value="{{ old('name') }}">
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="name">Nome</label>
                <small class="form-element-hint">Inserire il nome del piatto.</small>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- description -->
            <div class="form-input">
                <textarea type="text" class="form-element-input" id="description" rows="10"
                name="description">{{ old('description') }}</textarea>
                <div class="form-element-bar"></div>
                <label for="description" class="form-element-label">{{ __('Description') }}</label>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            
            <!-- ingredients -->
            <div class="form-input">
                <textarea type="text" class="form-element-input" id="ingredients" rows="10"
                name="ingredients">{{ old('ingredients') }}</textarea>
                <div class="form-element-bar"></div>
                <label for="ingredients" class="form-element-label">{{ __('Ingredients') }}</label>
                <small class="form-element-hint">Esempio: Hamburger,Insalata, etc..</small>
            </div>
            @error('ingredients')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            
            <!-- allergies -->
            <div class="form-input">
                <textarea type="text" class="form-element-input" id="allergies" rows="10"
                name="allergies">{{ old('allergies') }}</textarea>
                <div class="form-element-bar"></div>
                <label for="allergies" class="form-element-label">{{ __('Allergies') }}</label>
                <small class="form-element-hint">Esempio: Celiaco,Lattosio, etc..</small>
            </div>
            @error('allergies')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            
            
            <!-- price -->
            <div class="form-input">
                <input class="form-element-input" id="price" rows="10" name="price" value="{{ old('price') }}">
                <div class="form-element-bar"></div>
                <label for="price" class="form-element-label">{{ __('Price') }}</label>
                <small class="form-element-hint">Esempio: 10,90</small>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            
            
            <!-- available -->
            {{-- <div class="form-input">
                <div>
                    <input type="radio" class="" id="available" name="available" value=1 required>
                    <label for="available" class="">Disponibile</label>
                    <input type="radio" class="" id="not-available" name="available" value=0>
                    <label  class="" for="not-available">Non disponibile</label>
                </div>
            </div> --}}
                <div class="form-input">
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="available" value=1 required>
                        <div class="rad-design"></div>
                        <div class="rad-text">Disponibile</div>
                    </label>
                    
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="available" value=0 required>
                        <div class="rad-design"></div>
                        <div class="rad-text">Non Disponibile</div>
                    </label>
            </div>


            <!-- button -->
            <div class="submit-button">
                <input value="Send" type="submit" />
            </div>
            </form>
            </div>
        </div>
    </div>
    
    
    {{-- </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('user.dishes.store') }}" method="post">
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
                        <textarea type="text" class="form-control" id="description" rows="10"
                            name="description">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- ingredients -->
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>
                        <textarea type="text" class="form-control" id="ingredients" rows="10"
                            name="ingredients">{{ old('ingredients') }}</textarea>
                    </div>
                    @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- allergies -->
                    <div class="mb-3">
                        <label for="allergies" class="form-label">{{ __('Allergies') }}</label>
                        <textarea type="text" class="form-control" id="allergies" rows="10"
                            name="allergies">{{ old('allergies') }}</textarea>
                    </div>
                    @error('allergies')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('Price') }}</label>
                        <input class="form-control" id="price" rows="10" name="price" value="{{ old('price') }}">

                    </div>
                    @error('street')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- available -->
                    <div class="mb-3">
                        <div>
                            <input type="radio" class="" id="available" name="available" value=1>
                            <label for="available">Disponibile</label>
                            <input type="radio" class="" id="not-available" name="available" value=0>
                            <label for="not-available">Non disponibile</label>
                        </div>
                    </div>
                    @error('available')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- button -->
                    <button class="btn btn-success">Save</button>
                </form> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
</main>
@endsection