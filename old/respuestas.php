<?php namespace old;
use old\Conexion;
require_once 'conexion.php';
// $Object = new Conexion;
//   $Object->ejecutar();

class Encuesta extends Conexion{

  public $respuesta0;
  public $respuesta1;
  public $respuesta2;
  public $respuesta3;
  public $respuesta4;
  public $respuesta5;
  public $respuesta6;
  public $respuesta7;
  public $respuesta8;
  public $respuesta9;
  public $respuesta10;
  public $respuesta12;
  public $respuesta13;
  public $respuesta14;
  public $respuesta15;
  public $respuesta16;
  public $respuesta17;
  public $respuesta18;
  public $respuesta19;
  public $respuesta20;
  public $respuesta21;
  public $respuesta22;
  public $respuesta23;
  public $respuesta24;
  public $respuesta25;
  public $respuesta26;
  public $respuesta27;
  public $respuesta28;

    // function baseDatos(){
    //   $sql = "ALTER TABLE respuesta ADD respuesta{$i} VARCHAR ";

    // }
    
    function encuesta(
      $respuesta0,
      $respuesta1,
      $respuesta2,
      $respuesta3,
      $respuesta4,
      $respuesta5,
      $respuesta6,
      $respuesta7,
      $respuesta8,
      $respuesta9,
      $respuesta10,
      $respuesta12,
      $respuesta13,
      $respuesta14,
      $respuesta15,
      $respuesta16,
      $respuesta17,
      $respuesta18,
      $respuesta19,
      $respuesta20,
      $respuesta21,
      $respuesta22,
      $respuesta23,
      $respuesta24,
      $respuesta25,
      $respuesta26,
      $respuesta27,
      $respuesta28

    )
    {       
      $objec = new Conexion;

      $sql="INSERT INTO respuesta (respuesta1, 
      respuesta2,respuesta3,respuesta4,respuesta5,
      respuesta6,respuesta7,respuesta8,respuesta9, 
      respuesta10,respuesta11,respuesta12,respuesta13,
      respuesta14,respuesta15,respuesta16,respuesta17,
      respuesta18,respuesta19,respuesta20,respuesta21,
      respuesta22,respuesta23,respuesta24,respuesta25,
      respuesta26,respuesta27,respuesta28,respuesta29) VALUES ($respuesta0,
      '$respuesta1','$respuesta2','$respuesta3','$respuesta4','$respuesta5',
      '$respuesta6','$respuesta7','$respuesta8','$respuesta9','$respuesta10',
      '$respuesta12','$respuesta13','$respuesta14','$respuesta15','$respuesta16',
      '$respuesta17','$respuesta18','$respuesta19','$respuesta20','$respuesta21',
      '$respuesta22','$respuesta23','$respuesta24','$respuesta25','$respuesta26',
      '$respuesta27','$respuesta28')";

      $objec->conectar()->query($sql);
        

    }

      
}

$question = new Encuesta;
$question->encuesta();




?>