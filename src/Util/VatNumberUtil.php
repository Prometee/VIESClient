<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Util;

class VatNumberUtil
{
    public const EUROPEAN_UNION_COUNTRIES = [
        'AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI',
        'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU',
        'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE',
        'GB',
    ];

    /**
     * Compiled and simplified regexp from a js library :
     * @see https://www.braemoor.co.uk/software/vat.shtml
     */
    public const REGEX_PATTERN = '#^(%EUROPEAN_UNION_COUNTRIES%)([ABDEGHIJKLMNPSTUVWXYZ0-9]+)#';

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
        $fullVatNumber = static::clean($fullVatNumber);
        $regexp = str_replace(
            '%EUROPEAN_UNION_COUNTRIES%',
            implode('|', static::EUROPEAN_UNION_COUNTRIES),
            static::REGEX_PATTERN
        );
        if (preg_match($regexp, $fullVatNumber, $matches) === 1) {
            if (count($matches) === 3) {
                return [
                    $matches[1],
                    $matches[2],
                ];
            }
        }

        return null;
    }

    public static function clean(string $fullVatNumber): string
    {
        $fullVatNumber = strtoupper($fullVatNumber);
        $fullVatNumber = preg_replace('#[^A-Z0-9]#', '', $fullVatNumber);
        return $fullVatNumber;
    }
}
