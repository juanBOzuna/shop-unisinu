<html lang="en">

<head>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/forms.css">
    <link rel="stylesheet" href="styles/scroll.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo Web</title>
</head>

<body>
    
    <?php 
  session_start();
//   session_destroy()
  $shop = array();
  if(!isset($_SESSION["newsession"])){
    $_SESSION["newsession"]=$shop;
  }

  if( isset($_REQUEST['isResp'] )){
    $DataSnapshot =[
        'name'=>$_REQUEST['name'],
        'ammount'=> $_REQUEST['ammount'] ,
        'price'=>$_REQUEST['price'] ,
        'iva'=> $_REQUEST['iva'],
        'discount' =>$_REQUEST['discount'] ,
        'subtotal'=>$_REQUEST['subtotal'] ,
        'total'=>  $_REQUEST['total'],
    ];

    array_push($_SESSION["newsession"], $DataSnapshot);
  }
    
    ?>


    <body>
        <center>
            <div class="row">

                <div class="form-student">
                    
                    <form action="back.php" method="post" >
                           <table>
                                <tr><td><h4>DATOS DEL PRODUCTO </h4></td></tr>

                                <tr>
                                    <td> <input class="digit-calc" type="text" name="name" placeholder="Nombre del producto" required></td>
                                </tr>

                                <tr>
                                    <td> <input class="digit-calc" type="money" name="price" placeholder="Precio $" step="any"required></td>
                                </tr>

                                <tr>
                                    <td><input class="digit-calc" type="number" name="ammount" placeholder="Cantidad" required></td>
                                </tr>

                                <tr>
                                    <td> <input class="digit-calc" type="number" name="iva" placeholder="Iva %" step="any"required></td>
                                </tr>

                                <tr>
                                    <td><input class="digit-calc" type="number" name="discount" placeholder="Descuento %" step="any"required></td>
                                </tr>

                                <tr>
                                    <th id="text-descript" ><p >Formulario hecho por <a href="https://github.com/juanBOzuna" target="_blank">Juan Barraza</a></p></th>
                                </tr>
                                <tr  >
                                    <th >
                                    <input class="send-data" type="submit" name="" id="">
                                    </th>
                                </tr>
                            </table>
                          
                    </form>
                </div>

                <div class="form-result">

                   

                   <?php

                   
                   if(!isset($_REQUEST['isResp'])){

                       echo ' <table>
                       <tr><td><h4>SHOP </h4></td></tr>
   
                       <tr>
                       <img id="img-shop" src="assets\shop-vector.png" alt="">
                       </tr>
                       </table>';
                   }else{
                    $data = "";
                    $int =0;
                    foreach($_SESSION["newsession"] as $dataSnapshot){
                    $int++;
                       $data.= ' <tr>
                     
                       <th scope="row">'.$int.'</th>
                       <td>'.$dataSnapshot['name'].'</td>
                       <td>'.$dataSnapshot['price'].'</td>
                       <td>'.$dataSnapshot['ammount'].'</td>
                       <td>'.$dataSnapshot['subtotal'].'</td>
                       <td>'.$dataSnapshot['iva'].'</td>
                       <td>'.$dataSnapshot['discount'].'</td>
                       <td>'.$dataSnapshot['total'].'</td>
                       </tr>';
                    }
                   
                   
                    
                    echo '
                    <table>
                       <tr>
                       <td><h4>SHOP </h4> 
                       </td></tr>
                       </table>


                    <table class="table" id="table-fact" >
                    <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">precio</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">iva</th>
                    <th scope="col">descuento</th>
                     <th scope="col">total</th>
                    </tr>
                </thead>
                <tbody>
                '.$data.'
                </tbody>
                </table>';
                   }
                   
                   ?>
                   

                   
                    

                </div>

            </div>
        </center>
    </body>
</body>

</html>