<?php 
$vars = $this->getVars();
?>

<h1>Livre d'Or </h1>
<?= $this->getSession()->showFlash()?>
    <form  action="" method="post" enctype="multipart/form-data">
        <?= input('username', 'Votre nom')?>
	<?= input('email', 'votre adresse mail',array(),null, 'email')?>
	<?= textarea('message', 'Entrez votre message ici')?>
		
	    <div class="row">
	  	<div class="col-md-2">
		    <select class="form-control" name="note">
	    		<?php for ($i=1 ; $i<11 ; $i++):?>
			    <option value="<?=$i ?>"><?=$i ?></option>
			<?php endfor;?>
		    </select>
	  	</div>
	  	<div class="col-md-10" style="text-align: right: ;">
		    <?php if (!empty($vars)): ?><p><strong>Moyenne: </strong><?=($vars['moyenne']) ?>/10</p><?php endif;?>
	        </div>
	    </div>
	    <div class="row">
		<div class=" col-md-8">
		    <button type="submit" name="_submit" class="btn btn-primary">Envoyer</button> 
	 	</div>
		
	     </div>
    </form>

    <div>
        <?php 
	    if (!empty($vars)): 
		foreach ($vars['messages'] as $message):?>
		    <div class="blck">
			<h3><strong>Username: </strong><?=$message['username'] ?></h3>
			<p><strong>Mail: </strong><?=$message['email'] ?></p>
			<p><strong>Message: </strong><?=$message['message'] ?></p>
			<p><strong>Note: </strong><?=$message['note'] ?>/10</p>
		    </div>
		<?php endforeach;
	    endif;
	?>


    </div>


		       
