@if ($errors->any())
    <div class="alert alert-danger w-100">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-primary w-100">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-warning w-100">
        <p>{{ Session::get('error') }}</p>
    </div>
@endif
