<?php

declare(strict_types=1);

namespace Tests\Prometee\VIESClient\Helper;

use PHPUnit\Framework\TestCase;
use Prometee\VIESClient\Helper\ViesHelper;
use Prometee\VIESClient\Soap\Client\DeferredViesSoapClient;
use Prometee\VIESClient\Soap\Client\ViesSoapClient;
use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;
use Prometee\VIESClient\Soap\Factory\ViesSoapClientFactory;

class ViesHelperTest extends TestCase
{
    /**
     * @dataProvider clientFactory
     */
    public function testStatusInvalid(): void
    {
        $helper = new ViesHelper(new ViesSoapClient());

        $status = $helper->isValid('0012345678987');

        $expectedStatus = ViesHelper::CHECK_STATUS_INVALID;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusInvalidWebservice(ViesSoapClientInterface $viesSoapClient): void
    {
        $helper = new ViesHelper($viesSoapClient);

        $status = $helper->isValid('FR12345678987');

        $expectedStatus = ViesHelper::CHECK_STATUS_INVALID_WEBSERVICE;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusFormat(ViesSoapClientInterface $viesSoapClient): void
    {
        $soapClient = $viesSoapClient;
        $soapClient->__setLocation(
            preg_replace(
                '#ec\.europa\.eu#',
                'ec.europa.eueu',
                ViesSoapClient::WSDL
            )
        );
        $helper = new ViesHelper($soapClient);

        $status = $helper->isValid('FR12345678987');

        $expectedStatus = ViesHelper::CHECK_STATUS_VALID_FORMAT;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusValid(ViesSoapClientInterface $viesSoapClient): void
    {
        $helper = new ViesHelper($viesSoapClient);

        //VAT number of L'Oreal
        $status = $helper->isValid('FR10632012100');

        $expectedStatus = ViesHelper::CHECK_STATUS_VALID;

        $this->assertEquals($expectedStatus, $status);
    }

    public function clientFactory(): array
    {
        $viesSoapClientFactory = new ViesSoapClientFactory(ViesSoapClient::class);

        return [
            [$viesSoapClientFactory->createNew()],
            [new DeferredViesSoapClient($viesSoapClientFactory)],
        ];
    }
}
