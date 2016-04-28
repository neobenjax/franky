<?php require $helpers->getController($_GET['section']); ?>
<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <?=$msg?>
</div>

<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <h4><i class="fa fa-angle-right"></i> Clientes</h4><hr><table class="table table-striped table-advance table-hover">

                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Cliente</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th>Acciones</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                $data = $helpers->getDataArray('tbl_clientes');

                                for ($i=0,$n=count($data);$i<$n;$i++) {
                                  # code...

                              ?>
                              <tr>
                                  <td>
                                      <a>
                                          <?=$data[$i]['cliente']?>
                                      </a>
                                  </td>
                                  <td><span class="label label-success label-mini"><?=$helpers->getStatus($data[$i]['status'])?></span></td>
                                  <td>
                                      <a href="editar-clientes/<?=$data[$i]['id']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <form name="updForm_<?=$data[$i]['id']?>" id="updForm_<?=$data[$i]['id']?>" action="#" method="post">
                                        <input type="hidden" name="cli" value="<?=$data[$i]['id']?>">
                                        <input type="hidden" name="status" value="<?=$data[$i]['status']?>">
                                        <input type="hidden" name="act" id="act" value="updCliente">
                                      </form>
                                      <a onclick="$('#updForm_'+<?=$data[$i]['id']?>).submit()" class="btn btn-primary btn-xs"><i class="fa fa-check "></i></button>
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



