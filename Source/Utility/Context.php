<?php

namespace FreshAdvance\OxidEventDebugger\Utility;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Transition\Utility\BasicContext;
use Webmozart\PathUtil\Path;

class Context extends BasicContext
{
    /**
     * @return string
     */
    public function getEventsLogFilePath(): string
    {
        return Path::join(Registry::getConfig()->getLogsDir(), 'events.log');
    }
}