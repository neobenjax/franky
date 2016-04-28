<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>

<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <h4><i class="fa fa-angle-right"></i> Actividades</h4><hr>
                          <table class="table table-striped table-advance table-hover">

                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Actividad</th>
                                  <th><i class="fa fa-bullhorn"></i> Proyecto</th>
                                  <th><i class="fa fa-bullhorn"></i> Cliente</th>
                                  <th><i class="fa fa-bullhorn"></i> Consultores</th>
                                  <th><i class="fa fa-bullhorn"></i> Etapa</th>
                                  <th><i class="fa fa-bullhorn"></i> Fecha</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th>Acciones</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                $datas = $helpers->getQuery("SELECT a.id, a.actividad, p.proyecto, c.cliente, e.etapa, a.status, a.timestamp, ch.consultor AS html, cp.consultor AS progra, cc.consultor AS calidad
                                  FROM tbl_actividades AS a
                                  LEFT JOIN tbl_proyectos AS p ON (p.id = a.proyecto_id) 
                                  LEFT JOIN tbl_clientes AS c ON (c.id = p.cliente_id) 
                                  LEFT JOIN tbl_etapa AS e ON (e.id = a.etapa_id) 
                                  LEFT JOIN tbl_consultor AS ch ON (ch.id = a.consultor_html) 
                                  LEFT JOIN tbl_consultor AS cp ON (cp.id = a.consultor_progra) 
                                  LEFT JOIN tbl_consultor AS cc ON (cc.id = a.consultor_calidad) 
                                  ORDER BY c.cliente, p.proyecto, a.actividad ASC");

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
                                  <td style="text-align:center">
                                    <?php
                                      if ($data['html'] != '')
                                        echo $data['html'].'<br>';

                                      if ($data['progra'] != '')
                                        echo $data['progra'].'<br>';

                                      if ($data['calidad'] != '')
                                        echo $data['calidad'];
                                    ?>
                                  </td>
                                  <td><?=$data['etapa']?></td>
                                  <td><?=$data['timestamp']?></td>
                                  <td><span class="label label-success label-mini"><?=$helpers->getStatus($data['status'])?></span></td>
                                  <td>
                                      <a href="editar-actividad/<?=$data['id']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <form name="updForm_<?=$data['id']?>" id="updForm_<?=$data['id']?>" action="#" method="post">
                                        <input type="hidden" name="actv" value="<?=$data['id']?>">
                                        <input type="hidden" name="status" value="<?=$data['status']?>">
                                        <input type="hidden" name="act" id="act" value="updActividad">
                                      </form>
                                      <a onclick="$('#updForm_'+<?=$data['id']?>).submit()" class="btn btn-primary btn-xs"><i class="fa fa-check "></i></button>
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



