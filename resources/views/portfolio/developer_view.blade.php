<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $developer->name }} - Projects</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>

<body>
	@include('partials.navbar')

	<div class="developer-header">
		<h1>{{ $developer->name }}</h1>
		<h3 class="job-title">{{ $developer->{'job title'} }}</h3>
		<button><a href="{{ route('portfolio.edit_title', $developer->id) }}">Edit job title</a></button>

		@if (!empty($developer->skills))
			<div class="skills">
				@foreach ($developer->skills as $skill)
					<span class="skill-badge">{{ $skill }}</span>
				@endforeach
			</div>
		@endif
		
		<button><a href="{{ route('portfolio.add_skills', $developer->id) }}">Add skills</a></button>
		<button><a href="{{ route('portfolio.edit_skills', $developer->id) }}">Edit skills</a></button>
	</div>

	<div class="projects-section">
		<h2>Projects by {{ $developer->name }}</h2>

		<div class="projects-grid">
			@forelse ($developer->projects as $project)
				<div class="project-card">
					<h3>{{ $project->title }}</h3>
					<p>{{ $project->description }}</p>

					<div class="status-badge status-{{ $project->status }}">
						{{ str_replace('_', ' ', $project->status) }}
					</div>

					<div style="margin-top: 10px;">
						<!-- Edit button correctly passes BOTH developer and project IDs -->
						<button>
							<a href="{{ route('portfolio.edit_projects', [$developer->id, $project->id]) }}">Edit</a>
						</button>

						<!-- Delete button correctly passes BOTH IDs and uses a form -->
						<form action="{{ route('portfolio.destroy_project', [$developer->id, $project->id]) }}" method="POST" style="display:inline;">
							@csrf
							@method('DELETE')
							<button type="submit" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
						</form>
					</div>
				</div>
			@empty
				<p>This developer hasn't added any projects yet.</p>
			@endforelse
		</div>
		
		<!-- Add project button stays here -->
		<div style="margin-top: 20px;">
			<button><a href="{{ route('portfolio.add_projects', $developer->id) }}">Add New Project</a></button>
		</div>
	</div>

	<div style="margin-top: 2rem;">
		<a href="{{ route('developer') }}" class="back-btn">&larr; Back to all developers</a>
	</div>

</body>
</html>