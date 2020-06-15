@extends('layout')

@section('header-title', 'Edit Client')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            @include(
                'client._form',
                [
                    'path' => route('update', [$client->id]),
                    'method' => 'PUT'
                ]
            )
        </div>
    </div>
@endsection
