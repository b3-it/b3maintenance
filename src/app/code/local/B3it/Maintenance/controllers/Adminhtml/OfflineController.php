<?php

/**
 * @category    B3it
 * @package     B3it_Maintenance
 * @copyright   Copyright (c) 2024 B3 IT Systeme GmbH <https://www.b3-it.de>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class B3it_Maintenance_Adminhtml_OfflineController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('report/maintenance')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Report'), Mage::helper('b3it_maintenance')->__('Maintenance'));
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()->renderLayout();
    }
}