<?php

namespace App\Http\Controllers;

use App\Models\Listum;
use Illuminate\Http\Request;

/**
 * Class ListumController
 * @package App\Http\Controllers
 */
class ListumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Listum::paginate();

        return view('listum.index', compact('lista'))
            ->with('i', (request()->input('page', 1) - 1) * $lista->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listum = new Listum();
        return view('listum.create', compact('listum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Listum::$rules);

        $listum = Listum::create($request->all());

        $request->validate([
            'nombre' => 'required|string|max:20|alpha',
            'apellido' => 'required|string|max:20|alpha',
            'genero' => 'required|string',
            'fecha' => 'required|date',
            'telefono' => 'required|integer|max:99999999',
            'correo' => 'required',
        ]);

        return redirect()->route('lista.index')
            ->with('success', 'Estudiante ingresado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listum = Listum::find($id);

        return view('listum.show', compact('listum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listum = Listum::find($id);

        return view('listum.edit', compact('listum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Listum $listum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listum $listum)
    {
        request()->validate(Listum::$rules);

        $request->validate([
            'nombre' => 'required|string|max:20|alpha',
            'apellido' => 'required|string|max:20|alpha',
            'genero' => 'required|string',
            'fecha' => 'required|date',
            'telefono' => 'required|integer|max:99999999',
            'correo' => 'required',
        ]);

        $listum->update($request->all());

        return redirect()->route('lista.index')
            ->with('success', 'Estudianto actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $listum = Listum::find($id)->delete();

        return redirect()->route('lista.index')
            ->with('success', 'Estudiante eliminado correctamente');
    }
}
