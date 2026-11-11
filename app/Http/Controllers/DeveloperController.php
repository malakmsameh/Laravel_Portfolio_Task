<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Developer;
use App\Models\Project;

class DeveloperController extends Controller
{
	public function developer(): View
	{
		$developers = Developer::all();
		return view('portfolio.developer', compact('developers'));
	}

	public function developer_view(Developer $developer)
	{
		$developer->load('projects');
		return view('portfolio.developer_view', compact('developer'));
	}

	// ==========================================
	// DEVELOPER PROFILE (Name & Job Title)
	// ==========================================
	public function edit_title(Developer $developer)
	{
		return view('portfolio.edit_title', compact('developer'));
	}

	public function update_title(Request $request, Developer $developer)
	{
		$validatedData = $request->validate([
			'name'	  => 'required|string|max:255',
			'job title' => 'required|string|max:255', // Must match DB column exactly
		]);

		$developer->update($validatedData);

		return redirect()->route('portfolio.developer_view', $developer->id)->with('success', 'Profile updated successfully.');
	}

	// ==========================================
	// DEVELOPER SKILLS
	// ==========================================
	public function add_skill(Developer $developer)
	{
		return view('portfolio.add_skills', compact('developer'));
	}

	public function store_skill(Request $request, Developer $developer)
	{
		$request->validate([
			'skill' => 'required|string|max:50',
		]);

		// Get current skills array, add new skill, save back
		$skills = $developer->skills ?? [];
		$skills[] = $request->skill;
		$developer->update(['skills' => $skills]);

		return redirect()->route('portfolio.developer_view', $developer->id)->with('success', 'Skill added.');
	}

	public function edit_skill(Developer $developer)
	{
		return view('portfolio.edit_skills', compact('developer'));
	}

	public function update_skill(Request $request, Developer $developer)
	{
		$request->validate([
			'skills' => 'required|string', // Expecting comma separated string from input
		]);

		// Convert comma separated string to an array
		$skillsArray = array_map('trim', explode(',', $request->skills));
		
		$developer->update(['skills' => $skillsArray]);

		return redirect()->route('portfolio.developer_view', $developer->id)->with('success', 'Skills updated.');
	}

	// ==========================================
	// PROJECTS (CRUD)
	// ==========================================
	public function add_project(Developer $developer)
	{
		return view('portfolio.add_projects', compact('developer'));
	}

	public function store_project(Request $request, Developer $developer)
	{
		$validatedData = $request->validate([
			'title'	   => 'required|string|max:255',
			'description' => 'required|string',
			'status'	  => 'required|in:in_progress,completed',
		]);

		// Automatically link to this developer
		$developer->projects()->create($validatedData);

		return redirect()->route('portfolio.developer_view', $developer->id)->with('success', 'Project created successfully.');
	}

	public function edit_project(Developer $developer, Project $project)
	{
		return view('portfolio.edit_projects', compact('developer', 'project'));
	}

	public function update_project(Request $request, Developer $developer, Project $project)
	{
		$validatedData = $request->validate([
			'title'	   => 'required|string|max:255',
			'description' => 'required|string',
			'status'	  => 'required|in:in_progress,completed',
		]);

		$project->update($validatedData);

		return redirect()->route('portfolio.developer_view', $developer->id)->with('success', 'Project updated successfully.');
	}

	public function destroy_project(Developer $developer, Project $project)
	{
		$project->delete();

		return redirect()->route('portfolio.developer_view', $developer->id)->with('success', 'Project deleted successfully.');
	}
}