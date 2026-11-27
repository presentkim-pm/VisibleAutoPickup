<?php

declare(strict_types=1);

namespace kim\present\visibleautopickup\tests;

use kim\present\visibleautopickup\Main;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\EventPriority;
use pocketmine\utils\Utils;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * The server registers listener methods by reflection, so check that they still match what it accepts
 * and that they run last (HIGHEST), after other plugins changed the drops.
 */
final class MainTest extends TestCase{

    /** @return iterable<string, array{string, class-string<Event>}> */
    public static function handlerProvider() : iterable{
        yield 'block break' => ['onBlockBreakEvent', BlockBreakEvent::class];
        yield 'entity death' => ['onEntityDeathEvent', EntityDeathEvent::class];
    }

    public function testIsListener() : void{
        self::assertTrue(is_subclass_of(Main::class, Listener::class));
    }

    /** @param class-string<Event> $eventClass */
    #[DataProvider('handlerProvider')]
    public function testHandlerSignature(string $method, string $eventClass) : void{
        $reflection = new \ReflectionMethod(Main::class, $method);
        self::assertTrue($reflection->isPublic());
        self::assertSame('void', (string) $reflection->getReturnType());

        $params = $reflection->getParameters();
        self::assertCount(1, $params);
        self::assertSame($eventClass, (string) $params[0]->getType());
    }

    #[DataProvider('handlerProvider')]
    public function testHandlerPriority(string $method, string $eventClass) : void{
        self::assertTrue(is_subclass_of($eventClass, Event::class));
        $notes = Utils::parseDocComment((string) (new \ReflectionMethod(Main::class, $method))->getDocComment());
        self::assertSame('HIGHEST', $notes['priority'] ?? null);
        self::assertSame(EventPriority::HIGHEST, EventPriority::fromString($notes['priority']));
    }
}
