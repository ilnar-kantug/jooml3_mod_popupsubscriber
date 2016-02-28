<?php

defined('_JEXEC') or die;

	?>
	
	<div onclick="pop_up_subs_form_hide_order();" id="pop_up_subs_form_overlay">&nbsp;</div>
		<div id="pop_up_subs_form_wrapper">
			<div id="ns-close"></div>
			<div id="pop_up_subs_form">
			<div id="pop_up_title">
			<?
				if($params->get('title')){
					echo $params->get('title');
				}
			?>
			</div>	
				<form action="<?=JURI::base().'modules/'.$module->module.'/php/mod_subscriber_mailer.php'?>" method="post" id="subscriber-form">
					<div id="form-msg"></div>
					<div class="form-group">
						<input type="text" id="ns-name" name="name" class="form-control" required placeholder="<?=JText::_('MOD_SUBSCRIBER_NAME_FIELD_PLACEHOLDER')?>">
					</div>
					<div class="form-group">
						<input type="text" id="ns-email" name="email" class="form-control" required placeholder="<?=JText::_('MOD_SUBSCRIBER_EMAIL_FIELD_PLACEHOLDER')?>">
					</div>
					<span class="ns-email-error"><?=JText::_('MOD_SUBSCRIBER_EMAIL_VALIDATION_ERROR_MESSAGE')?></span>
					<br />
					<input type="hidden" name="recipient" value="<?=$params->get('recipient')?>">
					<input type="hidden" name="subject" value="<?=$params->get('subject')?>">
					<input type="hidden" name="writingToFileEnable" value="<?=$params->get('writingToFileEnable')?>">
					<input type="hidden" name="successMessage" value="<?=$params->get('successMessage')?>">
					<span id="jsData" data-counter="<?=$params->get('showingCounter')?>" data-sending-error="<?=JText::_('MOD_SUBSCRIBER_EMAIL_SENDING_ERROR_MESSAGE')?>" data-language="<?=JFactory::getLanguage()->getTag()?>"></span>
					<input type="submit" id="ns-submit"  class="btn btn-primary" name="subcriberSubmit" value="<?=$params->get('subcriberSubmit')?>">
					<br />
				</form>
			</div>
		</div>

