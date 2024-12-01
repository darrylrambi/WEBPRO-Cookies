<title>Hasil</title>
<div>
    <h1>User list dari database</h1>
    @if(session('users'))
        @foreach(session('users') as $user)
            <p>{{ $user->Email }} - {{ $user->Password }}</p>
        @endforeach
    @else
        <p>Tidak ada user</p>
    @endif

    <h1>Cookies</h1>
    @if(isset($_COOKIE['LoginEmail']) && isset($_COOKIE['LoginPassword']))
        <p>{{ $_COOKIE['LoginEmail'] }}</p>
        <p>{{ $_COOKIE['LoginPassword'] }}</p>
    @else
        <p>Tidak ada cookies</p>
    @endif
</div>
