@extends('layout')

@section('content')
    <a class="btn btn-sm btn-secondary float-right mb-3" href="{{ action('AddressController@create', $company->id) }}">Add</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <th>{{ $row->id }}</th>
                <td>{{ $row->latitude }}</td>
                <td>{{ $row->longitude }}</td>
                <td>
                    <a class="btn btn-light btn-xs" href="{{ action('MapController@show', [$row->id]) }}">Map</a>
                    <a class="btn btn-info btn-xs" href="{{ action('AddressController@edit', [$company->id, $row->id]) }}">Edit</a>
                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete"
                       data-action="{{ action('AddressController@destroy', [$company->id, $row->id]) }}">Delete</a>
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
