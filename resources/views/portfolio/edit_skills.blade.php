<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Skills</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body>
	@include('partials.navbar')

	<div style="max-width: 600px; margin: 2rem auto;">
		<h2>Edit Skills for {{ $developer->name }}</h2>

		<form method="POST" action="{{ route('portfolio.update_developer_skill', $developer->id) }}">
			@csrf
			@method('PUT')

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="skills">Skills (separated by commas)</label>
				<!-- Implode the JSON array into a comma-separated string for the input -->
				<input type="text" class="form-control" id="skills" name="skills" 
					   value="{{ old('skills', $developer->skills ? implode(', ', $developer->skills) : '') }}" required>
				@error('skills') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<button type="submit" class="btn btn-primary">Update Skills</button>
			<a href="{{ route('portfolio.developer_view', $developer->id) }}">Cancel</a>
		</form>
	</div>
</body>
</html>