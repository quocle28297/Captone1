<?php  if (count($statusMessage) > 0) : ?>
  
  	<?php foreach ($statusMessage as $statusMessage) : ?>
  	  <p class="alert-box success">Thành Công:&nbsp; <?php echo $statusMessage ?></p>
  	<?php endforeach ?>
<?php  endif ?>