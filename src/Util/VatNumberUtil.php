<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Util;

class VatNumberUtil
{
    /**
     * Compiled and simplified regexp from js library :
     * @see https://www.braemoor.co.uk/software/vat.shtml
     */
    public const REGEX_PATTERN = '#^([ABCDEFGHILMNPRS][BEGHIKLORSTUVYZ])([ABDEGHIJKLMNPSTUVWXYZ0-9]+)#';

    /**
     * @param string $fullVatNumber
     * @return bool
     */
    public static function check(string $fullVatNumber): bool
    {
        return static::split($fullVatNumber) !== null;
    }

    /**
     * @param string $fullVatNumber
     * @return string[]|null
     */
    public static function split(string $fullVatNumber): ?array
    {
        $fullVatNumber = strtoupper($fullVatNumber);
        if (preg_match(static::REGEX_PATTERN, $fullVatNumber, $matches) === 1) {
            if (count($matches) === 3) {
                return [
                    $matches[1],
                    $matches[2],
                ];
            }
        }

        return null;
    }
}
