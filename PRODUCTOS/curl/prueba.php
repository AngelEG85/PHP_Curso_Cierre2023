<?php

Class API{

    static public function ListarTodos(){

        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL,'http://localhost/apirest_php/api/productos');
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    
        $response = curl_exec($ch);
    
        if(curl_errno($ch)) echo curl_errno($ch);
        else $decoded = json_decode($response,true);
        var_dump($decoded);
    
        curl_close($ch);
    
    }

    public function ListarxID($id){

        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL,'http://localhost/apirest_php/api/productos'. $id .'');
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    
        $response = curl_exec($ch);
    
        if(curl_errno($ch)) echo curl_errno($ch);
        else $decoded = json_decode($response,true);
        var_dump($decoded);
        curl_close($ch);
    
    }

    public function Agregar($nombre,$precio,$cantidad){
        $ch = curl_init();

        $Array = [
            'nombre'=> $nombre,
            'precio'=> $precio,
            'cantidad'=> $cantidad
        ];

        $data =json_encode($Array);

        curl_setopt($ch, CURLOPT_URL,'http://localhost/apirest_php/api/');
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);

        if(curl_errno($ch)) echo curl_errno($ch);
        else $decoded = json_decode($response,true);

        foreach($decoded as $key => $value){

            echo "$key :$value <br>" ;
        }

        curl_close($ch);

    }

    public function Editar($id,$nombre,$precio,$cantidad){

    $ch = curl_init();

    $Array = [
        "id"=>10,
        "nombre"=>"Monitor 32",
        "precio"=>35000,
        "cantidad"=>5
    ];

    $data =json_encode($Array);

    curl_setopt($ch, CURLOPT_URL,'http://localhost/apirest_php/api/');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

    $response = curl_exec($ch);

    if(curl_errno($ch)) echo curl_errno($ch);
    else $decoded = json_decode($response,true);

    foreach($decoded as $key => $value){

        echo "$key :$value <br>" ;
    }

    curl_close($ch);

    
    }

    public function Delete ( $id ){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,'http://localhost/apirest_php/api/productos/'. $id .'');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);

        if(curl_errno($ch)) echo curl_errno($ch);
        else $decoded = json_decode($response,true);

        echo 'Eliminado';
            
        curl_close($ch);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="container caja">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody id="contenido">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  
</body>

<script src="prueba.js"></script>
</html>




