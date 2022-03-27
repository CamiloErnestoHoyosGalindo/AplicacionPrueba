<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function reset(){
        \Artisan::call('migrate:refresh',['--seed' => ' ']);
        return back();
    }

    //Funciones administrar ciudades
    public function administrar(){
        
        return view('/home');
    }

    public function adminInicio(){

        $listas = \App\Models\City::paginate(4);
        
        return view('/cityAdmin', compact('listas'));
    }

    public function crearCiudad(Request $request){
        //return $request->all();

        $request->validate([
            'name' => 'required'
        ]);

        $ciudadNueva = new \App\Models\City;
        $ciudadNueva->name = $request->name;
        $ciudadNueva->save();

        return back()->with('mensaje', 'Ciudad agregada');
    }

    public function editarCiudad($cod){
       
        $ciudad = \App\Models\City::findOrFail($cod);
        return view('citySetting.editar', compact('ciudad'));
    }

    public function actualizarCiudad(Request $request, $cod){

        $ciudadActualizar = \App\Models\City::findOrFail($cod);
        $ciudadActualizar->name = $request->name;

        $ciudadActualizar->save();
        
        $listas = \App\Models\City::all();

        return redirect('/cityAdmin')->with('mensaje', 'Ciudad actualizada exitosamente');
        
    }

    public function eliminarCiudad($cod){

        $ciudadEliminar = \App\Models\City::findOrFail($cod);
        $ciudadEliminar->delete();
        return back()->with('mensaje', 'Ciudad eliminada exitosamente');
    }

    //Funciones administrar clientes

    public function adminCliente(Request $request){

           
        if($request){
            $consulta = trim($request->get(key: 'search'));
            $listas = \App\Models\Client::where('city', 'LIKE', '%' . $consulta . '%')->paginate(4);

                
            return view('/clientAdmin', ['listas' => $listas, 'search' => $consulta]);
         }

        //$listas = \App\Models\Client::paginate(4);
        //return view('/clientAdmin', compact('listas'));
    }

    public function crearCliente(Request $request){
        //return $request->all();

        $request->validate([
            'name' => 'required'
        ]);

        $clienteNuevo = new \App\Models\Client;
        $clienteNuevo->name = $request->name;
        $clienteNuevo->city = $request->city;

        $clienteNuevo->save();

        return back()->with('mensaje', 'Cliente agregado');
    }

    public function editarCliente($cod){
       
        $cliente = \App\Models\Client::findOrFail($cod);
        return view('clientSetting.editar', compact('cliente'));
    }

    public function actualizarCliente(Request $request, $cod){

        $clienteActualizar = \App\Models\Client::findOrFail($cod);
        $clienteActualizar->city = $request->city;

        $clienteActualizar->save();
        
        $listas = \App\Models\Client::all();

        return redirect('/clientAdmin')->with('mensaje', 'Cliente actualizado exitosamente');
        
    }

    public function eliminarCliente($cod){

        $clienteEliminar = \App\Models\Client::findOrFail($cod);
        $clienteEliminar->delete();
        return back()->with('mensaje', 'Cliente eliminado exitosamente');
    }
}
