<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Project</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body>
	@include('partials.navbar')

	<div style="max-width: 600px; margin: 2rem auto;">
		<h2>Edit Project: {{ $project->title }}</h2>

		<!-- Notice we pass both developer->id and project->id in the route array -->
		<form method="POST" action="{{ route('portfolio.update_developer_pro', [$developer->id, $project->id]) }}">
			@csrf
			@method('PUT')

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="title">Project Title</label>
				<input type="text" class="form-control" id="title" name="title" 
					   value="{{ old('title', $project->title) }}" required>
				@error('title') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="description">Description</label>
				<textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
				@error('description') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<div class="form-group" style="margin-bottom: 1rem;">
				<label for="status">Status</label>
				<select class="form-control" id="status" name="status" required>
					<option value="in_progress" {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
					<option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
				</select>
				@error('status') <span style="color:red;">{{ $message }}</span> @enderror
			</div>

			<button type="submit" class="btn btn-primary">Update Project</button>
			<a href="{{ route('portfolio.developer_view', $developer->id) }}">Cancel</a>
		</form>
	</div>
</body>
</html>