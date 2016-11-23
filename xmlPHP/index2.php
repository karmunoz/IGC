<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <script src="scripts/jquery.js"></script>
        <script src="scripts/jquery-ui.js"></script>
        <script src="http://code.jquery.com/jquery-1.12.3.js"></script>

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


        <script src="scripts/mijs.js"></script>
        <title></title>
    </head>
    <body>

        <div   > <br><br>Data 1<br><br>
            <table  id="archivo" > </table>
        </div>
        <div> <br><br><br><br>Data 2<br><br>
            <table  id="consultas" > </table>
        </div>
        <div> <br><br><br><br>Data 3<br><br>
            <table  id="dirIpServer" > </table>
        </div>
        <div> <br><br><br>Data 4<br><br>
            <table  id="grafo" > </table>
        </div>
        <div> <br><br><br>Data 5 Totales<br><br>
            <div id="AND"></div>
            <div id="FILTER"></div>
            <div id="OPTIONAL"></div>
            <div id="UNION"></div>
        </div>
        <br><br>
        <div style="width: 100%;">
            <button  id="boton" style="margin: 0 calc( 50% - 30px);" >Actualizar</button>
        </div>
        <br><br>
    </body>
</html>
