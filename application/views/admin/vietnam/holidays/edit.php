<?
	$name			= isset($item->name) ? $item->name : "";
	$from			= isset($item->from) ? $item->from : "";
	$to				= isset($item->to) ? $item->to : "";
	$rate		 	= isset($item->rate) ? $item->rate : "";
	$active			= isset($item->active) ? $item->active : 1;
?>

<link rel="stylesheet" type="text/css" href="<?=TPL_URL?>jquery/css/jquery.ui.css" />
<script type="text/javascript" src="<?=TPL_URL?>jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=TPL_URL?>jquery/js/jquery.ui.min.js"></script>
<script>
	$(document).ready(function() {
		var dateoptions = {
				numberOfMonths : 2,
				dateFormat: 'mm/dd/yy'
			};
		$("#from").datepicker(dateoptions);
		$("#to").datepicker(dateoptions);
	});
</script>
<div id="toolbar-box">
	<div class="t">
		<div class="t">
			<div class="t"></div>
		</div>
	</div>
	<div class="m">
		<div id="toolbar" class="toolbar">
			<table class="toolbar">
				<tbody>
					<tr>
						<td id="toolbar-save" class="button">
							<a class="toolbar" onclick="javascript: submitbutton('save')" href="#">
							<span title="Save" class="icon-32-save">
							</span>
							Save
							</a>
						</td>
						<td id="toolbar-cancel" class="button">
							<a class="toolbar" onclick="javascript: submitbutton('cancel')" href="#">
							<span title="Cancel" class="icon-32-cancel">
							</span>
							Cancel
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="header icon-48-generic">
			Vietnam Holidays: <small><small>[ Edit ]</small></small>
		</div>
		<div class="clr"></div>
	</div>
	<div class="b">
		<div class="b">
			<div class="b"></div>
		</div>
	</div>
</div>
<div class="clr"></div>
<div id="element-box">
	<div class="t">
		<div class="t">
			<div class="t"></div>
		</div>
	</div>
	<div class="m">
		<script type="text/javascript" language="javascript">
			function submitbutton(pressbutton)
			{
				var form = document.adminForm;
				if (pressbutton == 'cancel') 
				{
					submitform( pressbutton );
					return;
				}
			
				if (form.title.value == "")
				{
					alert( "PLEASE INPUT TITLE" );
					return;
				}
				submitform( pressbutton );
			}
		</script>
		<form id="adminForm" name="adminForm" method="post" action="<?=site_url("administrator/update_vietnam_holidays")?>">
			<input type="hidden" name="task" value="" />
			<? if (isset($item)) { ?>
				<input type="hidden" name="action" id="action" value="edit"/>
				<input type="hidden" name="id" id="id" value="<?=(isset($item->id)?$item->id:0)?>"/>
			<? } else { ?>
				<input type="hidden" name="action" id="action" value="new"/>
			<? } ?>
			
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tbody>
					<tr>
						<td valign="top">
							<table class="adminform">
								<tbody>
									<tr>
										<td width="10%">
											<label>Name:</label>
										</td>
										<td width="30%">
											<input type="text" value="<?=$name?>" maxlength="255" id="name" name="name" class="inputbox" style="width: 60%" />
										</td>
									</tr>
									<tr>
										<td width="10%">
											<label>From:</label>
										</td>
										<td width="100%">
											<input type="text" value="<?=(!empty($from) && $from != '0000-00-00 00:00:00') ? date('m/d/Y', strtotime($from)) : ''?>" maxlength="255" id="from" name="from" class="inputbox" style="width: 100px" placeholder="mm/dd/yyyy" />
										</td>
									</tr>
									<tr>
										<td width="10%">
											<label>To:</label>
										</td>
										<td width="100%">
											<input type="text" value="<?=(!empty($to) && $to != '0000-00-00 00:00:00') ? date('m/d/Y', strtotime($to)) : ''?>" maxlength="255" id="to" name="to" class="inputbox" style="width: 100px" placeholder="mm/dd/yyyy" />
										</td>
									</tr>
									<tr>
										<td width="10%">
											<label>Rate:</label>
										</td>
										<td>
											<input style="text-align:right;padding-right: 10px;width: 90px" type="text" value="<?=$rate?>" maxlength="255" id="rate" name="rate" class="inputbox" /> %
										</td>
									</tr>
									<tr>
										<td width="10%">
											<label>Published:</label>
										</td>
										<td width="100%">
											<input type="radio" value="0" id="state0" name="active" <?=(!$active) ? "checked='checked'" : ""?> />
											<label for="state0">No</label>
											<input type="radio" value="1" id="state1" name="active" <?=($active) ? "checked='checked'" : ""?> />
											<label for="state1">Yes</label>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		<div class="clr"></div>
	</div>
	<div class="b">
		<div class="b">
			<div class="b"></div>
		</div>
	</div>
</div>
