<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    private function performValidation($request)
    {
        // Validaciones
        $rules = [
            'name' => 'required | min:3'
        ];


        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Como minimo el nombre debe tener 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->performValidation($request);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // Insert

        $notification = "La especialidad se ha registrado correctamente";

        return redirect('/specialties')->whith(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }


    public function update(Request $request, Specialty $specialty)
    {
        $this->performValidation($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // Update

        $notification = "La especialidad se ha actualizado correctamente";

        return redirect('/specialties')->whith(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $deletedSpecialty = $specialty->name;
        $specialty->delete();

        $notificacion = "La especialidad'.$deletedSpecialty.' se ha eliminado correctamente";
        return redirect('/specialties')->whith(compact('notificacion'));
    }
}
