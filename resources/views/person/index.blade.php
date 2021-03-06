@extends('layout')

@section('content')
    <a class="btn btn-sm btn-secondary float-right mb-3" href="{{ action('PersonController@create', $company->id) }}">Add</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Title</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <th>{{ $row->id }}</th>
                <td>{{ $row->first_name }}</td>
                <td>{{ $row->last_name }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->phone }}</td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{ action('PersonController@edit', [$company->id, $row->id]) }}">Edit</a>
                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete"
                       data-action="{{ action('PersonController@destroy', [$company->id, $row->id]) }}">Delete</a>
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
            var action = $(e.relatedTarget).data('action');
            $('#delete-form').attr('action', action);
        });
    </script>
@endsection
