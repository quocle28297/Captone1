<?php  if (count($errors) > 0) : ?>
  <div class="alert-box error">
  	<?php foreach ($errors as $error) : ?>
  	  <span>error: </span><p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
