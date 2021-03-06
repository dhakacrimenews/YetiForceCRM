<?php
/**
 * OSSSoldServices CRMEntity class
 * @package YetiForce.CRMEntity
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
include_once 'modules/Vtiger/CRMEntity.php';

class OSSSoldServices extends Vtiger_CRMEntity
{

	public $table_name = 'vtiger_osssoldservices';
	public $table_index = 'osssoldservicesid';
	public $column_fields = [];
	protected $lockFields = ['ssservicesstatus' => ['PLL_ACCEPTED', 'PLL_CANCELLED']];

	/** Indicator if this is a custom module or standard module */
	public $IsCustomModule = true;

	/**
	 * Mandatory table for supporting custom fields.
	 */
	public $customFieldTable = ['vtiger_osssoldservicescf', 'osssoldservicesid'];

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	public $tab_name = ['vtiger_crmentity', 'vtiger_osssoldservices', 'vtiger_osssoldservicescf'];

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	public $tab_name_index = [
		'vtiger_crmentity' => 'crmid',
		'vtiger_osssoldservices' => 'osssoldservicesid',
		'vtiger_osssoldservicescf' => 'osssoldservicesid'];

	/**
	 * Mandatory for Listing (Related listview)
	 */
	public $list_fields = [
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Product Name' => ['ossoutsourcedservices' => 'productname'],
		'Category' => ['ossoutsourcedservices' => 'pscategory'],
		'Sub Category' => ['ossoutsourcedservices' => 'pssubcategory'],
		'Assigned To' => ['crmentity', 'smownerid'],
		'Date Sold' => ['ossoutsourcedservices' => 'datesold'],
		'LBL_ssservicesstatus' => ['ossoutsourcedservices' => 'ssservicesstatus'],
	];
	public $list_fields_name = [
		/* Format: Field Label => fieldname */
		'Product Name' => 'productname',
		'Category' => 'pscategory',
		'Assigned To' => 'assigned_user_id',
		'Date Sold' => 'datesold',
		'LBL_ssservicesstatus' => 'ssservicesstatus',
	];

	/**
	 * @var string[] List of fields in the RelationListView
	 */
	public $relationFields = ['productname', 'pscategory', 'assigned_user_id', 'datesold', 'ssservicesstatus'];
	// Make the field link to detail view from list view (Fieldname)
	public $list_link_field = 'productname';
	// For Popup listview and UI type support
	public $search_fields = [
		'Product Name' => ['ossoutsourcedservices' => 'productname'],
		'Category' => ['ossoutsourcedservices' => 'pscategory'],
		'Sub Category' => ['ossoutsourcedservices' => 'pssubcategory'],
		'Assigned To' => ['crmentity', 'smownerid'],
		'Date Sold' => ['ossoutsourcedservices' => 'datesold'],
		'LBL_ssservicesstatus' => ['ossoutsourcedservices' => 'ssservicesstatus'],
	];
	public $search_fields_name = [
		'Product Name' => 'productname',
		'Category' => 'pscategory',
		'Sub Category' => 'pssubcategory',
		'Assigned To' => 'assigned_user_id',
		'Date Sold' => 'datesold',
		'LBL_ssservicesstatus' => 'ssservicesstatus',
	];
	// For Popup window record selection
	public $popup_fields = ['productname'];
	// For Alphabetical search
	public $def_basicsearch_col = 'productname';
	// Column value to use on detail view record text display
	public $def_detailview_recname = 'productname';
	// Required Information for enabling Import feature
	public $required_fields = ['productname' => 1];
	// Callback function list during Importing
	public $special_functions = ['set_import_assigned_user'];
	public $default_order_by = '';
	public $default_sort_order = 'ASC';
	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	public $mandatory_fields = ['createdtime', 'modifiedtime', 'productname'];

	/**
	 * Invoked when special actions are performed on the module.
	 * @param String Module name
	 * @param String Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	public function moduleHandler($modulename, $event_type)
	{
		if ($event_type == 'module.postinstall') {
			\App\Fields\RecordNumber::setNumber($modulename, 'US', '1');
		} else if ($event_type == 'module.disabled') {

		} else if ($event_type == 'module.enabled') {

		} else if ($event_type == 'module.preuninstall') {

		} else if ($event_type == 'module.preupdate') {

		} else if ($event_type == 'module.postupdate') {

		}
	}
}
