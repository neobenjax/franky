<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>
<div class="row mt">
  <div class="col-lg-9 main-chart">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i>Editar Actividad</h4>
      <form class="form-horizontal style-form" method="post" name="editar-actividad" id="editar-actividad" action="#" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?=$content['id']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Proyecto:</label>
          <div class="col-sm-10">
            <select name="proyecto"  class="form-control" id="proyecto">
              <option selected="true" value="">Selecciona un proyecto</option>
              <?php $helpers->getOptionsSelect('tbl_proyectos','proyecto',$content['proyecto_id']); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Actividad:</label>
          <div class="col-sm-10">
            <input name="actividad" id="actividad" type="text" class="form-control" required value="<?php echo $content['actividad'];?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Etapa:</label>
          <div class="col-sm-10">
            <select name="etapa"  class="form-control" id="etapa">
              <option value="">Selecciona una etapa</option>
              <?php $helpers->getOptionsSelect('tbl_etapa','etapa',$content['etapa_id']); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Consultor HTML:</label>
          <div class="col-sm-10">
            <select class="form-control" name="html" id="html">
              <option value="">Selecciona un consultor</option>
              <?php for($i=0,$n=count($consultores);$i<$n;$i++) { 

                  if ($consultores[$i]['etapa_id'] == 1){ 
              ?>
                    <option value="<?php echo $consultores[$i]['id']?>" <?php if($content['consultor_html'] == $consultores[$i]['id']) echo 'selected'; ?>><?php echo $consultores[$i]['consultor']?></option>
              <?php 
                  } 
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Consultor Programación:</label>
          <div class="col-sm-10">
            <select class="form-control" name="programacion" id="programacion">
              <option value="">Selecciona un consultor</option>
              <?php for($i=0,$n=count($consultores);$i<$n;$i++) { 

                  if ($consultores[$i]['etapa_id'] == 2){ 
              ?>
                    <option value="<?php echo $consultores[$i]['id']?>" <?php if($content['consultor_progra'] == $consultores[$i]['id']) echo 'selected'; ?>><?php echo $consultores[$i]['consultor']?></option>
              <?php 
                  } 
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Consultor Calidad:</label>
          <div class="col-sm-10">
            <select class="form-control" name="calidad" id="calidad">
              <option value="">Selecciona un consultor</option>
              <?php for($i=0,$n=count($consultores);$i<$n;$i++) { 

                  if ($consultores[$i]['etapa_id'] == 3){ 
              ?>
                    <option value="<?php echo $consultores[$i]['id']?>" <?php if($content['consultor_calidad'] == $consultores[$i]['id']) echo 'selected'; ?>><?php echo $consultores[$i]['consultor']?></option>
              <?php 
                  } 
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Gerente:</label>
          <div class="col-sm-10">
            <select class="form-control" name="gerencia" id="gerencia">
              <option value="">Selecciona un gerente</option>
              <?php for($i=0,$n=count($consultores);$i<$n;$i++) { 

                  if ($consultores[$i]['etapa_id'] == 4){ 
              ?>
                    <option value="<?php echo $consultores[$i]['id']?>" <?php if($content['gerente'] == $consultores[$i]['id']) echo 'selected'; ?>><?php echo $consultores[$i]['consultor']?></option>
              <?php 
                  } 
                }
              ?>
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