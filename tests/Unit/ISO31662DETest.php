<?php
declare(strict_types=1);

namespace Seralexs\Tests\Unit;

class ISO31662DETest extends ISO31662Test
{
    public function wrongStateCodesProvider(): array
    {
        return [
            ['DEU', 1],
            ['DEU', 1.23],
            ['DEU', -1.23],
            ['DEU', false],
            ['DEU', []],
            ['DEU', new \stdClass()],
            ['DEU', 'false'],
            ['DEU', 'De-BE'],
            ['DEU', 'DE-Be'],
            ['DEU', 'De-Be'],
            ['DEU', 'de-be'],
            ['DEU', 'dE-bE'],
            ['DEU', 'DE-BA'],
            ['DEU', 'DE:BE'],
            ['DEU', '123'],
            ['DEU', 'DE'],
            ['DEU', 'DEU'],
            ['DEU', 'qwerty'],
        ];
    }

    public function correctStateCodesProvider(): array
    {
        return [
            ['DEU', 'DE-BW'],
            ['DEU', 'DE-BY'],
            ['DEU', 'DE-BE'],
            ['DEU', 'DE-BB'],
            ['DEU', 'DE-HB'],
            ['DEU', 'DE-HH'],
            ['DEU', 'DE-HE'],
            ['DEU', 'DE-MV'],
            ['DEU', 'DE-NI'],
            ['DEU', 'DE-NW'],
            ['DEU', 'DE-RP'],
            ['DEU', 'DE-SL'],
            ['DEU', 'DE-SN'],
            ['DEU', 'DE-ST'],
            ['DEU', 'DE-SH'],
            ['DEU', 'DE-TH'],
        ];
    }

    public function wrongCountryCodesProvider(): array
    {
        return [
            [[], 'DE-BW'],
            [false, 'DE-SL'],
            [new \stdClass(), 'DE-TH'],
            [1, 'DE-RP'],
            [1.23, 'DE-RP'],
            [-1.23, 'DE-RP'],
            ['qq', 'DE-NW'],
            ['DEUS', 'DE-SN'],
        ];
    }
}