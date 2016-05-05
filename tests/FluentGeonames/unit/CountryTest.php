<?php

namespace MenaraSolutions\FluentGeonames\Tests;

use MenaraSolutions\FluentGeonames\Collections\MemberCollection;
use MenaraSolutions\FluentGeonames\Country;
use MenaraSolutions\FluentGeonames\Planet;

class CountryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_fetch_states_for_all_countries()
    {
        $planet = new Planet();
        $countries = $planet->getCountries();

        foreach($countries as $country) {
            $states = $country->getStates();
            $this->assertEquals(MemberCollection::class, get_class($states));
            $this->assertTrue(is_array($states) || $states instanceof \ArrayObject);
            $array = $country->toArray();
            $this->assertTrue(is_array($array));
            $this->assertArrayHasKey('code', $array);
            $this->assertArrayHasKey('code_3', $array);
            $this->assertArrayHasKey('short_name', $array);
            $this->assertArrayHasKey('long_name', $array);
        }
    }
}