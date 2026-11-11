<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Developer Profile</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body>
	@include('partials.navbar')

	<div style="max-width: 600px; margin: 2rem auto;">
		<h2>Edit Profile for {{ $developer->name }}</h2>

		<!-- Route points to update_developer -->
		<form method="POST" action="{{ route('portfolio.update_developer', $developer->id) }}">
			@csrf
			@method('PUT')

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" 
					   value="{{ old('name', $developer->name) }}" required>
				@error('name') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="job_title">Job Title</label>
				<!-- Input name MUST be 'job title' because that is your DB column name -->
				<input type="text" class="form-control" id="job_title" name="job title" 
					   value="{{ old('job title', $developer->{'job title'}) }}" required>
				@error('job title') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<button type="submit" class="btn btn-primary">Update Profile</button>
			<a href="{{ route('portfolio.developer_view', $developer->id) }}">Cancel</a>
		</form>
	</div>
</body>
</html>