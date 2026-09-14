<?php

namespace cwreden\Tests\Log;

use cwreden\Log\LoggerAwareComponentTrait;
use PHPUnit\Framework\Attributes\CoversTrait;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

#[CoversTrait(LoggerAwareComponentTrait::class)]
class LoggerAwareComponentTraitTest extends TestCase
{
    private const MESSAGE = 'Test message';
    private const CONTEXT = ['key' => 'value'];

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function logLevels(): array
    {
        return [
            'emergency' => [LogLevel::EMERGENCY, 'testLogEmergency'],
            'alert' => [LogLevel::ALERT, 'testLogAlert'],
            'critical' => [LogLevel::CRITICAL, 'testLogCritical'],
            'error' => [LogLevel::ERROR, 'testLogError'],
            'warning' => [LogLevel::WARNING, 'testLogWarning'],
            'notice' => [LogLevel::NOTICE, 'testLogNotice'],
            'info' => [LogLevel::INFO, 'testLogInfo'],
            'debug' => [LogLevel::DEBUG, 'testLogDebug'],
        ];
    }

    #[DataProvider('logLevels')]
    public function testDelegatesToLoggerWithMatchingLevel(string $level, string $method): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects(self::once())
            ->method('log')
            ->with($level, self::MESSAGE, self::CONTEXT);

        $component = new TestComponent();
        $component->setLogger($logger);

        $component->$method(self::MESSAGE, self::CONTEXT);
    }

    public function testPassesAnEmptyContextByDefault(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects(self::once())
            ->method('log')
            ->with(LogLevel::INFO, self::MESSAGE, []);

        $component = new TestComponent();
        $component->setLogger($logger);

        $component->testLogInfo(self::MESSAGE);
    }

    /**
     * Without a logger the trait has to stay silent instead of failing on a null
     * property. This is the guard in LoggerAwareComponentTrait::log().
     */
    public function testStaysSilentWithoutALogger(): void
    {
        $this->expectNotToPerformAssertions();

        (new TestComponent())->testLogInfo(self::MESSAGE);
    }
}
