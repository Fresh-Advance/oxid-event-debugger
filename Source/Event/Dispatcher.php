<?php

namespace FreshAdvance\OxidEventDebugger\Event;


use OxidEsales\EshopCommunity\Internal\Framework\Event\ShopAwareEventDispatcher;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Event;

class Dispatcher extends ShopAwareEventDispatcher
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function dispatch($eventName, Event $event = null)
    {
        $this->logger->debug(
            sprintf('Event triggered - %s', $eventName),
            ['event' => $event]
        );

        parent::dispatch($eventName, $event);
    }
}
