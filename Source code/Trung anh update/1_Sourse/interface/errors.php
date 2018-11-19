<?php  if (count($errors) > 0) : ?>
  
  	<?php foreach ($errors as $error) : ?>
  	  <p class="alert-box error">error:&nbsp; <?php echo $error ?></p>
  	<?php endforeach ?>
<?php  endif ?>
