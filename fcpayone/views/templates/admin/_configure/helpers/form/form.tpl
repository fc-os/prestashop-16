{*
* PAYONE Prestashop Connector is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* PAYONE Prestashop Connector is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU Lesser General Public License for more details.
*
* You should have received a copy of the GNU Lesser General Public License
* along with PAYONE Prestashop Connector. If not, see <http://www.gnu.org/licenses/>.
*
* PHP version 5
*
* @category  Payone
* @package   fcpayone
* @author    FATCHIP GmbH <support@fatchip.de>
* @copyright 2003 - 2017 Payone GmbH
* @license   <http://www.gnu.org/licenses/> GNU Lesser General Public License
* @link      http://www.payone.de
*}

{extends file="helpers/form/form.tpl"}
{block name="field"}
	{if $input.type == 'file_lang'}
		<div class="col-lg-9">
			{foreach from=$languages item=language}
				{if $languages|count > 1}
					<div class="translatable-field lang-{$language.id_lang}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
				{/if}
				<div class="form-group">
					<div class="col-lg-6">
						<input id="{$input.name}_{$language.id_lang}" type="file" name="{$input.name}_{$language.id_lang}" class="hide" />
						<div class="dummyfile input-group">
							<span class="input-group-addon"><i class="icon-file"></i></span>
							<input title="{$input.name}_{$language.id_lang}" id="{$input.name}_{$language.id_lang}-name" type="text" class="disabled" name="filename" readonly />
							<span class="input-group-btn">
								<button id="{$input.name}_{$language.id_lang}-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
									<i class="icon-folder-open"></i> {$oFcPayoneTranslator->translate('FC_PAYONE_BACKEND_UPLOAD_CHOOSE_FILE')}
								</button>
							</span>
						</div>
					</div>
					{if $languages|count > 1}
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								{$language.iso_code}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								{foreach from=$languages item=lang}
								<li><a href="javascript:hideOtherLanguage({$lang.id_lang});" tabindex="-1">{$lang.name}</a></li>
								{/foreach}
							</ul>
						</div>
					{/if}
				</div>

				<div class="form-group">
					{if isset($fields_value[$input.name|cat:'_'|cat:$language.id_lang]) && $fields_value[$input.name|cat:'_'|cat:$language.id_lang] != ''}
					<div id="{$input.name}-{$language.id_lang}-images-thumbnails" class="col-lg-12">
						<img src="{$sFcPayoneModuleUrl}views/img/Payment/Methods/{$fields_value[$input.name|cat:'_'|cat:$language.id_lang]}" class="img-thumbnail"/>
					</div>
					{/if}
				</div>
				{if $languages|count > 1}
					</div>
				{/if}
				<script>
				$(document).ready(function(){
					$('#{$input.name}_{$language.id_lang}-selectbutton').click(function(e){
						$('#{$input.name}_{$language.id_lang}').trigger('click');
					});
					$('#{$input.name}_{$language.id_lang}').change(function(e){
						var val = $(this).val();
						var file = val.split(/[\\/]/);
						$('#{$input.name}_{$language.id_lang}-name').val(file[file.length-1]);
					});
				});
			</script>
			{/foreach}
			{if isset($input.desc) && !empty($input.desc)}
				<p class="help-block">
					{$input.desc}
				</p>
			{/if}
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
