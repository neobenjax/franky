<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>
<div class="row mt">
  <div class="col-lg-9 main-chart">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i>Alta de Actividad</h4>
      <form class="form-horizontal style-form" name="alta-actividad" id="alta-actividad" method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Proyecto:</label>
          <div class="col-sm-10">
            <select class="form-control" name="proyecto" id="proyecto" required>
              <option selected="true" value="">Selecciona un proyecto</option>
                <?php $helpers->getOptionsWhere('tbl_proyectos','proyecto',array()); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Actividad:</label>
          <div class="col-sm-10">
            <input name="actividad" type="text" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Etapa:</label>
          <div class="col-sm-10">
            <select class="form-control" name="etapa" id="etapa" required>
              <option selected="true" value="">Selecciona una etapa</option>
                <?php $helpers->getOptionsWhere('tbl_etapa','etapa',array()); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Consultor HTML:</label>
          <div class="col-sm-10">
            <select class="form-control" name="html" id="html">
              <option selected="true" value="">Selecciona un consultor</option>
                <?php $helpers->getOptionsWhere('tbl_consultor','consultor',array('AND'=>array('etapa_id'=>1,'status'=>1))); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Consultor Programación:</label>
          <div class="col-sm-10">
            <select class="form-control" name="programacion" id="programacion">
              <option selected="true" value="">Selecciona un consultor</option>
                <?php $helpers->getOptionsWhere('tbl_consultor','consultor',array('AND'=>array('etapa_id'=>2,'status'=>1))); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Consultor Calidad:</label>
          <div class="col-sm-10">
            <select class="form-control" name="calidad" id="calidad">
              <option selected="true" value="">Selecciona un consultor</option>
                <?php $helpers->getOptionsWhere('tbl_consultor','consultor',array('AND'=>array('etapa_id'=>3,'status'=>1))); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Gerente:</label>
          <div class="col-sm-10">
            <select class="form-control" name="gerencia" id="gerencia">
              <option selected="true" value="">Selecciona un gerente</option>
                <?php $helpers->getOptionsWhere('tbl_consultor','consultor',array('AND'=>array('etapa_id'=>4,'status'=>1))); ?>
            </select>
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



