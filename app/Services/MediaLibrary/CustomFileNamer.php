<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Support\FileNamer\FileNamer;

class CustomFileNamer extends FileNamer
{
    public function originalFileName(string $fileName): string
    {
        return pathinfo(\Str::uuid(), PATHINFO_FILENAME);
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        $strippedFileName = pathinfo(\Str::uuid(), PATHINFO_FILENAME);

        return "{$strippedFileName}-{$conversion->getName()}";
    }

    public function responsiveFileName(string $fileName): string
    {
        return pathinfo(\Str::uuid(), PATHINFO_FILENAME);
    }
}
