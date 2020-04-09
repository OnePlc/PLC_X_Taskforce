<?php
/**
 * TaskforceTable.php - Taskforce Table
 *
 * Table Model for Taskforce
 *
 * @category Model
 * @package Taskforce
 * @author Verein onePlace
 * @copyright (C) 2020 Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Taskforce\Model;

use Application\Controller\CoreController;
use Application\Model\CoreEntityTable;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Where;
use Laminas\Paginator\Paginator;
use Laminas\Paginator\Adapter\DbSelect;

class TaskforceTable extends CoreEntityTable {

    /**
     * TaskforceTable constructor.
     *
     * @param TableGateway $tableGateway
     * @since 1.0.0
     */
    public function __construct(TableGateway $tableGateway) {
        parent::__construct($tableGateway);

        # Set Single Form Name
        $this->sSingleForm = 'taskforce-single';
    }

    /**
     * Get Taskforce Entity
     *
     * @param int $id
     * @param string $sKey
     * @return mixed
     * @since 1.0.0
     */
    public function getSingle($id,$sKey = 'Taskforce_ID') {
        # Use core function
        return $this->getSingleEntity($id,$sKey);
    }

    /**
     * Save Taskforce Entity
     *
     * @param Taskforce $oTaskforce
     * @return int Taskforce ID
     * @since 1.0.0
     */
    public function saveSingle(Taskforce $oTaskforce) {
        $aDefaultData = [
            'label' => $oTaskforce->label,
        ];

        return $this->saveSingleEntity($oTaskforce,'Taskforce_ID',$aDefaultData);
    }

    /**
     * Generate new single Entity
     *
     * @return Taskforce
     * @since 1.0.0
     */
    public function generateNew() {
        return new Taskforce($this->oTableGateway->getAdapter());
    }
}