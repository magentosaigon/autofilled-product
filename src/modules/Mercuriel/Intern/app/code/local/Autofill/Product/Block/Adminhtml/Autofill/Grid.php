<?php
/**
 * Created by Phong Phan.
 * Copyright Mercuriel - 2016
 * Date: 06/11/2016
 * Time: 01:08
 */
class Autofill_Product_Block_Adminhtml_Autofill_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('autofillId');

        $this->setDefaultSort('id');

        $this->setDefaultDir('DESC');

        $this->setSaveParametersInSession(true);
    }
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('autofill_product/autofill')->getCollection();
        $collection->getSelect()->group("attribute_set_name");
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
                'header' => Mage::helper('autofill_product')->__('Id'),
                'width' => 50,
                'index' => 'id',
                'sortable' => false,
            )
        );
        $this->addColumn('name', array(
                'header' => Mage::helper('autofill_product')->__('Name'),
                'width' => 50,
                'index' => 'name',
                'sortable' => false,
            )
        );
        $this->addColumn('attribute_set_name', array(
                'header' => Mage::helper('autofill_product')->__('Attr.Set Name'),
                'width' => 50,
                'index' => 'attribute_set_name',
                'sortable' => false,
            )
        );
        return parent::_prepareColumns();
    }

}