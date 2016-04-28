<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>
<div class="row mt">
  <div class="col-lg-9 main-chart">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i>Editar Proyecto</h4>
      <form class="form-horizontal style-form" method="post" name="editar-proyecto" id="editar-proyecto" action="#" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?=$content['id']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Cliente:</label>
          <div class="col-sm-10">
            <select name="cliente"  class="form-control" id="cliente">
              <option selected="true" value="">Selecciona un cliente</option>
              <?php $helpers->getOptionsSelect('tbl_clientes','cliente',$content['cliente_id']); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Proyecto:</label>
          <div class="col-sm-10">
            <input name="proyecto" id="proyecto" type="text" class="form-control" required value="<?php echo $content['proyecto'];?>">
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