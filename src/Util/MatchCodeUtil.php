<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Util;

class MatchCodeUtil
{
    public const VALID = 1;
    public const INVALID = 2;
    public const NOT_PROCESSED = 3;

    /** @var string[] */
    public static $code_explain = [
        self::VALID => 'VALID',
        self::INVALID => 'INVALID',
        self::NOT_PROCESSED => 'NOT_PROCESSED',
    ];

    public static function explain(string $matchCode): ?string
    {
        if (isset(static::$code_explain[$matchCode])) {
            return static::$code_explain[$matchCode];
        }

        return null;
    }
}
