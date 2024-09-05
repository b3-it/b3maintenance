<?php

/**
 * @category    B3it
 * @package     B3it_Maintenance
 * @copyright   Copyright (c) 2024 B3 IT Systeme GmbH <https://www.b3-it.de>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class B3it_Maintenance_Block_Adminhtml_Offline_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('maintenance');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('maintenance/offline')->getCollection();
        $expr = new Zend_Db_Expr('datediff(on_time,off_time)');
        $exprH = new Zend_Db_Expr('hour(timediff(on_time,off_time))');
        $collection->getSelect()->columns(array('duration' => $expr));
        $collection->getSelect()->columns(array('dhours' => $exprH));

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', [
            'header' => Mage::helper('b3it_maintenance')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'id',
        ]);

        $this->addColumn('website', [
            'header' => Mage::helper('b3it_maintenance')->__('Website'),
            'align' => 'left',
            'index' => 'website',
            'width' => '50px',
        ]);

        $this->addColumn('store', [
            'header' => Mage::helper('b3it_maintenance')->__('Store'),
            'align' => 'left',
            'index' => 'store',
            'width' => '50px',
        ]);

        $this->addColumn('off_time', [
            'header' => Mage::helper('b3it_maintenance')->__('Off Time'),
            'align' => 'left',
            'index' => 'off_time',
            'width' => '150px',
        ]);

        $this->addColumn('on_time', [
            'header' => Mage::helper('b3it_maintenance')->__('On Time'),
            'align' => 'left',
            'index' => 'on_time',
            'width' => '150px',
        ]);

        $this->addColumn('dhours', [
            'header' => Mage::helper('b3it_maintenance')->__('Duration Hours'),
            'align' => 'left',
            'index' => 'dhours',
            'width' => '150px',
        ]);

        $this->addColumn('duration', [
            'header' => Mage::helper('b3it_maintenance')->__('Duration Days'),
            'align' => 'left',
            'index' => 'duration',
            'width' => '150px',
        ]);

        $this->addColumn('user', [
            'header' => Mage::helper('b3it_maintenance')->__('User'),
            'align' => 'left',
            'index' => 'user',
            'width' => '150px',
        ]);

        return parent::_prepareColumns();
    }
}