@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages.info.success')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <span class="float-right btn btn-success text-small"><a href="{{ route('listings.create') }}" class="text-decoration-none text-dark">Add Listings</a></span></div>

                <div class="card-body">
                    <h1>Your Listings</h1>
                    @if(count($listings))
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($listings as $listing)
                                <tr>
                                    <td>{{ $listing->name }}</td>
                                    <td colspan="2">
                                        <div class="float-right">
                                            <a href="{{ route('listings.edit', $listing->id) }}" class="btn btn-primary mr-1">Edit</a>

                                            {{ Form::open(['route' => ['listings.destroy', $listing->id], 'method' => 'post','class' => 'float-right', 'onsubmit' => 'return confirm("Are you sure?")']) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class' => "btn btn-danger"]) }}
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
