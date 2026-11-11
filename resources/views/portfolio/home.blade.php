<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Portfolio</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])	
</head>
<body>

    @include('partials.navbar')

    <h1>Welcome to My Portfolio</h1>



    <section>
        <h2>Developers</h2>

        @forelse ($developers as $developer)
            <div class="developer-card">
                <h3>{{ $developer->name }}</h3>
                <p class="job-title">{{ $developer->{'job title'} }}</p>

                @forelse ($developer->projects as $project)
                    <div class="project-card">
                        <h5>{{ $project->title }}</h5>
                        <p>{{ $project->description }}</p>
                    </div>
                @empty
                    <p>No projects assigned yet.</p>
                @endforelse
            </div>
        @empty
            <p>No developers yet.</p>
        @endforelse
    </section>

</body>
</html>