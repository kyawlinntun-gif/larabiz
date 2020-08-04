@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages.info.success')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <span class="float-right btn btn-secondary text-small"><a href="{{ route('listings.index') }}" class="text-decoration-none text-dark">Go Back</a></span></div>

                <div class="card-body">
                    <h1>{{ $listing->name }}</h1>
                    <ul class="list-group">
                        <li class="list-group-item">{{ $listing->address }}</li>
                        <li class="list-group-item"><a href="{{ $listing->website }}" target="_blank" class="text-decoration-none text-dark">{{ $listing->website }}</a></li>
                        <li class="list-group-item">{{ $listing->email }}</li>
                        <li class="list-group-item">{{ $listing->phone }}</li>
                    </ul>
                    <div class="card card-body mt-2">
                        <p>
                            {{ $listing->bio }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection