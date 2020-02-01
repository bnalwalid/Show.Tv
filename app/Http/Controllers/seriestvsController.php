<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seriestv;
class seriestvsController extends Controller
{
    public function index()
    {
        return Seriestv::all();
    }
 
    public function show($id)
    {
        return Seriestv::find($id);
    }

    public function store(Request $request)
    {
        return Seriestv::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Seriestv::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Seriestv::findOrFail($id);
        $article->delete();

        return 204;
    }
}
