<?php

function searchPromoted($promoted, $db,  &$total){
      
    $table = 'promotions';
    $where = "WHERE promoted = '$promoted'";
    $columns = '*';
    $promoted = $db->read($table, $columns, $where);//aqui consulta del tipo SELECT {$clmns} FROM {$tbl} {$where} "
    $number = count($promoted);
        if($number > 0) {   
          
          $total += $number;      
             for($i = 0; $i< $number; $i++){
               searchPromoted($promoted[$i]['promoted'], $db, $total);
             }
        }
    
    return $total;
         
    }

//ejemplo de uso

  $bd = new conexion();//asi conecto con BBDD usa tu conexion
  $person = '42003';
  $total = 0;
  $number = searchPromoted($person, $bd, $total);

  if(isset($number)){
    echo "numero personas promovidas por $person es de: $number. ";
  }else{
    echo "numero personas promovidas por $person es de: 0. ";
  }
