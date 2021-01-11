<?php namespace System\Utils;

use PHPUnit\Framework\TestCase;

/**
 * Class SessionTest
 * @package System\Utils
 */
class SessionTest extends TestCase
{
    public function testKeyExists(): void
    {
        $testData = ['newKey' => 'test'];
        $session = new Session($testData);

        $this->assertTrue($session->keyExists('newKey'));
    }

    public function testKeyDoesNotExists(): void
    {
        $testData = ['otherKey' => 'test'];
        $session = new Session($testData);

        $this->assertFalse($session->keyExists('newKey'));
    }

    public function testKeyExistsAfterSetData(): void
    {
        $testData = ['newKey' => 'test'];
        $session = new Session($testData);

        $session->set('anotherKey', 'bla');
        $this->assertTrue($session->keyExists('anotherKey'));
    }

    public function testKeyExistsAfterDeleteData(): void
    {
        $testData = ['newKey' => 'test'];
        $session = new Session($testData);

        $session->delete('newKey');
        $this->assertFalse($session->keyExists('newKey'));
    }
}
