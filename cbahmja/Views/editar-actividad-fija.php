<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>
<div class="row mt">
  <div class="col-lg-9 main-chart">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i>Editar Actividad Fija</h4>
      <form class="form-horizontal style-form" method="post" name="editar-actividad-fija" id="editar-actividad-fija" action="#" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?=$content['id']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Proyecto:</label>
          <div class="col-sm-10">
            <select name="proyecto"  class="form-control" id="proyecto">
              <option selected="true" value="">Selecciona un proyecto</option>
              <?php for($i=0,$n=count($proyectos);$i<$n;$i++) { 

              ?>
                    <option value="<?php echo $proyectos[$i]['id']?>" <?php if($content['proyecto_id'] == $proyectos[$i]['id']) echo 'selected'; ?>><?php echo $proyectos[$i]['proyecto'].' - '.$proyectos[$i]['cliente'];?></option>
              <?php 
                
                }
              ?>
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