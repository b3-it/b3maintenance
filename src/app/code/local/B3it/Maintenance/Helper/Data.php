<?php

/**
 * @category    B3it
 * @package     B3it_Maintenance
 * @copyright   Copyright (c) 2024 B3 IT Systeme GmbH <https://www.b3-it.de>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class B3it_Maintenance_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @var \array[][]
     */
    private static $CONST = [
        "OfflineType" => [
            ["value" => 0, "label" => 'No'],
            ["value" => 1, "label" => 'Yes'],
            ["value" => 2, "label" => 'Scheduled']
        ]
    ];

    /**
     * @param $id integer
     *
     * @return array[]
     */
    public function getConstValues($id)
    {
        $ret = self::$CONST[$id];

        if ($id === "OfflineType") {
            foreach ($ret as &$val) {
                $val["label"] = Mage::helper('b3it_maintenance')->__($val["label"]);
            }
        }

        return $ret;
    }
}
