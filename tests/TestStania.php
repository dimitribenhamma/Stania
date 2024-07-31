<?php
use PHPUnit\Framework\TestCase;

require_once 'C:\ProgramData\Jenkins\.jenkins\workspace\MonPremierJob\php\components\footer.php';

class TestStania extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
		$number = new Telephone();
        $this->assertEquals("+33 6 31 85 79 07", $number->getTelephone());

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}
?>
