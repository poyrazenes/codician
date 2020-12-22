@extends('layout')

@section('content')
    <a class="btn btn-sm btn-secondary float-right mb-3" href="{{ route('companies.persons.index', $company->id) }}">Cancel</a>

    @widget('Site\ValidationErrors')

    <form method="post" action="{{ $action }}">
        @csrf
        @if($edit > 0)
            @method('put')
        @endif
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $edit > 0 ? $row->first_name : '') }}" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $edit > 0 ? $row->last_name : '') }}" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $edit > 0 ? $row->title : '') }}" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $edit > 0 ? $row->email : '') }}" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $edit > 0 ? $row->phone : '') }}" placeholder="Enter phone">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
