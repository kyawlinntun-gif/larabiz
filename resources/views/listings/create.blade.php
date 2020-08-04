@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <span class="float-right btn btn-secondary text-small"><a href="{{ url('/dashboard') }}" class="text-decoration-none text-white">Go Back</a></span></div>

                <div class="card-body">
                    <h1>Create Listing</h1>
                    {{ Form::open(['route' => ['listings.store'], 'method' => 'post']) }}
                        {{ Form::bsText('name', old('name') ? old('name') : '', ["label" => "Company Name", "placeholder" => "Company Name"]) }}
                        @include('messages.errors.name')
                        {{ Form::bsText('address', old('address') ? old('address') : '', ["label" => "Company Address", "placeholder" => "Company Address"]) }}
                        @include('messages\errors\address')
                        {{ Form::bsText('website', old('website') ? old('website') : '', ["label" => "Company Website", "placeholder" => "Company Website"]) }}
                        @include('messages.errors.website')
                        {{ Form::bsEmail('email', old('email') ? old('email') : '', ["label" => "Company Email", "placeholder" => "Company Email"]) }}
                        @include('messages\errors\email')
                        {{ Form::bsText('phone', old('phone') ? old('phone') : '', ["label" => "Company Phone", "placeholder" => "Company Phone"]) }}
                        @include('messages\errors\phone')
                        {{ Form::bsText('bio', old('bio') ? old('bio') : '', ["label" => "Company Bio", "placeholder" => "Company Bio"]) }}
                        {{ Form::submit('Submit', ['class' => "btn btn-primary"]) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
