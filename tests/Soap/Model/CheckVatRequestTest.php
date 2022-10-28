<?php

declare(strict_types=1);

namespace Tests\Prometee\VIESClient\Test\Soap\Model;

use PHPUnit\Framework\TestCase;
use Prometee\VIESClient\Soap\Model\CheckVatRequest;

class CheckVatRequestTest extends TestCase
{
    public function testHasWrongChar(): void
    {
        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber('   #FR\! @ 123456789\! @ 87   ');

        $this->assertEquals('FR12345678987', $checkVatRequest->getFullVatNumber());
    }
}
