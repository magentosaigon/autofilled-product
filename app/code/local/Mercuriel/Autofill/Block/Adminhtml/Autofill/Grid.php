<?php
class Mercuriel_Autofill_Block_Adminhtml_Autofill_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
        $this->setId('autofillGrid');
        $this->setDefaultSort('autofill_group_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }
    public function _prepareColumns()
    {
        $this->addColumn('autofill_group_id', array(
            'header'    => Mage::helper('mercuriel_autofill')->__('Autofill Group ID'),
            'width'     => '50px',
            'index'     => 'autofill_group_id',
            'sortable'  => 'true'
        ));
        $this->addColumn('attribute_group_id', array(
            'header'    => Mage::helper('mercuriel_autofill')->__('Attribute Group ID'),
            'width'     => '50px',
            'index'     => 'attribute_group_id',
            'sortable'  => 'true'
        ));


        return parent::_prepareColumns(); // TODO: Change the autogenerated stub
    }
    public function _prepareCollection()
    {
        $collection = Mage::getResourceModel('mercuriel_autofill/autofillGroup_collection');
        $collection->joinAttribute('attribute_set_id', 'eav/attribute');
        $this->setCollection($collection);
        return parent::_prepareCollection(); // TODO: Change the autogenerated stub
    }
    public function _prepareMassaction()
    {
        $this->setMassactionIdField('autofill_group_id');
        $this->getMassactionBlock()->setFormFieldName('autofill');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'     => Mage::helper('mercuriel_autofill')->__('Delete'),
            'url'       => $this->getUrl('*/*/massDelete'),
            'confirm'   => Mage::helper('mercuriel_autofill')->__('Are you sure?')
        ));
        return parent::_prepareMassaction(); // TODO: Change the autogenerated stub
    }
    public function getRowUrl($item)
    {
        return $this->geturl('*/*/edit', array('id' => $item->getAutofillSetId())); // TODO: Change the autogenerated stub
    }
}