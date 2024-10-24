<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PENA</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/pena.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    @viteReactRefresh
    @vite('resources/js/index.jsx')
    <div id="frontend-app"></div>
</body>
</html>