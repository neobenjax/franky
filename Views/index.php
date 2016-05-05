<div class="row mt">
  <div class="col-md-12">
      <div class="content-panel">

      <?php if (count($actividadesFijas)>0) { ?>
          <h4>Actividades Fijas </h4>

          <table class="table table-striped table-advance table-hover">

            <thead>
            <tr>
                <th><i class="fa fa-bullhorn"></i> ID</th>
                <th><i class="fa fa-bullhorn"></i> Gerente</th>
                <th><i class="fa fa-bullhorn"></i> Requerimiento</th>
                <th><i class="fa fa-bullhorn"></i> Proyecto</th>
                <th><i class="fa fa-bullhorn"></i> Cliente</th>
            </tr>
            </thead>
            <tbody>
            <?php

              foreach($actividadesFijas as $data) {
                # code...

            ?>
            <tr>
                <td><?=$data['id']?></td>
                <td><?=$data['gerencia']?></td>
                <td >
                    <a>
                        <?=$data['actividad']?>
                    </a>
                </td>
                <td><?=$data['proyecto']?></td>
                <td><?=$data['cliente']?></td>
            </tr>
            <?php
              }
            ?>
            </tbody>
          </table>

          <br>

      <?php } ?>

          <h4>Actividades <?php echo date("d-m-Y");?></h4><hr>

          <b>Requerimientos:</b> <?php echo count($actividades);?>
          <br><b>Concluídos:</b> <?php echo $concluidas[0]['total'];?>

          <table class="table table-striped table-advance table-hover">

            <thead>
            <tr>
                <th><i class="fa fa-bullhorn"></i> ID</th>
                <th><i class="fa fa-bullhorn"></i> Consultor</th>
                <th><i class="fa fa-bullhorn"></i> Requerimiento</th>
                <th><i class="fa fa-bullhorn"></i> Proyecto</th>
                <th><i class="fa fa-bullhorn"></i> Cliente</th>
                <th><i class="fa fa-bullhorn"></i> Etapa</th>
            </tr>
            </thead>
            <tbody>
            <?php

              foreach($actividades as $data) {
                # code...

            ?>
            <tr>
                <td><?=$data['id']?></td>
                <td <?php if ($data['id_etapa']!=5) {echo 'style="background-color:#feb130;"';} else {echo 'style="background-color:#2fd710;"';}?>>
                  <?php
                    if ($data['html'] != '' && $data['id_etapa']==1)
                      echo $data['html'].'<br>';

                    if ($data['progra'] != '' && $data['id_etapa']==2)
                      echo $data['progra'].'<br>';

                    if ($data['calidad'] != '' && $data['id_etapa']==3)
                      echo $data['calidad'];

                    if ($data['gerencia'] != '' && $data['id_etapa']==4)
                      echo $data['gerencia'];

                    if ($data['id_etapa']==5)
                    {
                      $imprime = ($data['html'] != '') ? $data['html'].'<br>' : '';
                      $imprime .= ($data['progra'] != '') ? $data['progra'].'<br>' : '';
                      $imprime .= ($data['calidad'] != '') ? $data['calidad'].'<br>' : '';
                      $imprime .= ($data['gerencia'] != '') ? $data['gerencia'].'<br>' : '';
                      
                      echo $imprime;
                    }

                    
                  ?>
                </td>
                <td >
                    <a>
                        <?=$data['actividad']?>
                    </a>
                </td>
                <td><?=$data['proyecto']?></td>
                <td><?=$data['cliente']?></td>
                <td><?=$data['etapa']?></td>
            </tr>
            <?php
              }
            ?>
            </tbody>
          </table>
        </div>


    </div>
</div>