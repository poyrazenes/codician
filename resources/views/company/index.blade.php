@extends('layout')

@section('content')
    <a class="btn btn-sm btn-secondary float-right mb-3" href="{{ action('CompanyController@create') }}">Add</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Link</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <th>{{ $row->id }}</th>
                <td>{{ $row->name }}</td>
                <td>{{ $row->link }}</td>
                <td>
                    <a class="btn btn-light btn-xs" href="{{ action('CompanyController@show', ['company' => $row->id, 'type' => 'png']) }}">Image</a>
                    <a class="btn btn-light btn-xs" href="{{ action('CompanyController@show', ['company' => $row->id, 'type' => 'html']) }}">Html</a>
                    <a class="btn btn-info btn-xs" href="{{ action('CompanyController@edit', $row->id) }}">Edit</a>
                    <a class="btn btn-info btn-xs" href="{{ action('PersonController@index', $row->id) }}">Person</a>
                    <a class="btn btn-info btn-xs" href="{{ action('AddressController@index', $row->id) }}">Address</a>
                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete"
                       data-action="{{ action('CompanyController@destroy', $row->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @widget('Modals\Delete')
@endsection

@section('js')
    <script>
        $('#modalDelete').on('show.bs.modal', function(e) {
            console.log('geldi geldi');
            var action = $(e.relatedTarget).data('action');
            $('#delete-form').attr('action', action);
        });
    </script>
@endsection
