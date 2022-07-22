<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue Crud</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <main id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('person.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Api">R&M</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('city.index')}}">City</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        {{$slot}}

    </main>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
