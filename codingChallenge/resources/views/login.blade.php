<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="login-container">
        <h2>Login</h2>
        @if ($errors->has('message'))
            <div style="color: red;">{{ $errors->first('message') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
<script>
    $(document).ready(function() {
        $('input[type="text"], input[type="password"]').addClass('form-control');
        $('button[type="submit"]').addClass('btn btn-primary');
    });
</script>
</body>
</html>