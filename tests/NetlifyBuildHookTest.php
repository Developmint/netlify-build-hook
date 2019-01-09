<?php

namespace Developmint\NetlifyBuildHook\Test;

use Developmint\NetlifyBuildHook\NetlifyBuildHook;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;

class NetlifyBuildHookTest extends TestCase
{

    public function testItThrowExceptionOnNonExistingHook()
    {
        $this->expectException(RequestException::class);
        $nonExistingId = 'XXX';
        $hook = new NetlifyBuildHook(new Client(), $nonExistingId);
        $hook->trigger();
    }
}
