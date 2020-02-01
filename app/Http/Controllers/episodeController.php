<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\episode;
class episodeController extends Controller
{
    public function index()
    {
        return episode::all();
    }
 
    public function show($id)
    {
        return episode::find($id);
    }

    public function store(Request $request)
    {
        return episode::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = episode::findOrFail($id);
        $article->update($request->all());
        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = episode::findOrFail($id);
        $article->delete();
        return 204;
    }
}
