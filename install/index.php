<?
IncludeModuleLangFile(__FILE__);
Class s1citil extends CModule
{
	const MODULE_ID = 'module_name';
	var $MODULE_ID = 'module_name'; 
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $strError = '';

	function __construct() {
		$arModuleVersion = array();
		include(dirname(__FILE__)."/version.php");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = GetMessage("MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("MODULE_DESC");

		$this->PARTNER_NAME = GetMessage("PARTNER_NAME");
		$this->PARTNER_URI = GetMessage("PARTNER_URI");
	}

	function InstallDB($arParams = array()) {
		return true;
	}

	function UnInstallDB($arParams = array()) {
		return true;
	}

	function InstallFiles($arParams = array()) {
		CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.self::MODULE_ID.'/install/components/', $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		return true;
	}

	function UnInstallFiles() {
		return true;
	}

	function DoInstall() {
		global $APPLICATION;
		$this->InstallFiles();
		$this->InstallDB();
		RegisterModule(self::MODULE_ID);
	}

	function DoUninstall() {
		global $APPLICATION;
		UnRegisterModule(self::MODULE_ID);
		$this->UnInstallDB();
		$this->UnInstallFiles();
	}
}
?>
