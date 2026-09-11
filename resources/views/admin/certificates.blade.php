<!DOCTYPE html>
<html lang="en" data-theme="dark" data-accent="gold">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Edit Certificates</title>
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
    <div class="admin-shell">
        <header class="admin-topbar">
            <h1>Edit Certificates</h1>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="back-link" style="background:none;border:none;cursor:pointer;">Log out</button>
            </form>
        </header>

        <main class="admin-main">
            <p><a class="back-link" href="{{ url('/') }}">&larr; Back to portfolio</a></p>

            @if (session('status'))
                <div class="admin-status">{{ session('status') }}</div>
            @endif

            @if ($certificates->isEmpty())
                <p class="admin-empty">No certificates found.</p>
            @endif

            @foreach ($certificates as $cert)
                <form class="admin-card" method="POST" action="{{ route('admin.update', $cert) }}">
                    @csrf
                    @method('PUT')

                    <div class="admin-card-top">
                        <img src="{{ asset($cert->image) }}" alt=""> 
                        <div>
                            <h2>{{ $cert->title }}</h2>
                            <p>{{ $cert->image }}</p>
                        </div>
                    </div>

                    <div class="admin-fields">
                        <div class="admin-field wide">
                            <label for="title-{{ $cert->id }}">Title</label>
                            <input type="text" id="title-{{ $cert->id }}" name="title"
                                   value="{{ old('title', $cert->title) }}">
                        </div>
                        <div class="admin-field">
                            <label for="org-{{ $cert->id }}">Organization</label>
                            <input type="text" id="org-{{ $cert->id }}" name="org"
                                   value="{{ old('org', $cert->org) }}" placeholder="TESDA">
                        </div>
                        <div class="admin-field">
                            <label for="year-{{ $cert->id }}">Date / Year</label>
                            <input type="text" id="year-{{ $cert->id }}" name="year"
                                   value="{{ old('year', $cert->year) }}" placeholder="e.g. 2024">
                        </div>
                        <div class="admin-field">
                            <label for="sort-{{ $cert->id }}">Order</label>
                            <input type="number" id="sort-{{ $cert->id }}" name="sort_order" min="1"
                                   value="{{ old('sort_order', $cert->sort_order) }}">
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            @endforeach
        </main>
    </div>
</body>
</html>