<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business</title>
</head>
<body>
    <h1>Business</h1>
    <hr>
    @foreach($businesses as $business)
        <h1>Name: {{ $business->name }}</h1>
        <h2>Client: {{ $business->client }}</h2>
        <hr>
    @endforeach
</body>
</html>
