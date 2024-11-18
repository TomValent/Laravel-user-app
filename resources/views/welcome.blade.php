<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
        <h2 class="heading">Welcome</h2>

        <div class="container">
            <form class="narrow" action="{{ route('auth.handle') }}" method="POST">
                @csrf
                <p style="padding-bottom: 30px">Login or Register</p>
                <div class="item">
                    <label for="name">Full name</label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="item">
                    <label for="email">Email <span class="required-star">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="item">
                    <label for="password">Password <span class="required-star">*</span></label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="item">
                    <button type="submit">Login or Register</button>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div class="required-star">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>
    </body>
</html>
