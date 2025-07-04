@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('message-success'))
    <div class="alert alert-success">
        {{ session('message-success') }}
    </div>
@endif