<?php
namespace bl\cms\subshop\components;

use yii\base\Application;
use yii\base\BootstrapInterface;

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
     * @var string [[Logger]] component ID
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

        $app->on(CreateEvent::class, function ($event) use ($logger) {
            /** @var CreateEvent $event */
            $logger->create($event->entityName, $event->entityId);
        });

        $app->on(EditEvent::class, function ($event) use ($logger) {
            /** @var EditEvent $event */
            $logger->edit($event->entityName, $event->entityId);
        });

        $app->on(RemoveEvent::class, function ($event) use ($logger) {
            /** @var RemoveEvent $event */
            $logger->remove($event->entityName, $event->entityId);
        });
    }
}