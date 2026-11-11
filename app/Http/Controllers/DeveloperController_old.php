<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Developer;

class DeveloperController extends Controller
{
    //

	public function developer(): View
    {
        $developers = Developer::all();

        return view('portfolio.developer', compact('developers'));
    }

	public function developer_view(Developer $developer)
	{
		// $developers = Developer::all();
		$developer->load('projects');
		return view('portfolio.developer_view', compact('developer'));
	} 

    public function create_dev()
    {
        return view('portfolio.create_dev');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        developer::create($validatedData);

        return redirect()->route('projects')->with('success', 'Project created successfully.');
    }

    public function add_projects()
    {
        return view('portfolio.add_project', compact('developer'));
    }
    public function store_pro(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        developer::add_projects($validatedData);

        return redirect()->route('developer_view')->with('success', 'Project created successfully.');
    }

	public function add_skill(Developer $developer)
    {
        return view('portfolio.add_skill', compact('developer'));
    }
	public function edit_skill(Developer $developer)
    {
        return view('portfolio.edit_skill', compact('developer'));
    }

    public function store_skill(Request $request)
    {
        $validatedData = $request->validate([
            'skills' => 'required|string|max:255',
        ]);
        developer::add_skill($validatedData);

        return redirect()->route('developer_view')->with('success', 'skill created successfully.');
    }

    public function edit(Developer $developer)
    {
        return view('portfolio.edit', compact('developer'));
    }
   public function edit_title(Developer $developer)
    {
        return view('portfolio.edit_title', compact('developer'));
    }

    // public function update(Request $request, Project $project)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //     ]);

    //     $project->update($validatedData);

    //     return redirect()->route('developer_view')->with('success', 'Project updated successfully.');
    // }

	    public function update_title(Request $request, Developer $developer)
    {
        $validatedData = $request->validate([
            'job title' => 'required|string|max:255',
        ]);

        $developer->update($validatedData);

        return redirect()->route('developer_view')->with('success', 'title updated successfully.');
    }

    public function destroy(eveloper $developer)
    {
        $developer->delete();

        return redirect()->route('developers')->with('success', 'developer deleted successfully.');
    }
}
