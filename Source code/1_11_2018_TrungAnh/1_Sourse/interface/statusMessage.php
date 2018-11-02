<?php  if (count($statusMessage) > 0) : ?>
  <div class="alert-box success">
  	<?php foreach ($statusMessage as $statusMessage) : ?>
  	  <span>success: </span><p><?php echo $statusMessage ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
