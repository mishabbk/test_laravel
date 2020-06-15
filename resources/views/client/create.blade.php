@extends('layout')

@section('header-title', 'Create Client')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            @include(
                'client._form',
                [
                    'path' => route('store'),
                    'method' => 'POST'
                ]
            )
        </div>
    </div>
@endsection
