<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Project</title>
	 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
	@include('partials.navbar')

	<div style="max-width: 600px; margin: 2rem auto;">
		<h2>Add Project for {{ $developer->name }}</h2>

		<form method="POST" action="{{ route('portfolio.store_project', $developer->id) }}">
			@csrf
			
			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="title">Project Title</label>
				<input type="text" class="form-control" id="title" name="title" 
					   value="{{ old('title') }}" required>
				@error('title') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="description">Description</label>
				<textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
				@error('description') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="status">Status</label>
				<select class="form-control" id="status" name="status" required>
					<option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
					<option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
				</select>
				@error('status') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<button type="submit" class="btn btn-primary">Create Project</button>
			<a href="{{ route('portfolio.developer_view', $developer->id) }}">Cancel</a>
		</form>
	</div>
</body>
</html>