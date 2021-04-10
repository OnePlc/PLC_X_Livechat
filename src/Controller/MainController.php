<?php
/**
 * MainController.php - Main Controller
 *
 * Task Controller Faucet Module
 *
 * @category Controller
 * @package Livechat
 * @author Verein onePlace
 * @copyright (C) 2021  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

declare(strict_types=1);

namespace OnePlace\Livechat\Controller;

use Application\Controller\CoreEntityController;
use Application\Model\CoreEntityModel;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Where;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Http\ClientStatic;

class MainController extends CoreEntityController
{
    /**
     * Faucet Table Object
     *
     * @since 1.0.0
     */
    protected $oTableGateway;

    /**
     * MainController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param FaucetTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,\OnePlace\User\Model\UserTable $oTableGateway,$oServiceManager)
    {
        $this->oTableGateway = $oTableGateway;
        $this->sSingleForm = 'livechat-single';

        if(isset(CoreEntityController::$oSession->oUser)) {
            setlocale(LC_TIME, CoreEntityController::$oSession->oUser->lang);
        }

        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);

        if($oTableGateway) {
            # Attach TableGateway to Entity Models
            if(!isset(CoreEntityModel::$aEntityTables[$this->sSingleForm])) {
                CoreEntityModel::$aEntityTables[$this->sSingleForm] = $oTableGateway;
            }
        }
    }

    /**
     * Chat Index
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $this->setThemeBasedLayout('layout/json');

        echo 'Chat initialized';

        return false;
    }
}
