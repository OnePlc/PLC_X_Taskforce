<?php
/**
 * TaskforceController.php - Main Controller
 *
 * Main Controller Taskforce Module
 *
 * @category Controller
 * @package Taskforce
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

declare(strict_types=1);

namespace OnePlace\Taskforce\Controller;

use Application\Controller\CoreEntityController;
use Application\Model\CoreEntityModel;
use OnePlace\Taskforce\Model\Taskforce;
use OnePlace\Taskforce\Model\TaskforceTable;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;

class TaskforceController extends CoreEntityController {
    /**
     * Taskforce Table Object
     *
     * @since 1.0.0
     */
    protected $oTableGateway;

    /**
     * TaskforceController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param TaskforceTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,TaskforceTable $oTableGateway,$oServiceManager) {
        $this->oTableGateway = $oTableGateway;
        $this->sSingleForm = 'taskforce-single';
        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);

        if($oTableGateway) {
            # Attach TableGateway to Entity Models
            if(!isset(CoreEntityModel::$aEntityTables[$this->sSingleForm])) {
                CoreEntityModel::$aEntityTables[$this->sSingleForm] = $oTableGateway;
            }
        }
    }

    /**
     * Taskforce Index
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function indexAction() {
        # You can just use the default function and customize it via hooks
        # or replace the entire function if you need more customization
        return $this->generateIndexView('taskforce');
    }

    /**
     * Taskforce Add Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function addAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * taskforce-add-before (before show add form)
         * taskforce-add-before-save (before save)
         * taskforce-add-after-save (after save)
         */
        return $this->generateAddView('taskforce');
    }

    /**
     * Taskforce Edit Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function editAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * taskforce-edit-before (before show edit form)
         * taskforce-edit-before-save (before save)
         * taskforce-edit-after-save (after save)
         */
        return $this->generateEditView('taskforce');
    }

    /**
     * Taskforce View Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function viewAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * taskforce-view-before
         */
        return $this->generateViewView('taskforce');
    }
}
