@extends('layout')

@section('content')
    <a class="btn btn-sm btn-secondary float-right mb-3" href="{{ action('CompanyController@create') }}">Add</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
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
                <td>{{ $row->email }}</td>
                <td>{{ $row->phone }}</td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{ action('CompanyController@edit', $row->id) }}">Edit</a>
                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete"
                       data-action="{{ action('CompanyController@destroy', $row->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" role="dialog" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="delete-form" role="form" method="post" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
