<?php
//use Jiangbianwanghai\BankLoan;
require_once './src/BankLoan.php';
class BankLoanTest extends \PHPUnit_Framework_TestCase
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
}
