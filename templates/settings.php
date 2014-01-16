<form id="user_hmac_form" action="#" method="post">
	<fieldset class="personalblock">
		<h2><?php p($l->t('HMAC User Backend'));?></h2>
		<label for="user_hmac_key"><?php p($l->t('HMAC Shared Secret Key'));?></label>
		<input type="text" name="user_hmac_key" id="user_hmac_key" style="width:auto;" size="50" value="<?php p($_['user_hmac_key']);?>" />
		<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']);?>" />
		<input type="submit" value="<?php p($l->t('Save'));?>" />
		<br>
		<em>It is recommended to use a HMAC shared secret key with a minimum length of 20 characters.</em>
	</fieldset>
</form>
