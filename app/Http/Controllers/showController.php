<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class showController extends Controller
{
    public function about(){
        return view('about');
    }
    //////////////////////////
    public function index(){
        $episodes= \App\episode::orderBy('id', 'desc')->get();
        if(session()->get('infouser')){
            $likes= \App\like::where('iduser','=',session()->get('infouser')->id)->get();
            return view('index', compact('episodes', 'likes'));
        }
        else{
            return view('index', compact('episodes')); 
        }
    }
    //////////////////////////
    public function tvshows(){
        $episodes= \App\Seriestv::inRandomOrder()->limit(5)->get();
        if(session()->get('infouser')){
            $follows= \App\Follow::where('iduser','=',session()->get('infouser')->id)->get();
            return view('tvshows', compact('episodes','follows'));
        }
        else{
            return view('tvshows', compact('episodes'));
        }
    }

    public function episodes($id){
        $nameepisode= \App\Seriestv::find($id);
        $episode= \App\episode::where('seriesID','=', $id)->orderBy('id', 'desc')->get();
        if(session()->get('infouser')){
            $likes= \App\like::where('iduser','=',session()->get('infouser')->id)->get();
            return view('posts.index', ['episode' => $episode, 'nameepisode' => $nameepisode, 'likes' => $likes]);
        }
        else{
            return view('posts.index', ['episode' => $episode, 'nameepisode' => $nameepisode]);
        }
    }
    public function viewepisode($id){
        $episode= \App\episode::find($id);
        return view('posts.view', ['episode' => $episode]);
    }
    public function getsearch(request $request){
        $episodes= \App\Seriestv::where('title','like','%'.$request->search.'%')->limit(5)->get();
        $resultHTML="";
        foreach($episodes as $episode){
            $resultHTML.=' <li><a href="/episodes/'.$episode->id.'">'.$episode->title.'</a></li>';
        }
        return $resultHTML;
    }
    public function reg_user(request $request){
        return \App\user::create([
            'name' => $request->nameuser,
            'email' => $request->emailuser,
            'password' => Hash::make($request->passuser),
            'userimg' => "",
            'rule' => '2'
        ]);
    }
    public function login_user(request $request){
        $loginclike= \App\user::where('email', $request->emailuser)->first();
        if(Hash::check($request->passuser, $loginclike->password)){
            session()->put('infouser',$loginclike);
            return $loginclike;
        }
        else{
            return 0;
        }
    }
    public function logout(){
        session()->put('infouser','');
        return $this->index();
    }
    public function followupdate(request $request){
        //follow_tatus -- id_series_follow
        if($request->follow_tatus == '2'){
            //unfollow
            \App\Follow::where('id', '=', $request->id_series_follow)->delete();
            return $request->id_series_follow;
        }
        elseif($request->follow_tatus == '1'){
             //follow
             \App\Follow::insert(
                ['iduser' => session()->get('infouser')->id, 'idseriestvs' => $request->id_series_follow]
            );
             return $request->id_series_follow;
        }
        else{
            return '0';
        }
        
    }
    ////////////////////////Admin//////////////////////////
    public function admin(){
        if(session()->get('infouser')){
        if(session()->get('infouser')->rule == 1){
            return view('admin');
        }
        }
        else{
            return $this->index();
        }
        
    }
    
}
