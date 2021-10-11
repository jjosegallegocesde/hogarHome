<?php

namespace App\Controllers;

use App\Models\Modeloproducto;

class Productos extends BaseController{
    
    public function index(){
        return view('registroProductos');
    }

   

    public function registrar(){

        $producto=$this->request->getPost("producto");
        $fotografia=$this->request->getPost("fotografia");
        $precio=$this->request->getPost("precio");
        $descripcion=$this->request->getPost("descripcion");
        $tipo=$this->request->getPost("tipo");

        $datos=array(

            "producto"=>$producto,
            "fotografia"=>$fotografia,
            "precio"=>$precio,
            "descripcion"=>$descripcion,
            "tipo"=>$tipo
        );
    
        if($this->validate('productos')){

            $modelo= new Modeloproducto();

            try{

                $modelo->insert($datos);
                $respuesta=("exito registrando el producto");

                return redirect()->to(site_url('/productos/registro'))->with('mensaje',$respuesta);

            }catch(\Exception $error){

                $respuesta=$error->getMessage();
                return redirect()->to('/productos/registro')->with('mensaje',$respuesta);
            }
        }else{

            $respuesta="Revisa por favor, tienes campos sin llenar";
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$respuesta);

        }

    }


}
