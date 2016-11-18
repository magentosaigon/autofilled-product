<?php
class Mercuriel_Autofill_Block_Adminhtml_Autofill_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id', $this->getRequest()->getParam('id'))),
            'method'    => 'post',
            'enctype'   => 'multipart/form-data'
        ));
        $form->setUseContainer(true);
        $this->setForm($form);
        if(Mage::getSingleton('adminhtml/session')->getFormData()){
            $data = Mage::getSingleton('adminhtml/session')->getFormData();
            Mage::getSingleton('adminhtml/session')->setFormData(null);
        }
        elseif(Mage::registry('autofill_data')){
            $data = Mage::registry('autofill_data')->getData();
        }
        $fieldset = $form->addFieldset('autofill_form', array(
            'legend' => Mage::helper('mercuriel_autofill')->__('Autofill Set Information')
        ));
        $fieldset->addField('autofill_set_id', 'text', array(
            'label' => Mage::helper('mercuriel_autofill')->__('Autofill Set Id'),
            'class' => 'required-entry',
            'required'  => true,
            'name'      => 'autofill_set_id',
        ));
        $fieldset->addField('attribute_set_id', 'text', array(
            'label' => Mage::helper('mercuriel_autofill')->__('Attribute Set Id'),
            'class' => 'required-entry',
            'required'  => true,
            'name'      => 'attribute_set_id'
        ));
        // for loop here to add the attribute one by one
        $form->setValues($data);
        return parent::_prepareForm(); // TODO: Change the autogenerated stub
    }
}