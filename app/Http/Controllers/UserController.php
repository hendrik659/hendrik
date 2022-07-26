<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::orderby('created_at','desc')->get();
        return view ('user.index')->with('user',$user);  
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ,
        ]);

       
            return redirect('user');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= user::find($id);
        return view('user.edit')->with('user',$user);
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
        if($request->password<>''){
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\password::defaults()],
            'role' => ['required'],
        ]);

        try{
            $user = user::find($id);
            $user->update([
                'name' =>  $request->nama,
                'email' => $request->email,
                'role' => $request->role,
            ]);

        }   catch(\exception $e){
            return redirect()->back()->with('wrong', 'data gagal disimpan')->withinput();
        }

        }else{
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'role' => ['required']
            ]);

        try{
            $user = user::find($id);
            $user->update([
                'name' =>  $request->nama,
                'email' => $request ->email,
                'password' => hash::make($request->password),
                'role' => $request ->role,
            ]);
    
            }   catch(\exception $e){
                return redirect()->back()->with('wrong', 'data gagal disimpan')->withinput();
            }
        }
        return redirect('user')->with('message', 'user berhsil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        try{
            $user->delete();
        } catch(\exception $e){
            return redirect()->back()->with('wrong','data gagal disimpan');
        }
        return redirect('user')->with('message', 'user berhasil dihapus');
    }
}
