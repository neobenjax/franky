<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>

<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <h4><i class="fa fa-angle-right"></i> Proyectos</h4><hr><table class="table table-striped table-advance table-hover">

                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Proyecto</th>
                                  <th><i class="fa fa-bullhorn"></i> Cliente</th>
                                  <th><i class="fa fa-bullhorn"></i> Fecha</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th>Acciones</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                $datas = $helpers->getQuery("SELECT p.id, p.proyecto, c.cliente, p.status, p.timestamp FROM tbl_proyectos AS p 
                                  LEFT JOIN tbl_clientes AS c ON (c.id = p.cliente_id) 
                                  order by p.proyecto desc");

                                foreach($datas as $data) {
                                  # code...

                              ?>
                              <tr>
                                  <td>
                                      <a>
                                          <?=$data['proyecto']?>
                                      </a>
                                  </td>
                                  <td><?=$data['cliente']?></td>
                                  <td><?=$data['timestamp']?></td>
                                  <td><span class="label label-success label-mini"><?=$helpers->getStatus($data['status'])?></span></td>
                                  <td>
                                      <a href="editar-proyecto/<?=$data['id']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <form name="updForm_<?=$data['id']?>" id="updForm_<?=$data['id']?>" action="#" method="post">
                                        <input type="hidden" name="proy" value="<?=$data['id']?>">
                                        <input type="hidden" name="status" value="<?=$data['status']?>">
                                        <input type="hidden" name="act" id="act" value="updProyecto">
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



