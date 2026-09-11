<!DOCTYPE html>
<html lang="en" data-theme="dark" data-accent="gold">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        (function () {
            try {
                var t = localStorage.getItem('portfolio-theme');
                if (!t) t = 'dark';
                document.documentElement.setAttribute('data-theme', t);
                document.documentElement.setAttribute('data-accent', 'gold');
            } catch (e) {}
        })();
    </script>
</head>
<body>
    <div class="admin-login">
        <h1>Admin Login</h1>
        <p>Enter the admin password to edit certificates.</p>

        @if ($errors->any())
            <div class="admin-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="admin-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" autofocus autocomplete="current-password">
            </div>
            <div class="admin-actions" style="margin-top:14px;">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>

        <p style="margin-top:18px; text-align:center;"><a class="back-link" href="{{ url('/') }}">&larr; Back to portfolio</a></p>
    </div>
</body>
</html>