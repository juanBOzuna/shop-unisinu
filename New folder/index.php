<html lang="en">

<head>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/forms.css">
    <link rel="stylesheet" href="styles/scroll.css">

  <!-- <script src="js/index.js"></script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo Web</title>
</head>

<body>
    
    <?php 
  session_start();

  function php_func(){
    header('Location: '."index.php/");
    }

  $shop = array();
  if(!isset($_SESSION["newsession"])){
    $_SESSION["newsession"]=$shop;
  }

  if(isset($_REQUEST['isFinish'])){
    session_destroy();
  }

  if( isset($_REQUEST['isResp']) &&  !isset($_REQUEST['isReload'] )){
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
        <center>
            <div class="row">
                <div class="form-student">
                    <form action="back.php" method="POST" >
                           <table>
                                <tr><td><h4>DATOS DEL PRODUCTO </h4></td></tr>
                                <tr>
                                    <td> <input class="digit-calc" type="text" name="name" placeholder="Nombre del producto" required></td>
                                </tr>

                                <tr>
                                    <td> <input class="digit-calc" type="number" name="price" placeholder="Precio $" step="any"required></td>
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
                   if(!isset($_REQUEST['isReload'])){
                    header('Location: '."index.php?isResp=1&isReload=1");
                   }
                   $title = "";
                   $data = "";
                   $int =0;
                   $total=0;
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

                      $total+=doubleval($dataSnapshot['total']);
                   }
                   if(isset($_REQUEST['isFinish']) && sizeof($_SESSION["newsession"])>0){
                    $title="<tr>
                    <td><h4>TOTAL: $ $total</h4> 
                     </td></tr>";
                  }else{
                      $title= "<tr>
                      <td><h4>SHOP By JUAN</h4></tr>";
                  }
                   echo '
                   <table>
                     '. $title.'
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
        <?php 
        if(!isset($_REQUEST['isFinish']) && isset( $_REQUEST['isResp']) ){
          echo '   <button  class="btn-finish" onclick="clickMe()">
          <h4>   Terminar Compra</h4>
          </button >';
          }
        ?>
    <script>
        function clickMe(){
            window.location.replace(window.location.href.replace('&isFinish=1', '') + "&isFinish=1" );
        }     
    </script>
</body>
</html>