<?php

declare(strict_types=1);

namespace Tests\Prometee\VIESClient\Helper;

use PHPUnit\Framework\TestCase;
use Prometee\VIESClient\Helper\ViesHelper;
use Prometee\VIESClient\Soap\Client\ViesSoapClient;

class ViesHelperTest extends TestCase
{
    /** @test */
    public function statusInvalid()
    {
        $helper = new ViesHelper(new ViesSoapClient());

        $status = $helper->isValid('0012345678987');

        $expectedStatus = ViesHelper::CHECK_STATUS_INVALID;

        $this->assertEquals($expectedStatus, $status);
    }

    /** @test */
    public function statusInvalidWebservice()
    {
        $helper = new ViesHelper(new ViesSoapClient());

        $status = $helper->isValid('FR12345678987');

        $expectedStatus = ViesHelper::CHECK_STATUS_INVALID_WEBSERVICE;

        $this->assertEquals($expectedStatus, $status);
    }

    /** @test */
    public function statusFormat()
    {
        $soapClient = new ViesSoapClient();
        $soapClient->setLocation(
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

    public function statusValid()
    {
        $helper = new ViesHelper(new ViesSoapClient());

        //VAT number of L'Oreal
        $status = $helper->isValid('FR10632012100');

        $expectedStatus = ViesHelper::CHECK_STATUS_VALID;

        $this->assertEquals($expectedStatus, $status);
    }
}
