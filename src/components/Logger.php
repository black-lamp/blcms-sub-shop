<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\cms\subshop\components;

use yii\base\Object;

use bl\cms\subshop\entities\Log;
use bl\cms\subshop\entities\LogActions;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Logger extends Object
{
    /**
     * Write information about entity to log
     *
     * @param string $entityName entity class name
     * @param integer $entityId entity primary key
     * @param integer $action log action
     * @return bool returns `true` if action was successfully saved
     */
    protected function write($entityName, $entityId, $action)
    {
        $log = new Log([
            'actionId' => $action,
            'entityName' => $entityName,
            'entityId' => $entityId,
            'producedAt' => time()
        ]);

        return $log->insert();
    }

    /**
     * Write 'create' action to log
     *
     * @param string $entityName
     * @param integer $entityId
     * @return bool
     * @see Logger::write()
     */
    public function create($entityName, $entityId)
    {
        return $this->write($entityName, $entityId, LogActions::ACTION_CREATE);
    }

    /**
     * Write 'edit' action to log
     *
     * @param string $entityName
     * @param integer $entityId
     * @return bool
     * @see Logger::write()
     */
    public function edit($entityName, $entityId)
    {
        return $this->write($entityName, $entityId, LogActions::ACTION_EDIT);
    }

    /**
     * Write 'remove' action to log
     *
     * @param string $entityName
     * @param integer $entityId
     * @return bool
     * @see Logger::write()
     */
    public function remove($entityName, $entityId)
    {
        return $this->write($entityName, $entityId, LogActions::ACTION_REMOVE);
    }
}