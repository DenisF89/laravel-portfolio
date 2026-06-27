<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    @vite('resources/js/app.js')
</head>
<body>
    @include("layouts.partials.header")
    <div class="container">
        <h1>
            @yield("title")
        </h1>

        @yield("content")
    </div>
</body>
</html>
