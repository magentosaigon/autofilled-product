<?php
class Mercuriel_Autofill_Model_Resource_AutofillValue extends Mage_Core_Model_Resource_Db_Abstract{
    public function _construct()
    {
       $this->_init('mercuriel_autofill/autofill_value','autofill_value_id');
    }
}