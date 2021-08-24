<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }
    public function index()
    {

        $users=User::with('rol')->orderBy('created_at', 'desc')->get();
        return view('dashboard.user.index',
        compact('users')
    
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $user=new User();
        $countries= Country::pluck('id','name');
        // $provinces= Province::all();
        // $cities= City::all();
        return view('dashboard.user.create',
        compact('user','countries')
    
        );
    }
    
    public function provincias($id)
    {
        $provincias=Province::where('country_id',$id)->pluck('id','name');
        // dd($provincias);

        return response()->json($provincias);

    }

    public function ciudades($id)
    {
        $ciudades=City::where('province_id',$id)->pluck('id','name');
        // dd($provincias);

        return response()->json($ciudades);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        // dd($request);

        User::create([
            'name' => $request['name'],
            'rol_id'=> 2,
            'email' => $request['email'],
            'password' => $request['password'],
            'telefono' => $request['telefono'],
            'cedula' => $request['cedula'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'ciudad_id' => $request['city_id'],
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $countries= Country::pluck('id','name');
        
        
        $cities= City::pluck('id','name');
        // $provinces= Province::where('id',$c)->pluck('id','name');
        $provinces= Province::pluck('id','name');
        return view('dashboard.user.show',
        compact('user','countries','provinces','cities')
    
        );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user);
        // $c=City::where('id',$user->ciudad_id)->pluck('province_id');
        // dd($c);
        // $e=Province::where('id',$c)->pluck('country_id');
        // dd($e);
        // $t=Country::where('id',$e)->pluck('id','name');
        // dd($t);
        $countries= Country::pluck('id','name');
        
        
        $cities= City::pluck('id','name');
        // $provinces= Province::where('id',$c)->pluck('id','name');
        $provinces= Province::pluck('id','name');
        return view('dashboard.user.edit',
        compact('user','countries','provinces','cities')
    
        );
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        $user->update([
            'name' => $request['name'],
            // 'rol_id'=>1,//rol admin
            'telefono' => $request['telefono'],
            'ciudad_id' => $request['city_id'],
            'email' => $request['email'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            // 'password' => Hash::make($data['password']),
        ]);
        return $this->index();
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status','Usuario eliminado con exito');
    }
}
