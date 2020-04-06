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
$t002_anggota_edit = new t002_anggota_edit();

// Run the page
$t002_anggota_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_anggota_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_anggotaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft002_anggotaedit = currentForm = new ew.Form("ft002_anggotaedit", "edit");

	// Validate form
	ft002_anggotaedit.validate = function() {
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
			<?php if ($t002_anggota_edit->IDPEL->Required) { ?>
				elm = this.getElements("x" + infix + "_IDPEL");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_anggota_edit->IDPEL->caption(), $t002_anggota_edit->IDPEL->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_anggota_edit->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_anggota_edit->Nama->caption(), $t002_anggota_edit->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_anggota_edit->Alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_Alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_anggota_edit->Alamat->caption(), $t002_anggota_edit->Alamat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_anggota_edit->NomorHP->Required) { ?>
				elm = this.getElements("x" + infix + "_NomorHP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_anggota_edit->NomorHP->caption(), $t002_anggota_edit->NomorHP->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	ft002_anggotaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_anggotaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_anggotaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_anggota_edit->showPageHeader(); ?>
<?php
$t002_anggota_edit->showMessage();
?>
<form name="ft002_anggotaedit" id="ft002_anggotaedit" class="<?php echo $t002_anggota_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_anggota">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t002_anggota_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t002_anggota_edit->IDPEL->Visible) { // IDPEL ?>
	<div id="r_IDPEL" class="form-group row">
		<label id="elh_t002_anggota_IDPEL" for="x_IDPEL" class="<?php echo $t002_anggota_edit->LeftColumnClass ?>"><?php echo $t002_anggota_edit->IDPEL->caption() ?><?php echo $t002_anggota_edit->IDPEL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_anggota_edit->RightColumnClass ?>"><div <?php echo $t002_anggota_edit->IDPEL->cellAttributes() ?>>
<span id="el_t002_anggota_IDPEL">
<input type="text" data-table="t002_anggota" data-field="x_IDPEL" name="x_IDPEL" id="x_IDPEL" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_anggota_edit->IDPEL->getPlaceHolder()) ?>" value="<?php echo $t002_anggota_edit->IDPEL->EditValue ?>"<?php echo $t002_anggota_edit->IDPEL->editAttributes() ?>>
</span>
<?php echo $t002_anggota_edit->IDPEL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_anggota_edit->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t002_anggota_Nama" for="x_Nama" class="<?php echo $t002_anggota_edit->LeftColumnClass ?>"><?php echo $t002_anggota_edit->Nama->caption() ?><?php echo $t002_anggota_edit->Nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_anggota_edit->RightColumnClass ?>"><div <?php echo $t002_anggota_edit->Nama->cellAttributes() ?>>
<span id="el_t002_anggota_Nama">
<input type="text" data-table="t002_anggota" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t002_anggota_edit->Nama->getPlaceHolder()) ?>" value="<?php echo $t002_anggota_edit->Nama->EditValue ?>"<?php echo $t002_anggota_edit->Nama->editAttributes() ?>>
</span>
<?php echo $t002_anggota_edit->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_anggota_edit->Alamat->Visible) { // Alamat ?>
	<div id="r_Alamat" class="form-group row">
		<label id="elh_t002_anggota_Alamat" for="x_Alamat" class="<?php echo $t002_anggota_edit->LeftColumnClass ?>"><?php echo $t002_anggota_edit->Alamat->caption() ?><?php echo $t002_anggota_edit->Alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_anggota_edit->RightColumnClass ?>"><div <?php echo $t002_anggota_edit->Alamat->cellAttributes() ?>>
<span id="el_t002_anggota_Alamat">
<textarea data-table="t002_anggota" data-field="x_Alamat" name="x_Alamat" id="x_Alamat" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t002_anggota_edit->Alamat->getPlaceHolder()) ?>"<?php echo $t002_anggota_edit->Alamat->editAttributes() ?>><?php echo $t002_anggota_edit->Alamat->EditValue ?></textarea>
</span>
<?php echo $t002_anggota_edit->Alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_anggota_edit->NomorHP->Visible) { // NomorHP ?>
	<div id="r_NomorHP" class="form-group row">
		<label id="elh_t002_anggota_NomorHP" for="x_NomorHP" class="<?php echo $t002_anggota_edit->LeftColumnClass ?>"><?php echo $t002_anggota_edit->NomorHP->caption() ?><?php echo $t002_anggota_edit->NomorHP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_anggota_edit->RightColumnClass ?>"><div <?php echo $t002_anggota_edit->NomorHP->cellAttributes() ?>>
<span id="el_t002_anggota_NomorHP">
<input type="text" data-table="t002_anggota" data-field="x_NomorHP" name="x_NomorHP" id="x_NomorHP" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t002_anggota_edit->NomorHP->getPlaceHolder()) ?>" value="<?php echo $t002_anggota_edit->NomorHP->EditValue ?>"<?php echo $t002_anggota_edit->NomorHP->editAttributes() ?>>
</span>
<?php echo $t002_anggota_edit->NomorHP->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t002_anggota" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t002_anggota_edit->id->CurrentValue) ?>">
<?php if (!$t002_anggota_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t002_anggota_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_anggota_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t002_anggota_edit->showPageFooter();
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
$t002_anggota_edit->terminate();
?>