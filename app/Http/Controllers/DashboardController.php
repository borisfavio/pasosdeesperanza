<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\FoundationSetting;
use App\Models\Program;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'programs' => Program::latest()->get(),
            'activities' => Activity::with('program')->latest()->get(),
            'staff' => Staff::latest()->get(),
            'settings' => FoundationSetting::pluck('value', 'key'),
        ]);
    }

    public function storeProgram(Request $request)
    {
        Program::create($request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:2000'],
            'icon' => ['nullable', 'string', 'max:20'],
        ]));

        return back()->with('success', 'Programa creado correctamente.');
    }

    public function destroyProgram(Program $program)
    {
        $program->delete();

        return back()->with('success', 'Programa eliminado.');
    }

    public function storeActivity(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'summary' => ['required', 'string', 'max:500'],
            'content' => ['nullable', 'string', 'max:10000'],
            'image_url' => ['nullable', 'url', 'max:500'],
            'published_at' => ['nullable', 'date'],
            'program_id' => ['nullable', 'exists:programs,id'],
        ]);
        $data['slug'] = Str::slug($data['title']).'-'.Str::lower(Str::random(5));
        $data['is_published'] = $request->boolean('is_published');
        Activity::create($data);

        return back()->with('success', 'Actividad guardada correctamente.');
    }

    public function destroyActivity(Activity $activity)
    {
        $activity->delete();

        return back()->with('success', 'Actividad eliminada.');
    }

    public function storeStaff(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'position' => ['required', 'string', 'max:120'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'photo_url' => ['nullable', 'url', 'max:500'],
        ]);
        $data['is_visible'] = $request->boolean('is_visible');
        Staff::create($data);

        return back()->with('success', 'Integrante agregado.');
    }

    public function destroyStaff(Staff $staff)
    {
        $staff->delete();

        return back()->with('success', 'Integrante eliminado.');
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'foundation_email' => ['nullable', 'email', 'max:180'],
            'foundation_phone' => ['nullable', 'string', 'max:40'],
            'foundation_address' => ['nullable', 'string', 'max:255'],
            'foundation_description' => ['nullable', 'string', 'max:1000'],
        ]);

        foreach ($data as $key => $value) {
            FoundationSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Datos de la fundación actualizados.');
    }
}
