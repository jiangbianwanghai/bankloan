<?php
namespace Jiangbianwanghai\Tests\BankLoan;
use Jiangbianwanghai\BankLoan\BankLoan;
use PHPUnit_Framework_TestCase;
class BankLoanTest extends PHPUnit_Framework_TestCase
{
    
    protected $bankLoan = '';

    protected function setUp() {
        parent::setUp ();
        $this->bankLoan = new BankLoan();
    }

    protected function tearDown() {
        parent::tearDown ();
    }

    public function __construct() {

    }

    public function testSum() {
        $this->assertEquals(4,$this->bankLoan->sum(2,2));
    }

    public function testSubstract() {
        $this->assertNotEquals(3,$this->bankLoan->subtract(1,1));
    }
    public function testGetInterest() {
        $this->assertEquals(1817.08,$this->bankLoan->getInterest());
    }
    public function testGetPrincipal() {
        $this->assertEquals(1095.19,$this->bankLoan->getPrincipal());
    }
    public function testGetPriAndInt() {
        $this->assertEquals(2912.28,$this->bankLoan->getPriAndInt());
    }
}
