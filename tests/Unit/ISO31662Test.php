<?php
declare(strict_types=1);

namespace Seralexs\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Seralexs\Rules\ISO31662;

abstract class ISO31662Test extends TestCase
{
    /**
     * Array of correct state codes, which will be passed to test method.
     * The first parameter is ISO3166 alpha-3 country code.
     * The second parameter is ISO3166-2 state code.
     *
     * @return array
     */
    abstract public function correctStateCodesProvider(): array;


    /**
     * Array of wrong country codes which will be passed to test method.
     * The first parameter is ISO3166 alpha-3 country code.
     * The second parameter is ISO3166-2 state code.
     *
     * @return array
     */
    abstract public function wrongCountryCodesProvider(): array;

    /**
     * Array of wrong state codes which will be passed to test method.
     * The first parameter is ISO3166 alpha-3 country code.
     * The second parameter is ISO3166-2 state code.
     *
     * @return array
     */
    abstract public function wrongStateCodesProvider(): array;

    /**
     * @dataProvider correctStateCodesProvider
     */
    public function test_When_CorrectStateCodesProvided_Then_ValidationPasses(string $countryCode, string $stateCode): void
    {
        $rule = new ISO31662($countryCode);
        $this->assertTrue($rule->passes('state', $stateCode));
    }

    /**
     * @dataProvider wrongStateCodesProvider
     */
    public function test_When_WrongStateCodesProvided_Then_ValidationFails(string $countryCode, mixed $stateCode): void
    {
        $rule = new ISO31662($countryCode);
        $this->assertFalse($rule->passes('state', $stateCode));
    }

    /**
     * @dataProvider wrongCountryCodesProvider
     */
    public function test_When_WrongCountryCodesProvided_Then_ValidationFails(mixed $countryCode, string $stateCode): void
    {
        $rule = new ISO31662($countryCode);
        $this->assertFalse($rule->passes('state', $stateCode));
    }
}