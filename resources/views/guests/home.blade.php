@extends('layouts.page')

@section('content')
<main  class="bg-food">
    <div>
        
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

                        {{ __('Guest Home') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
