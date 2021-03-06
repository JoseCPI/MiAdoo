<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropuestaController extends Controller
{
    public function index()
    {
        $propuestas = Propuesta::search()->orderBy('id')->get();
        return view('admin.propuestas.index', ['propuestas' => $propuestas]);
    }

    public function create()
    {
        return view('user.propuestas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'string|required',
            'correo' => 'string|required',
            'departamento' => 'string|required',
            'division' => 'string|required',
            'contenido' => 'string|required',
            'contenido_sintetico' => 'string|required',
            'modulos' => 'string|required',
            'evaluacion' => 'string|required',
            'documentacion' => 'string|required',
            'objetivo_general' => 'string|required',
            'objetivo_especifico' => 'string|required',
            'utilidad' => 'string|required',
            'experiencia' => 'string|required',
            'curriculum' => 'file|required',
            'curriculum_path' => 'string|required',
            'requisitos_alumnos' => 'string|required',
            'duracion_horas' => 'numeric|required|min:1',
            'financiamiento' => 'string|required',
            'perfil_instructor' => 'string|required',
            'curriculum_sintetico' => 'string|required',
            'operacion_curso' => 'string|required',
            'Unidad' => 'string|required',
            'infraestructura' => 'string|required',
            'cupo_minimo' => 'numeric|required|min:1',
            'cupo_maximo' => 'numeric|required|min:1',
            //'fecha_inicio' => 'string|required',
            //'fecha_final' => 'string|required',
            'tipo_curso' => [
                'required',
                Rule::in(['Obligatoria', 'Optativa']),
            ],
            'exclusividad' => [
                'required',
                Rule::in(['Abierto', 'Exclusivo']),
            ],
            'idioma' => [
                'required',
                Rule::in(['Español', 'Inglés']),
            ],
        ]);

        $propuesta = new Propuesta;

        $propuesta->nombre = $request->nombre;
        $propuesta->correo_instructor = $request->correo;
        $propuesta->departamento = $request->departamento;
        $propuesta->division = $request->division;
        $propuesta->tipo_curso = $request->tipo_curso;
        $propuesta->contenido = $request->contenido;
        $propuesta->contenido_sintetico = $request->contenido_sintetico;
        $propuesta->modulos = $request->modulos;
        $propuesta->evaluacion = $request->evaluacion;
        $propuesta->documentacion = $request->documentacion;
        $propuesta->financiamiento = $request->financiamiento;
        $propuesta->objetivo_general = $request->objetivo_general;
        $propuesta->objetivo_especifico = $request->objetivo_especifico;
        $propuesta->utilidad = $request->utilidad;
        $propuesta->experiencia_intructor = $request->experiencia_intructor;
        $propuesta->curriculum = $request->curriculum_path;
        $propuesta->requisitos_alumnos = $request->requisitos_alumnos;
        $propuesta->duracion_horas = $request->duracion_horas;
        $propuesta->exclusividad = $request->exclusividad;
        $propuesta->idioma = $request->idioma;
        $propuesta->cupo_maximo = $request->cupo_maximo;
        $propuesta->cupo_minimo = $request->cupo_minimo;
        $propuesta->fecha_inicio = $request->fecha_inicio;
        $propuesta->fecha_final = $request->fecha_final;

        $propuesta->save();
    }

    public function show($id)
    {
        return view('admin.propuestas.show', ['propuesta' => Propuesta::findOrFail($id)]);
    }

    public function edit($id)
    {
        $propuesta = Propuesta::find($id);
        return view('admin.propuestas.edit', compact('propuesta', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|required',
            'correo' => 'string|required',
            'departamento' => 'string|required',
            'division' => 'string|required',
            'contenido' => 'string|required',
            'contenido_sintetico' => 'string|required',
            'modulos' => 'string|required',
            'evaluacion' => 'string|required',
            'documentacion' => 'string|required',
            'objetivo_general' => 'string|required',
            'objetivo_especifico' => 'string|required',
            'utilidad' => 'string|required',
            'experiencia' => 'string|required',
            'financiamiento' => 'string|required',
            'perfil_instructor' => 'string|required',
            'curriculum_sintetico' => 'string|required',
            'operacion_curso' => 'string|required',
            'unidad' => 'string|required',
            'infraestructura' => 'string|required',
            'curriculum' => 'file|required',
            'curriculum_path' => 'string|required',
            'requisitos_alumnos' => 'string|required',
            'duracion_horas' => 'numeric|required|min:0',
            'cupo_minimo' => 'numeric|required|min:0',
            'cupo_maximo' => 'numeric|required|min:0',
            //'fecha_inicio' => 'string|required',
            //'fecha_final' => 'string|required',
            'tipo_curso' => [
                'required',
                Rule::in(['Obligatoria', 'Optativa']),
            ],
            'exclusividad' => [
                'required',
                Rule::in(['Abierto', 'Exclusivo']),
            ],
            'idioma' => [
                'required',
                Rule::in(['Español', 'Inglés']),
            ],
        ]);

        $propuesta = Propuesta::find($id);

        $propuesta->nombre = $request->nombre;
        $propuesta->correo_instructor = $request->correo;
        $propuesta->departamento = $request->departamento;
        $propuesta->division = $request->division;
        $propuesta->tipo_curso = $request->tipo_curso;
        $propuesta->contenido = $request->contenido;
        $propuesta->contenido_sintetico = $request->contenido_sintetico;
        $propuesta->modulos = $request->modulos;
        $propuesta->evaluacion = $request->evaluacion;
        $propuesta->documentacion = $request->documentacion;
        $propuesta->financiamiento = $request->financiamiento;
        $propuesta->objetivo_general = $request->objetivo_general;
        $propuesta->objetivo_especifico = $request->objetivo_especifico;
        $propuesta->utilidad = $request->utilidad;
        $propuesta->experiencia_intructor = $request->experiencia_intructor;
        $propuesta->curriculum = $request->curriculum_path;
        $propuesta->requisitos_alumnos = $request->requisitos_alumnos;
        $propuesta->duracion_horas = $request->duracion_horas;
        $propuesta->exclusividad = $request->exclusividad;
        $propuesta->idioma = $request->idioma;
        $propuesta->cupo_maximo = $request->cupo_maximo;
        $propuesta->cupo_minimo = $request->cupo_minimo;
        $propuesta->fecha_inicio = $request->fecha_inicio;
        $propuesta->fecha_final = $request->fecha_final;

        $propuesta->save();
    }

    public function destroy($id)
    {
        $propuesta = Propuesta::find($id);
        $propuesta->delete();
        return redirect()->action('PropuestaController@index');
    }
}
