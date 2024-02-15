<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\KategoriProject;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{

    public function index()
    {
        return view('adminView/project', [
            'tittle' => 'Project',
            'project' => Project::latest()->paginate(5)
        ]);
    }


    public function create()
    {
        return view('adminView/projectCreate', [
            'tittle' => 'Project',
            'kategories' => KategoriProject::all()

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_project' => 'required|max:255',
            'slug' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|file|max:5120'
        ]);

        Project::create($validatedData);

        return redirect('/dashboard/project')->with('pesan', 'Lowongan baru berhasil ditambah');
    }


    public function show(Project $lowongan)
    {
        return view('adminView/projectDetail', [
            'tittle' => 'Project',
            'data' => $lowongan
        ]);
    }


    public function edit(Project $lowongan)
    {
        return view('adminView/projectEdit', [
            'tittle' => 'Project',
            'data' => $lowongan
        ]);
    }


    public function update(Request $request, Project $lowongan)
    {
        $rules = ([
            'posisi' => 'required|max:255',
            'persyaratan' => 'required',
            'excerpt' => 'required',
        ]);

        if ($request->slug != $lowongan->slug) {
            $rules['slug'] = 'required|unique:lowongans';
        }

        $validatedData = $request->validate($rules);

        Project::where('id', $lowongan->id)
            ->update($validatedData);

        return redirect('/dashboard/project')->with('pesan', 'Lowongan berhasil di Update');
    }


    public function destroy(Project $project)
    {
        if ($project->image) {
            File::delete(public_path('/images/galeri-image/' . $project->image));
        }

        Project::destroy($project->id);

        return redirect('/dashboard/galeri')->with('pesan', 'Foto galeri berhasil di hapus');
    }
}
