<?php declare(strict_types=1);

    use Rector\Config\RectorConfig;
    use Utils\Rector\SortUseStatementsByLengthRector;

    return static function (RectorConfig $rectorConfig): void {
        $rectorConfig->rule(SortUseStatementsByLengthRector::class);
    };
