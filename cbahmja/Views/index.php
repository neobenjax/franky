<?php if (isset($_SESSION['msg']) && $_SESSION['msg']!='') { ?>
	<div class="alert alert-warning alert-dismissable" style="display:<?=$style?>">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<?php echo $_SESSION['msg'];
			$_SESSION['msg'] = '';
		?>
	</div>
<?php } ?>

<h3><i class="fa fa-angle-right"></i> Bienvenido a <?=$appName?> by <?=$company?></h3>
<div class="row mt">
  <div class="col-lg-12">
    <p>Selecciona una opción del menú.</p>
  </div>
</div>