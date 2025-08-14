<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController
{
    public function index()
    {
        return view('posts.index'); // Vista para listar posts
    }

    public function create()
    {
        return redirect('/'); // Redirige a la página de inicio
    }

    public function edit(string $id)
    {
        return redirect('/'); // Redirige a la página de inicio
    }

    public function show(string $id)
    {
        return view('posts.show', ['id' => $id]); // Vista para mostrar un post
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
