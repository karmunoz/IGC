$(document).ready(function () {
    var objeto = new Objeto();
    objeto.cargar(true);
});
function Objeto() {
    _self = this;
    $('#boton').on('click', function () {
        _self.cargar(false);
    });
    this.cargar = function (actualizar) {
        $.ajax({
            cache: false,
            type: 'post',
            data: {action: 'crearxml'},
            url: '../xmlPHP/funciones.php',
            success: function (json) {
                json = eval("(" + json + ")");
                var archivos = (json.archivos);
                var consultas = (json.consultas);
                var dirIpServer = (json.dirIpServer);
                var grafo = (json.grafo);

                var dataArchivos = new Array();
                var dataConsultas = new Array();
                var dirIpServerData = new Array();
                var grafoData = new Array();
                for (var x in archivos) {
                    dataArchivos.push([archivos[x].nombre, archivos[x].nconsultas]);
                }
                for (var x in consultas) {
                    var xss = consultas[x].datos.query.replace(/</g, "&lt;");
                    xss = xss.replace(/>/g, "&gt;");
                    dataConsultas.push([
                        consultas[x].datos.dirIpServer,
                        consultas[x].datos.endpoint,
                        consultas[x].datos.grafo,
                        xss,
                        consultas[x].totales.AND,
                        consultas[x].totales.FILTER,
                        consultas[x].totales.OPTIONAL,
                        consultas[x].totales.UNION

                    ]);
                }
                for (var x in dirIpServer) {
                    dirIpServerData.push([dirIpServer[x].dirIpServer, dirIpServer[x].consultas]);
                }
                for (var x in grafo) {
                    grafoData.push([grafo[x].grafo, grafo[x].consultas]);
                }
                if (actualizar) {
                    _self.cargarDatatable(dataArchivos, 'archivo');
                    _self.cargarDatatable(dataConsultas, 'consultas');
                    _self.cargarDatatable(dirIpServerData, 'dirIpServer');
                    _self.cargarDatatable(grafoData, 'grafo');
                } else {
                    _self.updatedDatatable(dataArchivos, 'archivo');
                    _self.updatedDatatable(dataConsultas, 'consultas');
                    _self.updatedDatatable(dirIpServerData, 'dirIpServer');
                    _self.updatedDatatable(grafoData, 'grafo');
                }
                $('#AND').html('Total AND: ' + json.totales.AND);
                $('#FILTER').html('Total FILTER: ' + json.totales.FILTER);
                $('#OPTIONAL').html('Total OPTIONAL: ' + json.totales.OPTIONAL);
                $('#UNION').html('Total UNION: ' + json.totales.UNION);

            }
        });
    };
    this.cargarDatatable = function (data, columnas) {
        var cols = [];
        switch (columnas) {
            case 'archivo':
                cols = [
                    {title: "Nombre Archivo"},
                    {title: "Numero de consultas"}
                ];
                break;
            case 'consultas':
                cols = [
                    {title: "dirIpServer"},
                    {title: "endpoint"},
                    {title: "grafo"},
                    {title: "query"},
                    {title: "AND"},
                    {title: "FILTER"},
                    {title: "OPTIONAL"},
                    {title: "UNION"}
                ];
                break;
            case 'dirIpServer':
                cols = [
                    {title: "Nombre dirIpServer"},
                    {title: "Numero de consultas"}
                ];
                break;
            case 'grafo':
                cols = [
                    {title: "Nombre grafo"},
                    {title: "Numero de consultas"}
                ];
                break;

        }
        $('#' + columnas).DataTable({
            data: data,
            columns: cols
        });
    };
    this.updatedDatatable = function (data, nombre) {
        var datatable = $('#' + nombre).dataTable().api();
        datatable.clear();
        datatable.rows.add(data);
        datatable.draw();
    };
}
