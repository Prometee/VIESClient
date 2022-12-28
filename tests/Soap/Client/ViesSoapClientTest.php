<?php

declare(strict_types=1);

namespace Tests\Prometee\VIESClient\Test\Soap\Client;

use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;
use Prometee\VIESClient\Soap\Client\DeferredViesSoapClient;
use Prometee\VIESClient\Soap\Client\ViesSoapClient;
use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;
use Prometee\VIESClient\Soap\Factory\ViesSoapClientFactory;
use Prometee\VIESClient\Soap\Model\CheckVatApproxRequest;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponse;
use Prometee\VIESClient\Soap\Model\CheckVatRequest;
use Prometee\VIESClient\Soap\Model\CheckVatResponse;
use SoapFault;

class ViesSoapClientTest extends TestCase
{
    /**
     * @dataProvider clientFactory
     */
    public function testCheckVatResponse(ViesSoapClientInterface $viesSoapClient): void
    {
        $vat = ['FR', '12345678987'];
        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber(implode('', $vat));

        $checkVatResponse = $viesSoapClient->checkVat($checkVatRequest);

        $expectedCheckVatResponse = new CheckVatResponse();
        $expectedCheckVatResponse->setCountryCode($vat[0]);
        $expectedCheckVatResponse->setVatNumber('12345678987');
        // Timezone is guessed from my tests, it could be a spanish or italian one also...
        $date = new Datetime('now', new DateTimeZone('Europe/Paris'));
        $expectedCheckVatResponse->setRequestDate($date->format('Y-m-dP'));
        $expectedCheckVatResponse->setValid(false);
        $expectedCheckVatResponse->setName('---');
        $expectedCheckVatResponse->setAddress('---');

        $this->assertEquals($expectedCheckVatResponse, $checkVatResponse);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testCheckVatApprox(ViesSoapClientInterface $viesSoapClient): void
    {
        $vat = ['FR', '12345678987'];
        $checkVatApproxRequest = new CheckVatApproxRequest();
        $checkVatApproxRequest->setFullVatNumber(implode('', $vat));

        $checkVatApproxRequest = $viesSoapClient->checkVatApprox($checkVatApproxRequest);

        $expectedCheckVatApproxResponse = new CheckVatApproxResponse();
        $expectedCheckVatApproxResponse->setCountryCode($vat[0]);
        $expectedCheckVatApproxResponse->setVatNumber('12345678987');
        // Timezone is guessed from my tests, it could be a spanish or italian one also...
        $date = new Datetime('now', new DateTimeZone('Europe/Paris'));
        $expectedCheckVatApproxResponse->setRequestDate($date->format('Y-m-dP'));
        $expectedCheckVatApproxResponse->setValid(false);
        $expectedCheckVatApproxResponse->setTraderName('---');
        $expectedCheckVatApproxResponse->setTraderCompanyType('---');
        $expectedCheckVatApproxResponse->setTraderAddress('---');
        $expectedCheckVatApproxResponse->setRequestIdentifier('');

        $this->assertEquals($expectedCheckVatApproxResponse, $checkVatApproxRequest);
    }

    public function testServerHostFault(): void
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
        $viesSoapClient = new DeferredViesSoapClient($viesSoapClientFactory);

        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber('FR12345678987');

        $this->expectException(SoapFault::class);
        $this->expectExceptionMessage('Couldn\'t load from');
        $viesSoapClient->checkVat($checkVatRequest);
    }

    /**
     * @dataProvider clientFactory
     */
    public function testServerNotFoundFault(ViesSoapClientInterface $viesSoapClient): void
    {
        $wsdl = preg_replace(
            '#wsdl$#',
            'wsdl-test-error',
            ViesSoapClientInterface::WSDL
        );

        $viesSoapClientFactory = new ViesSoapClientFactory(
            ViesSoapClient::class,
            $wsdl
        );
        $viesSoapClient = new DeferredViesSoapClient($viesSoapClientFactory);

        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber('FR12345678987');

        $this->expectException(SoapFault::class);
        $this->expectExceptionMessage('Couldn\'t load from');
        $viesSoapClient->checkVat($checkVatRequest);
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
