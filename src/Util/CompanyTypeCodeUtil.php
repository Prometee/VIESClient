<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Util;

class CompanyTypeCodeUtil
{
    public const REGEX_PATTERN = '#[A-Z]{2}\-[1-9][0-9]?#';

    public static function check(string $companyTypeCode): bool
    {
        return 1 === preg_match(static::REGEX_PATTERN, $companyTypeCode) || '---' == $companyTypeCode;
    }
}
