<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>
<div class="row mt">
  <div class="col-lg-9 main-chart">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i>Editar Cliente</h4>
      <form class="form-horizontal style-form" method="post" name="editar-clientes" id="editar-clientes" action="#" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?=$content['id']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Cliente:</label>
          <div class="col-sm-10">
            <input name="cliente" id="cliente" type="text" class="form-control" required value="<?php echo $content['cliente'];?>">
          </div>
        </div>

        <div class="form-group last">
        <label class="control-label col-md-6"></label>
          <button type="submit" class="btn btn-theme04">
            <span>Guardar</span>
          </button>
        </div>
      </form>       
    </div>
  </div>
</div>