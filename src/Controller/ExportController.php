<?php
/**
 * ExportController.php - Taskforce Export Controller
 *
 * Main Controller for Taskforce Export
 *
 * @category Controller
 * @package Taskforce
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Taskforce\Controller;

use Application\Controller\CoreController;
use Application\Controller\CoreExportController;
use OnePlace\Taskforce\Model\TaskforceTable;
use Laminas\Db\Sql\Where;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\View\Model\ViewModel;


class ExportController extends CoreExportController
{
    /**
     * ApiController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param TaskforceTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,TaskforceTable $oTableGateway,$oServiceManager) {
        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);
    }


    /**
     * Dump Taskforces to excel file
     *
     * @return ViewModel
     * @since 1.0.0
     */
    public function dumpAction() {
        $this->layout('layout/json');

        # Use Default export function
        $aViewData = $this->exportData('Taskforces','taskforce');

        # return data to view (popup)
        return new ViewModel($aViewData);
    }
}