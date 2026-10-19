<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div>
            <label for="email">Email</label><br>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
        </div>
        <br>
        <div>
            <label for="password">Password</label><br>
            <input id="password" name="password" type="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>

    <br>
    <a href="{{ route('register') }}">Don't have an account?</a>
</body>
</html>
