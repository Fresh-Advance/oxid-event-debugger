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
        ob_start();
        debug_print_backtrace();
        $backtrace = preg_replace("@^#@msi", "        #", ob_get_clean());

        $this->logger->debug(
            sprintf("\n    %s\n%s", $eventName, $backtrace)
        );

        parent::dispatch($eventName, $event);
    }
}
