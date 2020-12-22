@extends('layout')

@section('content')
    <a class="btn btn-sm btn-secondary float-right mb-3" href="{{ route('companies.index') }}">Cancel</a>

    @widget('Site\ValidationErrors')

    <form method="post" action="{{ $action }}">
        @csrf
        @if($edit > 0)
            @method('put')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $edit > 0 ? $row->name : '') }}" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $edit > 0 ? $row->link : '') }}" placeholder="Enter link">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
