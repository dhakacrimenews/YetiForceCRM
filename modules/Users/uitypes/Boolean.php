<?php

/**
 * UIType Boolean Field Class
 * @package YetiForce.Fields
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Tomasz Kur <t.kur@yetiforce.com>
 */
class Users_Boolean_UIType extends Vtiger_Boolean_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		if ($this->getFieldModel()->getFieldName() === 'is_admin') {
			if ($value === 'on' || $value === 1) {
				return 'on';
			} else {
				return 'off';
			}
		}
		return parent::getDBValue($value, $recordModel);
	}
}
