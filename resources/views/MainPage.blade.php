<div>
    @foreach ($users as $user)
        <p>{{ $user->Email }} - {{ $user->Password }}</p>
    @endforeach
</div>
