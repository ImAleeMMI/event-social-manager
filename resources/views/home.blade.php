@extends('layouts.app')

@section('content')
<div class="container">
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

                    <div class="welcome">
                        <h1>Benvenuto {{ Auth::user()->name }}</h1>
                        <a href="{{ route('index') }}" class="btn btn-success">Visualizza Eventi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection