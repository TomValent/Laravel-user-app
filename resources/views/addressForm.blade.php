<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Insert Address</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <h2 class="heading">Add New Address</h2>

    @if (request()->query('success') == 'true')
        <div style="color:green" class="heading">
            <h3>Saving your address was successful!</h3>
        </div>
    @elseif (request()->query('success') !== null && request()->query('success') == 'false')
        <div style="color:red" class="heading">
            <h3>Error while saving data!</h3>
        </div>
    @endif


    <div class="address_form">
        <form class="wide" action="{{ url('/api/user/' . request()->route('userId') . '/address') }}" method="POST">
            @csrf
            <p style="padding-bottom: 30px">Address</p>
            <div class="form-grid">
                <div class="grid-item">
                    <label for="street">Street <span class="required-star">*</span></label>
                    <input type="text" id="street" name="street" required>
                </div>

                <div class="grid-item">
                    <label for="city">City <span class="required-star">*</span></label>
                    <input type="text" id="city" name="city" required>
                </div>

                <div class="grid-item">
                    <label for="zip">Zip code <span class="required-star">*</span></label>
                    <input type="text" id="zip" name="zip" required>
                </div>

                <div class="grid-item">
                    <label for="countryCode">Country code (2 letters)<span class="required-star">*</span></label>
                    <input type="text" id="countryCode" name="countryCode" maxlength="2" required>
                </div>

                <div class="grid-item">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>

                <div class="grid-item">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone">
                </div>
            </div>

            <input type="hidden" name="userId" value="{{ request()->route('userId') }}">

            <div class="grid-item form-button">
                <button type="submit">Submit</button>
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
