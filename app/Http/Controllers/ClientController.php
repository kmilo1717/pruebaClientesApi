<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class ClientController extends Controller
{

    public function __construct()
    {

    }
    
    public function crear(){
        return view('cliente.crear');
    }

    public function salvar(Request $request){
        
        try {
        $data= $request->only('name', 'surname', 'address', 'population', 'telephone', 'email');
        $cliente = new cliente();
        $cliente->nombre= $data['name'];
        $cliente->apellidos= $data['surname'];
        $cliente->direccion = $data['address'];
        $cliente->poblacion = $data['population'];
        $cliente->telefono = $data['telephone'];
        $cliente->email = $data['email'];
        $cliente->save();
        }catch (\Exception $e){
            return redirect()->route('home')
            ->with([
                'message' => 'Error al registrar el cliente'
            ]);;
        }
        return redirect()->route('home')
        ->with([
            'message' => 'cliente registrado correctamente'
        ]);;

    }

    public function find(Request $request){
        $buscar= $request->input('buscar');
        $clientese = cliente:: where('user', auth()->id())->orderBy('created_at','desc')
                            ->where(function($p) use($buscar){
                                $p->where('feature', 'LIKE', "%$buscar%")
                                ->orWhere('points', 'LIKE', "%$buscar%")
                                ->orWhere('status', 'LIKE', "%$buscar%");
                            })->get();

        return view('home-search', ['clientesfind'=> $clientese]);
    }

    public function gestion($id){

        $cliente = cliente::find($id);
        return view('cliente.gestion', ['cliente'=> $cliente]);
    }

    public function update(Request $request){
        try {
            $data= $request->only('id','name', 'surname', 'address', 'population', 'telephone', 'email');
            $cliente = cliente::find($data['id']);
            $cliente->nombre= $data['name'];
            $cliente->apellidos= $data['surname'];
            $cliente->direccion = $data['address'];
            $cliente->poblacion = $data['population'];
            $cliente->telefono = $data['telephone'];
            $cliente->email = $data['email'];
            $cliente->save();
            }catch (\Exception $e){
                return redirect()->route('home')
                ->with([
                    'message' => 'Error al actualizar el cliente'
                ]);;
            }
            return redirect()->route('home')
            ->with([
                'message' => 'cliente actualizado correctamente'
            ]);;
    }

    public function delete($id){
        $cliente = cliente::find($id);
        $cliente->delete();

        return redirect()->route('home')
        ->with([
            'message' => 'cliente eliminado correctamente'
        ]);;
    }

}
