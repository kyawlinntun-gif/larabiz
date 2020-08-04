@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <span class="float-right btn btn-secondary text-small"><a href="{{ url('/dashboard') }}" class="text-decoration-none text-white">Go Back</a></span></div>

                <div class="card-body">
                    <h1>Edit Listing</h1>
                    {{ Form::open(['route' => ['listings.update', $listing->id], 'method' => 'post']) }}
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::bsText('name', old('name') ? old('name') : $listing->name, ["label" => "Company Name"]) }}
                        @include('messages.errors.name')
                        {{ Form::bsText('address', old('address') ? old('address') : $listing->address, ["label" => "Company Address"]) }}
                        @include('messages\errors\address')
                        {{ Form::bsText('website', old('website') ? old('website') : $listing->website, ["label" => "Company Website"]) }}
                        @include('messages.errors.website')
                        {{ Form::bsEmail('email', old('email') ? old('email') : $listing->email, ["label" => "Company Email"]) }}
                        @include('messages.errors.email')
                        {{ Form::bsText('phone', old('phone') ? old('phone') : $listing->phone, ["label" => "Company Phone"]) }}
                        @include('messages.errors.phone')
                        {{ Form::bsText('bio', old('bio') ? old('bio') : $listing->bio, ["label" => "Company Bio"]) }}
                        {{ Form::submit('Submit', ['class' => "btn btn-primary"]) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection