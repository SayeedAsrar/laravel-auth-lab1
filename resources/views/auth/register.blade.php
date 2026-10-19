<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Create an account</h1>

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

    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div>
            <label for="name">Full name</label><br>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required>
        </div>
        <br>
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
        <div>
            <label for="password_confirmation">Confirm Password</label><br>
            <input id="password_confirmation" name="password_confirmation" type="password" required>
        </div>
        <br>
        <button type="submit">Register</button>
    </form>
    
    <br>
    <a href="{{ route('login') }}">Already have an account?</a>
</body>
</html>
