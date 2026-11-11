@vite(['resources/css/app.css', 'resources/js/app.js'])
<form method="POST" action="{{ route('portfolio.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="developer name">name</label>
        <input type="text" class="form-control" id="developer name" name="developer name" required>
    </div>
    <div class="form-group">
        <label for="job_title">Job title</label>
        <textarea class="form-control" id="job_title" name="job_title" rows="3" required></textarea>
    </div>
	<div class="form-group">
        <label for="title">Project Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="description">Project Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>