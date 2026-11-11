<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Portfolio</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>

<body>
    @include('partials.navbar')
    <h2>Developers</h2>
    <ul>

        @foreach ($developers as $developer)
            <div class="developer-card">
                <h3>{{ $developer->name }}</h3>
                <p class="job-title">{{ $developer->{'job title'} }}</p>
            <button><a href="{{ route('portfolio.developer_view', $developer->id) }}">view</a></button>

</div>
        @endforeach
    </ul>

</body>

</html>