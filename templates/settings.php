<form id="user_hmac" action="#" method="post">
        <fieldset class="personalblock">
                <h2><?php p($l->t('HMAC Authentication Backend'));?></h2>
		<label for="user_hmac_key"><?php p($l->t('HMAC Shared Secret Key'));?><input type="text" name="user_hmac_key" id="user_hmac_key" value="<?php p($_['user_hmac_key']);?>" /></label>
                <input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']);?>" />
                <input type="submit" value="<?php p($l->t('Save'));?>" />
        </fieldset>
</form>
