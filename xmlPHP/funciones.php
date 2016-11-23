<?php

if (isset($_POST['action'])) {
    $obj = new funciones();
    $action = $_POST['action'];
    switch ($action) {
        case 'crearxml' : $return = $obj->crearxml();
            break;
        default : $return = $obj->defecto();
            break;
    }
    echo json_encode($return);
}

class funciones {

    function crearxml() {
        $directorio = opendir("../log/");
        $consultas = [];
        $dirIpServer = [];
        $grafo = [];
        $archivos = [];
        $suma = Array('AND' => 0, 'OPTIONAL' => 0, 'UNION' => 0, 'FILTER' => 0);
        while ($archivo = readdir($directorio)) {
            if (strpos($archivo, '.xml')) {
                $xml = simplexml_load_file("../log/" . $archivo);
                $elementos = json_encode($xml);
                $xml = $this->xml2array($xml);
                $cantidadConsultas = count($xml);
                if ($cantidadConsultas > 1) {
                    $archivos[] = Array('nombre' => $archivo, 'nconsultas' => $cantidadConsultas - 1);
                    foreach ($xml as $key => $value) {
                        if ($key != 'consulta0') {
                            $this->contarConsultaElemento($value["dirIpServer"], 'dirIpServer', $dirIpServer);
                            $this->contarConsultaElemento($value["grafo"], 'grafo', $grafo);
                            $tmp['totales'] = $this->contar($value['query']);
                            $tmp['datos'] = $value;
                            $this->sumar($tmp['totales'], $suma);
                            $consultas[] = $tmp;
                        }
                    }
                }
            }
        }
        $datos['consultas'] = $consultas;
        $datos['dirIpServer'] = $dirIpServer;
        $datos['grafo'] = $grafo;
        $datos['totales'] = $suma;
        $datos['archivos'] = $archivos;
        return $datos;
    }

    function defecto() {
        return 'sin funcion llamada "data{"action:funcion"}"';
    }

    function contar($consulta) {
        $total['AND'] = $this->contarPalabra($consulta, ' . ');
        $total['OPTIONAL'] = $this->contarPalabra($consulta, 'OPTIONAL');
        $total['UNION'] = $this->contarPalabra($consulta, 'UNION');
        $total['FILTER'] = $this->contarPalabra($consulta, 'FILTER');
        return $total;
    }

    function sumar($elemento, &$total) {
        foreach ($elemento as $key => $value) {
            $total[$key]+=$value;
        }
    }

    function contarConsultaElemento($valor, $nombre, &$elementos) {
        if (!$this->in_array_r($valor, $elementos)) {
            $elementos[] = Array($nombre => $valor, 'consultas' => 1);
        } else {
            foreach ($elementos as $elem => $value) {
                if ($value[$nombre] == $valor) {
                    $elementos[$elem]['consultas'] ++;
                }
            }
        }
    }

    function contarPalabra($consulta, $palabra) {
        return substr_count($consulta, $palabra);
    }

    function xml2array($xmlObject) {
        $out = array();
        foreach ((array) $xmlObject as $index => $node)
            $out[$index] = ( is_object($node) ) ? $this->xml2array($node) : $node;
        return $out;
    }

    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }
}
