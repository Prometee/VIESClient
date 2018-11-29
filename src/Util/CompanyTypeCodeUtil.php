<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Util;

class CompanyTypeCodeUtil
{
    public const REGEX_PATTERN = '#[A-Z]{2}\-[1-9][0-9]?#';

    /**
     * @param string $companyTypeCode
     * @return bool
     */
    public static function check(string $companyTypeCode): bool
    {
        return preg_match(static::REGEX_PATTERN, $companyTypeCode) === 1 || $companyTypeCode == '---';
    }
}
