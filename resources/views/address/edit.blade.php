@extends('layout')

@section('content')
    <a class="btn btn-sm btn-secondary float-right mb-3" href="{{ route('companies.addresses.index', $company->id) }}">Cancel</a>

    @widget('Site\ValidationErrors')

    <form method="post" action="{{ $action }}">
        @csrf
        @if($edit > 0)
            @method('put')
        @endif
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $edit > 0 ? $row->latitude : '') }}" placeholder="Enter latitude">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $edit > 0 ? $row->longitude : '') }}" placeholder="Enter longitude">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
