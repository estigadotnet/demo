<?php
namespace PHPMaker2020\p_iuran_1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t101_pembayaran_edit = new t101_pembayaran_edit();

// Run the page
$t101_pembayaran_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_pembayaran_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_pembayaranedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft101_pembayaranedit = currentForm = new ew.Form("ft101_pembayaranedit", "edit");

	// Validate form
	ft101_pembayaranedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "F")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($t101_pembayaran_edit->Tanggal->Required) { ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_pembayaran_edit->Tanggal->caption(), $t101_pembayaran_edit->Tanggal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_pembayaran_edit->Tanggal->errorMessage()) ?>");
			<?php if ($t101_pembayaran_edit->loket_id->Required) { ?>
				elm = this.getElements("x" + infix + "_loket_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_pembayaran_edit->loket_id->caption(), $t101_pembayaran_edit->loket_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_pembayaran_edit->anggota_id->Required) { ?>
				elm = this.getElements("x" + infix + "_anggota_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_pembayaran_edit->anggota_id->caption(), $t101_pembayaran_edit->anggota_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_pembayaran_edit->Jumlah->Required) { ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_pembayaran_edit->Jumlah->caption(), $t101_pembayaran_edit->Jumlah->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_pembayaran_edit->Jumlah->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft101_pembayaranedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_pembayaranedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_pembayaranedit.lists["x_loket_id"] = <?php echo $t101_pembayaran_edit->loket_id->Lookup->toClientList($t101_pembayaran_edit) ?>;
	ft101_pembayaranedit.lists["x_loket_id"].options = <?php echo JsonEncode($t101_pembayaran_edit->loket_id->lookupOptions()) ?>;
	ft101_pembayaranedit.lists["x_anggota_id"] = <?php echo $t101_pembayaran_edit->anggota_id->Lookup->toClientList($t101_pembayaran_edit) ?>;
	ft101_pembayaranedit.lists["x_anggota_id"].options = <?php echo JsonEncode($t101_pembayaran_edit->anggota_id->lookupOptions()) ?>;
	loadjs.done("ft101_pembayaranedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_pembayaran_edit->showPageHeader(); ?>
<?php
$t101_pembayaran_edit->showMessage();
?>
<form name="ft101_pembayaranedit" id="ft101_pembayaranedit" class="<?php echo $t101_pembayaran_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_pembayaran">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t101_pembayaran_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t101_pembayaran_edit->Tanggal->Visible) { // Tanggal ?>
	<div id="r_Tanggal" class="form-group row">
		<label id="elh_t101_pembayaran_Tanggal" for="x_Tanggal" class="<?php echo $t101_pembayaran_edit->LeftColumnClass ?>"><?php echo $t101_pembayaran_edit->Tanggal->caption() ?><?php echo $t101_pembayaran_edit->Tanggal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_pembayaran_edit->RightColumnClass ?>"><div <?php echo $t101_pembayaran_edit->Tanggal->cellAttributes() ?>>
<span id="el_t101_pembayaran_Tanggal">
<input type="text" data-table="t101_pembayaran" data-field="x_Tanggal" data-format="1" name="x_Tanggal" id="x_Tanggal" maxlength="19" placeholder="<?php echo HtmlEncode($t101_pembayaran_edit->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_pembayaran_edit->Tanggal->EditValue ?>"<?php echo $t101_pembayaran_edit->Tanggal->editAttributes() ?>>
<?php if (!$t101_pembayaran_edit->Tanggal->ReadOnly && !$t101_pembayaran_edit->Tanggal->Disabled && !isset($t101_pembayaran_edit->Tanggal->EditAttrs["readonly"]) && !isset($t101_pembayaran_edit->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_pembayaranedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_pembayaranedit", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":1});
});
</script>
<?php } ?>
</span>
<?php echo $t101_pembayaran_edit->Tanggal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_pembayaran_edit->loket_id->Visible) { // loket_id ?>
	<div id="r_loket_id" class="form-group row">
		<label id="elh_t101_pembayaran_loket_id" for="x_loket_id" class="<?php echo $t101_pembayaran_edit->LeftColumnClass ?>"><?php echo $t101_pembayaran_edit->loket_id->caption() ?><?php echo $t101_pembayaran_edit->loket_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_pembayaran_edit->RightColumnClass ?>"><div <?php echo $t101_pembayaran_edit->loket_id->cellAttributes() ?>>
<span id="el_t101_pembayaran_loket_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_pembayaran" data-field="x_loket_id" data-value-separator="<?php echo $t101_pembayaran_edit->loket_id->displayValueSeparatorAttribute() ?>" id="x_loket_id" name="x_loket_id"<?php echo $t101_pembayaran_edit->loket_id->editAttributes() ?>>
			<?php echo $t101_pembayaran_edit->loket_id->selectOptionListHtml("x_loket_id") ?>
		</select>
</div>
<?php echo $t101_pembayaran_edit->loket_id->Lookup->getParamTag($t101_pembayaran_edit, "p_x_loket_id") ?>
</span>
<?php echo $t101_pembayaran_edit->loket_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_pembayaran_edit->anggota_id->Visible) { // anggota_id ?>
	<div id="r_anggota_id" class="form-group row">
		<label id="elh_t101_pembayaran_anggota_id" for="x_anggota_id" class="<?php echo $t101_pembayaran_edit->LeftColumnClass ?>"><?php echo $t101_pembayaran_edit->anggota_id->caption() ?><?php echo $t101_pembayaran_edit->anggota_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_pembayaran_edit->RightColumnClass ?>"><div <?php echo $t101_pembayaran_edit->anggota_id->cellAttributes() ?>>
<span id="el_t101_pembayaran_anggota_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_pembayaran" data-field="x_anggota_id" data-value-separator="<?php echo $t101_pembayaran_edit->anggota_id->displayValueSeparatorAttribute() ?>" id="x_anggota_id" name="x_anggota_id"<?php echo $t101_pembayaran_edit->anggota_id->editAttributes() ?>>
			<?php echo $t101_pembayaran_edit->anggota_id->selectOptionListHtml("x_anggota_id") ?>
		</select>
</div>
<?php echo $t101_pembayaran_edit->anggota_id->Lookup->getParamTag($t101_pembayaran_edit, "p_x_anggota_id") ?>
</span>
<?php echo $t101_pembayaran_edit->anggota_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_pembayaran_edit->Jumlah->Visible) { // Jumlah ?>
	<div id="r_Jumlah" class="form-group row">
		<label id="elh_t101_pembayaran_Jumlah" for="x_Jumlah" class="<?php echo $t101_pembayaran_edit->LeftColumnClass ?>"><?php echo $t101_pembayaran_edit->Jumlah->caption() ?><?php echo $t101_pembayaran_edit->Jumlah->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_pembayaran_edit->RightColumnClass ?>"><div <?php echo $t101_pembayaran_edit->Jumlah->cellAttributes() ?>>
<span id="el_t101_pembayaran_Jumlah">
<input type="text" data-table="t101_pembayaran" data-field="x_Jumlah" name="x_Jumlah" id="x_Jumlah" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t101_pembayaran_edit->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t101_pembayaran_edit->Jumlah->EditValue ?>"<?php echo $t101_pembayaran_edit->Jumlah->editAttributes() ?>>
</span>
<?php echo $t101_pembayaran_edit->Jumlah->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t101_pembayaran" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t101_pembayaran_edit->id->CurrentValue) ?>">
<?php if (!$t101_pembayaran_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_pembayaran_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_pembayaran_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_pembayaran_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t101_pembayaran_edit->terminate();
?>