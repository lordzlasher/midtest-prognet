<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::all();
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'movie_name' => 'required',
            'description' => 'required|max:255',
            'year' => 'required|numeric|min:4',
            'duration' => 'required|numeric',
            'country' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        
        if($request->file('poster')) {
            $validatedData['poster'] = $request->file('poster')->store('poster');
        }

        Movies::create($validatedData);
        
        return redirect('/movie')->with('success','Data film berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies = Movies::find($id);
        return view('movie.show', compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movies::find($id);
        return view('movie.edit', compact('movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'movie_name' => 'required',
            'description' => 'required',
            'year' => 'required|numeric|min:4',
            'duration' => 'required|numeric',
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required',
        ]);
          
        if($request->file('poster')) {
            $validatedData['poster'] = $request->file('poster')->store('poster');
        }

        Movies::find($id);

        Movies::where('id',$id)->update($validatedData);
        return redirect('/movie')->with('success','Data film berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Movies::where('id',$id)->delete();
        return redirect('/movie')->with('success','Data film telah dihapus');

        // Movies::destroy($movie->id);
        // return redirect('/movie')->with('succes', 'Data film berhasil dihapus!');
    }
}
