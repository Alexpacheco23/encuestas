<?php namespace old;

use mysqli;

class Conexion
{

    public $server = 'localhost';
    public $user = 'root';
    public $password = '';
    public $baseDato = 'encuesta';
    public $mysql;



    function conectar()
    {
        $this->mysql = new mysqli($this->server, $this->user, $this->password, $this->baseDato);

        if ($this->mysql->connect_error) {
            $conn =  new mysqli($this->server, $this->user, $this->password);
            $createDb = "CREATE DATABASE encuesta";
            if (mysqli_query($conn, $createDb)) {
                echo "se creo de manera correcta <br>";
                $create_table = new Conexion;
                if (!$create_table->createTable()) {
                    echo  "las tabla de la base dato se crearon correctamente <br>";
                };
            }
        } else {
            return $this->mysql;
        }
    }

    function createTable()

    {
        $obje = new Conexion;
        $con = $obje->conectar();
        // create table for question and answer

        $pregunta = "CREATE TABLE pregunta(
            id_pregunta INT  AUTO_INCREMENT PRIMARY KEY                     
        
        )";

        $respuesta = "CREATE TABLE respuesta(
            id_respuesta INT  AUTO_INCREMENT PRIMARY KEY,
            respuesta0 VARCHAR(100),
            respuesta1 VARCHAR(100),
            respuesta2 VARCHAR(10),
            respuesta3 VARCHAR(20),
            respuesta4 VARCHAR(20),
            respuesta5 VARCHAR(13),
            respuesta6 VARCHAR(11),
            respuesta7 VARCHAR(20),
            respuesta8 VARCHAR(255),
            respuesta9 VARCHAR(20),
            respuesta10 VARCHAR(20),
            respuesta11 VARCHAR(20),
            respuesta12 VARCHAR(20),
            respuesta13 VARCHAR(20),
            respuesta14 VARCHAR(20),
            respuesta15 VARCHAR(20),
            respuesta16 VARCHAR(20),
            respuesta17 VARCHAR(20),
            respuesta19 VARCHAR(20),
            respuesta20 VARCHAR(20),
            respuesta21 VARCHAR(20),
            respuesta22 VARCHAR(20),
            respuesta23 VARCHAR(20),
            respuesta24 VARCHAR(20),
            respuesta25 VARCHAR(20),
            respuesta26 VARCHAR(20),
            respuesta27 VARCHAR(20),
            respuesta28 VARCHAR(20)            
        )";


        $usuarios = "CREATE TABLE usuarios(
            id_usuarios INT  AUTO_INCREMENT PRIMARY KEY
        )";

        $encuesta = "CREATE TABLE encuesta( id_encuesta INT AUTO_INCREMENT PRIMARY KEY, 
                    id_pregunta INT, CONSTRAINT fk_id_pregunta FOREIGN KEY (id_pregunta)REFERENCES pregunta (id_pregunta),
                    id_respuesta INT,CONSTRAINT fk_id_respuesta FOREIGN KEY (id_respuesta) REFERENCES respuesta (id_respuesta),
                    id_usuarios INT, CONSTRAINT fk_id_usuarios FOREIGN KEY (id_usuarios) REFERENCES usuarios (id_usuarios))";

        $encuesta_array = array($pregunta,$respuesta,$usuarios,$encuesta);

        $i = 0;
        while (count($encuesta_array) > $i) {
            $obje = new Conexion;
            $con = $obje->conectar();
            $result = mysqli_query($con, $encuesta_array[$i]);

            $i++;
        }
    }



    function pregunta()
    {

        $pregunta_array = array(
            "¿Cómo sintió el sismo?",
            "¿Qué sintió?",
            "¿Cuántas personas sintieron el sismo?",
            "¿Por cuanto tiempo sintió el sismo?",
            "Si desea puede agregar aquí información adicional con más exactitud",
            "País",
            "Estado",
            "Localización",
            "¿En dónde se encontraba?",
            "En que situación estaba",
            "¿Los animales se mostraron intranquilos o perturbados?",
            "Observó vibración en cristalería",
            "Objetos colgantes oscilaron de forma",
            "Las puertas de la vivienda oscilaron de forma",
            "Las ventanas de la vivienda oscilaron de forma",
            "¿Se rompieron ventanas?",
            "Efectos en objetos",
            "Efectos en muebles",
            "Se observó balanceo u oscilación de líquidos en recipientes de forma",
            "Se observó derramamiento de líquidos en recipientes",
            "Se observó efectos en campanas",
            "Los árboles o arbustos se estremecieron de forma",
            "Efectos en estanques, lagos o aguas corrientes",
            "Efectos en pozos de agua y manantiales",
            "Hubo caída de friso en viviendas",
            "Se presentaron grietas en las paredes o losas",
            "Se desplomaron parcial o totalmente paredes",
            "Las viviendas en sectores populares o rurales sufrieron daños",
            "Las casas o edificios construidos para resistir sismos sufrieron daños"
        );

        $i = 0;
        while (count($pregunta_array) > $i) {

            $obje = new Conexion;
            $conn = $obje->conectar();
            $sql = "ALTER TABLE pregunta ADD pregunta{$i} varchar(100)DEFAULT '{$pregunta_array[$i]}'UNIQUE";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "no se ingresaron los datos <br>";
                break;
            }
            $i++;
        }
        
    }


    function insertarPregunta()
    {

        $obje = new Conexion;

        $sql = "INSERT INTO pregunta(pregunta0)VALUES (DEFAULT)";
        $result = $obje->conectar()->query($sql);

        if (!$result) {
            echo "error al insertar datos";
        }
    }

    function consultaPreguntas(){
        $obje = new Conexion;
        $sql = "SELECT pregunta0,pregunta1,pregunta2,
        pregunta3,pregunta4, pregunta5,pregunta6,
        pregunta7,pregunta8,pregunta9,pregunta10,
        pregunta11,pregunta12,pregunta13,pregunta14, 
        pregunta15,pregunta16,pregunta17,pregunta18, 
        pregunta19,pregunta20,pregunta21,pregunta22,
        pregunta23,pregunta24,pregunta25,
        pregunta26,pregunta27,pregunta28 FROM pregunta";

        $result= $obje->conectar()->query($sql);

        return $result;
    }

    function ejecutar()
    {

        $ejecutar = new Conexion();
        $ejecutar->conectar();
        $ejecutar->pregunta();
        $ejecutar->insertarPregunta();
    }
}


