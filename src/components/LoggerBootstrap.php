<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\cms\subshop\components;

use yii\base\Event;
use yii\base\Application;
use yii\base\BootstrapInterface;

use bl\cms\subshop\base\ShopEventInterface;
use bl\cms\subshop\events\CreateEvent;
use bl\cms\subshop\events\EditEvent;
use bl\cms\subshop\events\RemoveEvent;

/**
 * Bootstrap definition class
 *
 * @property string $logger
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class LoggerBootstrap implements BootstrapInterface
{
    /**
     * @var string [[]]
     */
    public $logger = 'shopLogger';


    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        /** @var Logger $logger */
        $logger = $app->get($this->logger);

        Event::on(
            ShopEventInterface::class,
            CreateEvent::EVENT_SUB_SHOP_CREATE,
            function ($event) use ($logger) {
                $event->entityId = 1;
                /** @var CreateEvent $event */
                $res = $logger->create($event->entityName, $event->entityId);
            }
        );

        Event::on(
            ShopEventInterface::class,
            EditEvent::EVENT_SUB_SHOP_EDIT,
            function ($event) use ($logger) {
                /** @var CreateEvent $event */
                $res = $logger->edit($event->entityName, $event->entityId);
            }
        );

        Event::on(
            ShopEventInterface::class,
            RemoveEvent::EVENT_SUB_SHOP_REMOVE,
            function ($event) use ($logger) {
                /** @var CreateEvent $event */
                $res = $logger->remove($event->entityName, $event->entityId);
            }
        );
    }
}