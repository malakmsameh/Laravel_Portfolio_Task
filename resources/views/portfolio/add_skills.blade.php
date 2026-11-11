<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Skill</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body>
	@include('partials.navbar')

	<div style="max-width: 600px; margin: 2rem auto;">
		<h2>Add Skill for {{ $developer->name }}</h2>

		<form method="POST" action="{{ route('portfolio.store_skill', $developer->id) }}">
			@csrf
			
			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="skill">New Skill (e.g., PHP, Laravel, Vue)</label>
				<input type="text" class="form-control" id="skill" name="skill" 
					   value="{{ old('skill') }}" required>
				@error('skill') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<button type="submit" class="btn btn-primary">Add Skill</button>
			<a href="{{ route('portfolio.developer_view', $developer->id) }}">Cancel</a>
		</form>
	</div>
</body>
</html>