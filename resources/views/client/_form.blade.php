<form method="POST" action="{{ $path }}">
    @csrf
    @if ($method != 'POST')
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="first_name" class="@error('first_name') text-danger @enderror">
            First Name
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
               name="first_name" id="first_name" placeholder="First Name" required
               value="{{ old('first_name', isset($client) ? $client->first_name : '') }}">
        @error('first_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name" class="@error('last_name') text-danger @enderror">
            Last Name
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
               name="last_name" id="last_name" placeholder="Last Name" required
               value="{{ old('last_name', isset($client) ? $client->last_name : '') }}">
        @error('last_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="text-right">
        <a href="{{ route('index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>

