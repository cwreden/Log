<?php

namespace cwreden\Tests\Log;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use Psr\Log\NullLogger;

class LoggerAwareComponentTraitTest extends TestCase
{
    public function testCanLogEmergency()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::EMERGENCY, 'Test emergency');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogEmergency('Test emergency');
    }

    public function testCanLogAlert()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::ALERT, 'Test alert');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogAlert('Test alert');
    }

    public function testCanLogCritical()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::CRITICAL, 'Test critical');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogCritical('Test critical');
    }

    public function testCanLogError()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::ERROR, 'Test error');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogError('Test error');
    }

    public function testCanLogWarning()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::WARNING, 'Test warning');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogWarning('Test warning');
    }

    public function testCanLogNotice()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::NOTICE, 'Test notice');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogNotice('Test notice');
    }

    public function testCanLogInfo()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::INFO, 'Test info');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogInfo('Test info');
    }

    public function testCanLogDebug()
    {
        $loggerMock = $this->getMockBuilder(NullLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LogLevel::DEBUG, 'Test debug');

        $component = new TestComponent();
        $component->setLogger($loggerMock);

        $component->testLogDebug('Test debug');
    }
}
