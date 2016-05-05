<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>

<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <h4><i class="fa fa-angle-right"></i> Actividades Fijas</h4><hr>
                          <table class="table table-striped table-advance table-hover">

                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Actividad</th>
                                  <th><i class="fa fa-bullhorn"></i> Proyecto</th>
                                  <th><i class="fa fa-bullhorn"></i> Cliente</th>
                                  <th><i class="fa fa-bullhorn"></i> Gerente</th>
                                  <th><i class="fa fa-bullhorn"></i> Fecha</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Completado</th>
                                  <th>Acciones</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                $datas = $helpers->getQuery("SELECT a.id, a.actividad, p.proyecto, c.cliente, a.status, a.timestamp, a.completado, g.consultor AS gerencia
                                  FROM tbl_actividades_fijas AS a
                                  LEFT JOIN tbl_proyectos AS p ON (p.id = a.proyecto_id) 
                                  LEFT JOIN tbl_clientes AS c ON (c.id = p.cliente_id) 
                                  LEFT JOIN tbl_consultor AS g ON (g.id = a.gerente) 
                                  ORDER BY a.timestamp desc, c.cliente, p.proyecto, a.actividad ASC");

                                foreach($datas as $data) {
                                  # code...

                              ?>
                              <tr>
                                  <td>
                                      <a>
                                          <?=$data['actividad']?>
                                      </a>
                                  </td>
                                  <td><?=$data['proyecto']?></td>
                                  <td><?=$data['cliente']?></td>
                                  <td style="text-align:center"><?=$data['gerencia'];?></td>
                                  <td><?=$data['timestamp']?></td>
                                  <td><span class="label label-success label-mini"><?=$helpers->getStatus($data['status'])?></span></td>
                                  <td><span class="label label-success label-mini"><?php echo ($data['completado']) ? 'Completada' : 'Pendiente';?></span></td>
                                  <td>
                                      <a href="editar-actividad-fija/<?=$data['id']?>" title="Editar" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <form name="updForm_<?=$data['id']?>" id="updForm_<?=$data['id']?>" action="#" method="post">
                                        <input type="hidden" name="actv" value="<?=$data['id']?>">
                                        <input type="hidden" name="status" value="<?=$data['status']?>">
                                        <input type="hidden" name="act" id="act" value="updActividad">
                                      </form>
                                      <a onclick="$('#updForm_'+<?=$data['id']?>).submit()" title="Activar" class="btn btn-primary btn-xs"><i class="fa fa-check "></i></button>
                                      <form name="complForm_<?=$data['id']?>" id="complForm_<?=$data['id']?>" action="#" method="post">
                                        <input type="hidden" name="actv" value="<?=$data['id']?>">
                                        <input type="hidden" name="completado" value="<?=$data['completado']?>">
                                        <input type="hidden" name="act" id="act" value="compActividad">
                                      </form>
                                      <a onclick="$('#complForm_'+<?=$data['id']?>).submit()" title="Completar" class="btn btn-primary btn-xs"><i class="fa fa-smile-o"></i></button>
                                  </td>
                              </tr>
                              <?php
                                }
                              ?>
                              </tbody>
                          </table>
      </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div>



