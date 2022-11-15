<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sandelys</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    </head>
    <body >
        <div class="container">
            @if (Route::has('login'))
                <div class="d-flex justify-content-end mt-5 me-5" >
                    @auth
                        <a href="{{ url('/home') }}" class="btn border">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn border me-3
                        ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn border">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
