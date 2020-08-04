@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages.info.success')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @auth
                    <div class="card-header">{{ __('Dashboard') }} <span class="float-right btn btn-success text-small"><a href="{{ route('listings.create') }}" class="text-decoration-none text-dark">Add Listings</a></span></div>
                @endauth

                <div class="card-body">
                    <h1>Latest Business Listings</h1>
                    @if(count($listings))
                        <ul class="list-group">
                            @foreach ($listings as $listing)
                                <li class="list-group-item"><a href="{{ route('listings.show', $listing->id) }}" class="btn btn-primary">{{ $listing->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection