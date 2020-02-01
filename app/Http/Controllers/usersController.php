<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
class usersController extends Controller
{
    public function index()
    {
        return user::all();
    }
 
    public function show($id)
    {
        return user::find($id);
    }

    public function store(Request $request)
    {
        return user::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = user::findOrFail($id);
        $user->update($request->all());
        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return 204;
    }
}
