<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <title>IGC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--  Para el menu -->
        <link rel="stylesheet" href="css/3.3.5booststrap.min.css">
        <link rel="stylesheet" href="css/3.1.1bootstrap.min.css">
        <link rel="stylesheet" href="css/4.1.0font-awesome.min.css">
        <link rel="icon" type="image/png" href="img/icono.png" />
        <!-- Para las tablas -->
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading" id="0" >
                             <h1 class="text-primary"> <img alt="center" src="img/logoflor.jpg" />Interfaz gráfica para consultas SPARQL </h1>     
                    </div>
                </div>
                <!-- Para hacer los prefijos -->
                <div class="col-md-12"> <!-- para colocar el boton al lado -->
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-paperclip"></i>
                                Prefijos
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive">
                                    <div class="form-inline">
                                        <div class="form-group has-feedback">
                                            <label class="control-label" for="search"></label>
                                            <input type="text" class="form-control" id="searchselectPrefijos" value="" onkeyup="busquedaSPrefijos2()" placeholder="buscar..." data-toggle="tooltip" data-placement="right" title="Filtra el contenido de la lista de los prefijos."/>
                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <select class="form-control" type="text" onchange="busquedaSPrefijos()" id="selectPrefijos" data-toggle="tooltip" data-placement="top" title="Filtra el contenido de Class y Property.">
                                            <option value="Todo">Todo &#60; &#62;</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div><!---->
                        </div> <!-- fin´prefijos -->
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <i class="fa fa-gear"></i>
                                      FROM <img src="icon/1.png" width="30" height="30" />
                                </div>
                                <div class="panel-body">
                                    <div class="alert alert-warning" style="overflow-x: scroll;">
                                        <div id="idenpoint" value=""  data-toggle="tooltip" data-placement="bottom" title="Endpoint conectado."></div>
                                        <div id="idgrafo" value=""  data-toggle="tooltip" data-placement="bottom" title="Grafo conectado."></div>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="abrirmodal()" data-toggle="modal" data-target="#Modal1"><b data-toggle="tooltip" data-placement="bottom" title="Información de conexión a la base de datos, esta información puede cambiar.">Conexión</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- inicio consulta y Select -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                
                                <!-- Mostar la consulta-->    
                                    <div  class="col-md-5">
                                        <div  class="col-md-12" >
                                            <div class="container-fluid"> 
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading" data-toggle="tooltip" data-placement="top" title="Texto de la consulta." >
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                        Consulta como texto
                                                    </div>
                                                    <div class="panel-body">
                                                        <div id="Consulta" style="font-family:courier;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin Mostar la consulta-->    
                                <!-- Select -->
                                   
                                    <div  class="col-md-7">
                                        <div  class="col-md-12" >
                                            <div class="container-fluid"> 
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading" data-toggle="tooltip" data-placement="top" title="Cuerpo del select de la consulta.">
                                                        <i class="glyphicon glyphicon-pushpin"></i>
                                                       SELECT  <img src="icon/2.png" width="30" height="30" />
                                                    </div>
                                                    <div class="panel-body" >
                                                        <div class="col-lg-12">
                                                            <div class="from-group">
                                                                <div id="selectbody" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin Select -->
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                    </div>
                    <!-- Fin consulta y select -->
                    <!-- Inicio Esquema -->
                    <div  class="col-lg-4 pull-left">
                        
                        <div class="container-fluid" >
                        <!-- Panel para la configuracio -->
                            <!-- Panel para el diseño -->
                        <div class="panel panel-primary">
                            <div class="panel-heading"  data-toggle="tooltip" data-placement="bottom" title="Información de la base de datos.">
                                <i class="fa fa-paperclip"></i>
                                Esquema 
                            </div>

                            <div class="panel-body" >
                                <div class="col-lg-12"><!---->
                                    <div class="panel-heading">
                                            
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab1primary" data-toggle="tab"><p data-toggle="tooltip" data-placement="bottom" title="Lista de Class">Class</p></a></li>
                                                <li><a href="#tab2primary" data-toggle="tab"><p data-toggle="tooltip" data-placement="bottom" title="Lista de property">Property</p></a></li>
                                                
                                            </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1primary">
                                                <div class="table-responsive" style="height:435px; mix-height: 10 ;overflow-y: scroll;">
                                                    <div class="form-group has-feedback" >
                                                        <label class="control-label" for="search"></label>
                                                        <input type="text" class="form-control" id="searchclass" value="" onkeyup="busquedaClass()" placeholder="buscar..."/>
                                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                                    </div>
                                                    <table  id="tablaclases" class="table">
                                                      <!-- Aplicadas en las celdas (<td> o <th>) -->
                                                        <tr>
                                                        </tr>
                                                    </table>
                                                </div>  
                                            </div>
                                            <div class="tab-pane fade" id="tab2primary">
                                                <div class="table-responsive" style="height:435px; max-height: 10 ;overflow-y: scroll;">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label" for="search1"></label>
                                                        <input type="text" class="form-control" id="sproperty" value="" onkeyup="busquedaProperty()" placeholder="buscar..."/>
                                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                                    </div>
                                                    <table class="order-table table" id="tablaproperty">
                                                      <!-- Aplicadas en las celdas (<td> o <th>) -->
                                                        <tr>
                                                        </tr>
                                                    </table>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!---->
                        </div>
                    </div>       
                </div>
                    <!-- Fin Esquema -->
                    
<?php 
    $algo = 1;
?>
                <!-- Panel Where-->
                <div  class="col-xs-8 pull-left right" style="width:740px; height:630px;">
                    <div class="container-fluid" > 
                        <div class="panel panel-primary" >
                            <div class="panel-heading"  data-toggle="tooltip" data-placement="bottom" title="Para confecionar la consulta.">
                                <i class="glyphicon glyphicon-pushpin"></i>
                                WHERE <img src="icon/3.png" width="30" height="30" /> 
                            </div>
                            <div class="panel-body" style="width: 670px; height: 560px; overflow-x: scroll; overflow-y: scroll;">
                                <div class="col-lg-12">
                                    <div class="btn-group" id="<?php echo $algo; ?>" ><!--  -->
                                        <select class="selectpicker" id="<?php echo $algo; ?>s" data-style="btn-primary"  onchange="funcionextra(<?php echo $algo; ?>)">
                                            <option hidden>OPCIONES</option>
                                            <optgroup label="GRAPH PATTERN">
                                            <option value="Optional" >OPTIONAL</option>
                                            <option value="Union" >UNION</option>
                                            <option value="And" >AND</option>
                                            <option value="Filter" >FILTER</option>
                                            </optgroup>
                                            <optgroup label="TRIPLE PATTERN">
                                            <option value="V-C-V">V-C-V</option>
                                            <option value="C-C-V">C-C-V</option>
                                            <option value="V-C-C">V-C-C</option>
                                            <option value="V-V-C">V-V-C</option>
                                            <option value="C-V-V">C-V-V</option>
                                            <option value="C-V-C">C-V-C</option>
                                            <option value="V-V-V">V-V-V</option>
                                            <option value="C-C-C">C-C-C</option>
                                             </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div>Recuerde que V representa una variable y C representa una constante o literal.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Panel Where-->
                <br>
                <!-- Inicio boton -->
                <div class="container">
                    <div class="btn-group" >
                        <div class="from-group">
                            <button type="button" class="btn btn-primary" id="boton" onclick="GetCampos()" data-toggle="tooltip" data-placement="bottom" title="Ejecuta la consulta creada."><b>Ejecutar consulta <img src="icon/4.png" width="30" height="30" /></b></button>
                            <button type="button" class="btn btn-primary" id="boton" onclick="Limpiar()" data-toggle="tooltip" data-placement="bottom" title="Limpiar todo."><b>Limpiar <img src="icon/5.png" width="30" height="30" /></b></button>
                            <!-- onclick="Descargar()"-->
                            <button type="button" class="btn btn-primary" id="boton" data-toggle="modal" data-target="#Modaldescarga" data-toggle="tooltip" data-placement="bottom" title="Descargar respuesta." ><b>Descargar <img src="icon/excel.png" width="30" height="30" /></b></button>
                        </div>
                    </div>
                </div>
                <!-- Fin Boton --> 
                <!--descargar-->  
                <div id ="descargar"></div>
            </div>
        </div>
            <div  class="col-xs-12" >            
                <div class="container-fluid">
                    <div class="row">
                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Mostrar el error-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" data-toggle="tooltip" data-placement="top" title="Mensajes producidos." >
                                        <i class="glyphicon glyphicon-alert"></i>
                                        Mensajes
                                    </div>
                                    <div class="panel-body">
                                        <div  class="form-group has-error" id="Error"></div>
                                    </div>
                                </div>                                
                                <!-- Cargar la  respuesta  glyphicon glyphicon-list -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" data-toggle="tooltip" data-placement="top" title="Respuesta de la consulta." >
                                        <i class="glyphicon glyphicon-list"></i>
                                        Resultado de la Consulta
                                    </div>
                                    <div class="panel-body">
                                        <div id="principal1"></div> 
                                        <div class="container" style="overflow:auto">
                                            <div class="table-responsive ">
                                                <table class="table table-hover"  id="principal">
                                                </table>
                                            </div>
                                            <div id="next">
                                                <ul class="pager">
                                                  <li class="previous"><a id="idprevious" onclick="previous()">&larr; Anterior</a></li>
                                                  <li class="next"><a id="isnext" onclick="next()"> Siguiente &rarr;</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal1">
            </div>
           <!-- div conteiner -->
                <!-- Modal de bienvenida -->
                  <div class="modal fade" id="myModal" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b style="color:#428bca;">Bienvenido</b></h4>
                        </div>
                        <div class="modal-body">
                         <p> <b>IGC es una interfaz gráfica para el diseño y ejecución de consultas SPARQL.<br>
IGC se divide en 8 bloques y su uso se resume en 7 simples paso:</b><br><br>
1. Use el bloque "From" para especificar el SPARQL Endpoint a consultar.<br>
2. Observe los bloques "Prefijos" y "Esquema" para entender la estructura del grafo RDF a consultar.<br> 
3. Use el bloque “Select” para definir el resultado de la consulta.<br>
4. Use las funciones del bloque "Where" para construir un SPARQL graph pattern (puede hacer drag-and-drop desde el bloque "Esquema"). <br>
5. Ejecute la consulta presionando el botón "Ejecutar consulta".<br>
6. Observe la salida en el bloque "Resultado de la consulta".<br>
7. Si desea ingresar una nueva consulta, entonces presione el botón "Limpiar".<br></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" onclick="cargarConex()"  data-toggle="modal" data-target="#myModal2" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div> <!--  Fin molad de bienvenida -->
                  <!-- Modal de bienvenida 2 -->
                  <div class="modal fade" id="myModal2" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-toggle="modal"  data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b style="color:#428bca;">Bienvenido</b></h4>
                        </div>
                        <div class="modal-body">
                          <p><b>Pasos a seguir para realizar la conexión:</b><br><br> 1.- Ingrese a conexión la URL del SPARQL Endpoint que contiene el grafo RDF. <br> 2.- Presione el botón "Explorar".  <br> 3.- Seleccione el grafo RDF a consultar. <br> 4.- Presione el botón "Cargar".<br></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" onclick="cargarConex()"  data-toggle="modal" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div> <!--  Fin molad de bienvenida 2 -->
                <div class="modal fade bs-example-modal-sm" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <i class="fa fa-gear"></i>
                                    Selección de grafo RDF
                                <button type="button" class="close" onclick="cancelardatos()" data-dismiss="modal" aria-hidden="true"> &times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <form role="form">
                                        <!-- <div class="form-group"> 
                                            <label>Ip Server</label>
                                            <input class="form-control" id="ipServer" value="http://dbpedia.org/sparql">
                                        </div>
                                        <div class="form-group">
                                            <label>Grafo</label>
                                            <input class="form-control" id="grafo" value="http://dbpedia.org">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Endpoint</label>
                                            <input class="form-control" id="endPoint" value="">
                                        </div>
                                    </form>
                                    <!-- boton para busqueda de grafo -->
                                    <div class="modal-footer">
                                        <button data-toggle="tooltip" data-placement="top" title="Buscar grafos en la base de datos." type="button" class="btn btn-primary" onclick="buscog()">Explorar</button>
                                    </div>
                                    <b>Grafos RDF</b>
                                        <div class="table-responsive" style="max-height:200px; max-height:5;overflow-y:auto;" >
                                            <table class="table table-hover"  id="cargagrafo" >
                                            </table>
                                        </div>
                                        <div id="mensajemodal"></div>
                                    </div>
                            </div> <!-- Fin cuerpo modal -->
                                <p ALIGN=center>.</p>
                            
                            <div class="modal-footer">
                                <button data-toggle="tooltip" data-placement="top" title="Al guardar los datos, se actualizara la información de las Class, Property y Prefijos." type="button" class="btn btn-primary" onclick="cargardatos()" data-dismiss="modal">Cargar</button>
                                <button type="button" class="btn btn-primary" onclick="cancelardatos()" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Modal -->
                <!-- Modal de descarga -->
                <div class="modal fade bs-example-modal-sm" id="Modaldescarga" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <i class="fa fa-gear"></i>
                                    Buscar Modal
                                <button type="button" class="close" onclick="cancelardatos()" data-dismiss="modal" aria-hidden="true"> &times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label >Limit</label>
                                        <input type="number" class="form-control" id="blimit" name="blimit" min="1" step="1" value="10">
                                    </div>
                                    <div class="form-group">
                                        <label >Offset</label>
                                        <input type="number" class="form-control" id="boffset" name="boffset" min="1" step="1" value= "1">
                                    </div>
                                    
                            </div> <!-- Fin cuerpo modal -->
                                <p ALIGN=center>.</p>
                            
                            <div class="modal-footer">
                                <button data-toggle="tooltip" data-placement="top" title="Al guardar los datos, se actualizara la información de las Class, Property y Prefijos." type="button" class="btn btn-primary" onclick="Descargar()" data-dismiss="modal">Descargar</button>
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
        


        <!-- Archivos Js -->
        

        <script src="jquery/1.11.1jquery.min.js"></script>
        <script type='text/javascript' src='js/CargarBoton.js'></script>
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- <script src="js/jquery.justifiedgallery.min.js" type="text/javascript"></script> -->
        <script src="js/tinymce.min.js" type="text/javascript"></script>
        <script src="js/jquery.tinymce.min.js" type="text/javascript"></script>
        <script src="js/devoops.js" type="text/javascript"></script>        
        <script type="text/javascript" src="js/bootbox.js" ></script>
        <script type="text/javascript" src="js/bootbox.min.js" ></script>
        <script src="jquery/1.9.jquery.min.js"></script>

        <script src="jquery/1.7jquery.min.js"></script>
        <script src="jquery/1.8jquery-ui.min.js"></script>
        <link rel="stylesheet" href="css/1.8jquery-ui.css" type="text/css" /> 

        <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
        <script src="js/1.12.0jquery.min.js"></script>
        <script src="js/3.3.6bootstrap.min.js"></script>
    </body>
</html>