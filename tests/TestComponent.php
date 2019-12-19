<?php

namespace cwreden\Tests\Log;

use cwreden\Log\LoggerAwareComponentTrait;

class TestComponent
{
    use LoggerAwareComponentTrait;

    public function testLogEmergency($message, array $context = [])
    {
        $this->logEmergency($message, $context);
    }

    public function testLogAlert($message, array $context = [])
    {
        $this->logAlert($message, $context);
    }

    public function testLogCritical($message, array $context = [])
    {
        $this->logCritical($message, $context);
    }

    public function testLogError($message, array $context = [])
    {
        $this->logError($message, $context);
    }

    public function testLogWarning($message, array $context = [])
    {
        $this->logWarning($message, $context);
    }

    public function testLogNotice($message, array $context = [])
    {
        $this->logNotice($message, $context);
    }

    public function testLogInfo($message, array $context = [])
    {
        $this->logInfo($message, $context);
    }

    public function testLogDebug($message, array $context = [])
    {
        $this->logDebug($message, $context);
    }
}
