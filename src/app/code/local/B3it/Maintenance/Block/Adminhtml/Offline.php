<?php

/**
 * @category    B3it
 * @package     B3it_Maintenance
 * @copyright   Copyright (c) 2024 B3 IT Systeme GmbH <https://www.b3-it.de>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class B3it_Maintenance_Block_Adminhtml_Offline extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_offline';
        $this->_blockGroup = 'maintenance';
        $this->_headerText = Mage::helper('b3it_maintenance')->__('Store Offline');

        parent::__construct();
        $this->removeButton('add');
    }
}