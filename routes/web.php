<?php



use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\aboutContoller;

Route::get('/', [PortfolioController::class, 'home'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/skills', [SkillController::class, 'index'])->name('skills');
Route::get('/developer',[DeveloperController::class,'developer'])->name('developer');
// Route::get('/developer_view',[DeveloperController::class,'developer'])->name('developer_view');


// ... (keep your home, about, projects, skills routes here) ...

// --- DEVELOPER PROFILE ROUTES ---
Route::get('/developer', [DeveloperController::class, 'developer'])->name('developer');
Route::get('/developer/{developer}', [DeveloperController::class, 'developer_view'])->name('portfolio.developer_view');

// Edit Developer Title/Name
Route::get('/developer/{developer}/edit', [DeveloperController::class, 'edit_title'])->name('portfolio.edit_title');
Route::put('/developer/{developer}', [DeveloperController::class, 'update_title'])->name('portfolio.update_developer');

// Add/Edit Developer Skills
Route::get('/developer/{developer}/skills/add', [DeveloperController::class, 'add_skill'])->name('portfolio.add_skills');
Route::post('/developer/{developer}/skills', [DeveloperController::class, 'store_skill'])->name('portfolio.store_skill');
Route::get('/developer/{developer}/skills/edit', [DeveloperController::class, 'edit_skill'])->name('portfolio.edit_skills');
Route::put('/developer/{developer}/skills', [DeveloperController::class, 'update_skill'])->name('portfolio.update_developer_skill');

// Add/Edit/Delete Projects
Route::get('/developer/{developer}/projects/add', [DeveloperController::class, 'add_project'])->name('portfolio.add_projects');
Route::post('/developer/{developer}/projects', [DeveloperController::class, 'store_project'])->name('portfolio.store_project');
Route::get('/developer/{developer}/projects/{project}/edit', [DeveloperController::class, 'edit_project'])->name('portfolio.edit_projects');
Route::put('/developer/{developer}/projects/{project}', [DeveloperController::class, 'update_project'])->name('portfolio.update_developer_pro');
Route::delete('/developer/{developer}/projects/{project}', [DeveloperController::class, 'destroy_project'])->name('portfolio.destroy_project');
// view dev
// Route::get('/developer/{developer}', [DeveloperController::class, 'developer_view'])->name('portfolio.developer_view');
// edit dev title
// Route::get('/developer/{developer}/edit', [DeveloperController::class, 'edit_title'])->name('portfolio.edit_title');
// Route::put('/developer/{developer}', [DeveloperController::class, 'update_title'])->name('portfolio.update_developer');
// edit dev skill
// Route::get('/developer/{developer}/skills/edit', [DeveloperController::class, 'edit_skill'])->name('portfolio.edit_skill');
// Route::put('/developer/{developer}/skills', [DeveloperController::class, 'update_skill'])->name('portfolio.update_developer_skill');
// edit dev project
// Route::get('/developer/{developer}/projects/edit', [DeveloperController::class, 'edit_project'])->name('portfolio.edit_project');
// Route::put('/developer/{developer}/projects', [DeveloperController::class, 'update_project'])->name('portfolio.update_developer_pro');

// add dev skills
// Route::get('/developer/{developer}/skills/add', [DeveloperController::class, 'add_skills'])->name('portfolio.add_skills');
// 
// add dev project 
// Route::get('/developer/{developer}/projects/add', [DeveloperController::class, 'add_projects'])->name('portfolio.add_projects');
// 

Route::get('/skills', [SkillController::class, 'index'])->name('skills');
Route::get('/about', [aboutContoller::class, 'index'])->name('about');
Route::get('/projects/create', [PortfolioController::class, 'create'])->name('portfolio.create');
Route::post('/projects', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/projects/{project}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
Route::put('/projects/{project}', [PortfolioController::class, 'update'])->name('portfolio.update');
Route::delete('/projects/{project}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
Route::post('/projects', [DeveloperController::class, 'index'])->name('portfolio.store');