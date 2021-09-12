@if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-400">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
