<!-- Este es el archivo > L libre-->
<?php 
    $algo =$_REQUEST['valor'];
?>
<div class="btn-group" id="<?php echo $algo; ?>" style="width:255px; height: 130px;" >
    <div class="thumbnail" id="<?php echo $algo; ?>_L" ><strong> Libre </strong>
    	<button type="button" class="close" aria-hidden="true" onclick="borrarPanelfiltert(<?php echo $algo; ?>)">&times;</button>
    	<br> 
    	<div class="row">       
			<div class="col-md-12">          
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="<?php echo $algo; ?>x" value="" onchange="cambioTexto()">
                    </div>
                  </div>
                </form>
	        </div>
        </div>
    </div>
</div>