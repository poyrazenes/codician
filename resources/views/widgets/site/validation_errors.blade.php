@if ($errors->any())
    <div class="alert alert-dismissible alert-danger mb-5 p-3">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>Hata!</h4>
        <ul>
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
