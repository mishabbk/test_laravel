@extends('layout')

@section('header-title', 'Clients')

@section('content')
    <div class="row mt-3">
        <div class="col-8">
            <form method="get" action="{{ route('index') }}">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4 text-right">
            <a href="{{ route('create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>
        @if (!empty($search))
            <div class="col-12">
                <h3 class="mt-3">Result from data source: {{ $sourceData }}</h3>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <th scope="row">{{ $client->id }}</th>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td>
                                    <a href="{{ route('edit', [$client->id]) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Clients not found...</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
