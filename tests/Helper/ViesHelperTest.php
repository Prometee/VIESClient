<?php

declare(strict_types=1);

namespace Tests\Prometee\VIESClient\Helper;

use PHPUnit\Framework\TestCase;
use Prometee\VIESClient\Helper\ViesHelper;
use Prometee\VIESClient\Helper\ViesHelperInterface;
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

        $expectedStatus = ViesHelperInterface::CHECK_STATUS_INVALID;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusInvalidWebservice(ViesSoapClientInterface $viesSoapClient): void
    {
        $helper = new ViesHelper($viesSoapClient);

        $status = $helper->isValid('FR12345678987');

        $expectedStatus = ViesHelperInterface::CHECK_STATUS_INVALID_WEBSERVICE;

        $this->assertEquals($expectedStatus, $status);
    }

    public function testStatusFormat(): void
    {
        $wsdl = preg_replace(
            '#ec\.europa\.eu#',
            'ec.europa.eueu',
            ViesSoapClientInterface::WSDL
        );

        $viesSoapClientFactory = new ViesSoapClientFactory(
            ViesSoapClient::class,
            $wsdl
        );
        $soapClient = new DeferredViesSoapClient($viesSoapClientFactory);

        $helper = new ViesHelper($soapClient);

        $status = $helper->isValid('FR12345678987');

        $expectedStatus = ViesHelperInterface::CHECK_STATUS_VALID_FORMAT;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusValidFR(ViesSoapClientInterface $viesSoapClient): void
    {
        $helper = new ViesHelper($viesSoapClient);

        // L'Oreal VAT number
        $status = $helper->isValid('FR10632012100');

        $expectedStatus = ViesHelperInterface::CHECK_STATUS_VALID;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusValidFormatFR(ViesSoapClientInterface $viesSoapClient): void
    {
        $helper = new ViesHelper($viesSoapClient);

        // Random VAT number
        $status = $helper->isValid('FR12345678987');

        $expectedStatus = ViesHelperInterface::CHECK_STATUS_INVALID_WEBSERVICE;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusValidGB(ViesSoapClientInterface $viesSoapClient): void
    {
        $helper = new ViesHelper($viesSoapClient);

        // Random UK VAT number
        $status = $helper->isValid('GB12345678987');

        $expectedStatus = ViesHelperInterface::CHECK_STATUS_INVALID;

        $this->assertEquals($expectedStatus, $status);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testStatusValidXI(ViesSoapClientInterface $viesSoapClient): void
    {
        $helper = new ViesHelper($viesSoapClient);

        // Random Northern Ireland VAT number
        $status = $helper->isValid('XI12345678987');

        $expectedStatus = ViesHelperInterface::CHECK_STATUS_INVALID_WEBSERVICE;

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
