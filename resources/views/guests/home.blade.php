@extends('layouts.page')

@section('content')
<main class="bg-food position-relative">
    <div class="position-absolute top-50 start-50 translate-middle w-50">

        <div class="row justify-content-center">
            <div class="card r-15 p-5">
                <h2 class="mb-4">Cosa vuoi mangiare oggi?</h2>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cerca tra i nostri 10000 ristoranti">
                    <button class="btn btn-success" type="button" id="button-addon2">{{__('Search')}}</button>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection