<?php
namespace Jiangbianwanghai\Tests\BankLoan;
use Jiangbianwanghai\BankLoan\BankLoan;
use PHPUnit_Framework_TestCase;
class BankLoanTest extends PHPUnit_Framework_TestCase
{
    
    protected $bankLoan = '';

    protected function setUp() {
        parent::setUp ();
        $this->bankLoan = new BankLoan(10000, 0.0435, 1);
    }

    protected function tearDown() {
        parent::tearDown ();
    }

    public function __construct() {

    }

    public function testGetInterest() {
        $this->assertEquals(362.50, $this->bankLoan->getInterest());
    }

    /**
    public function testGetPrincipal() {
        $this->assertEquals(8168.49, $this->bankLoan->getPrincipal());
    }

    public function testGetPriAndInt() {
        $this->assertEquals(8530.99, $this->bankLoan->getPriAndInt());
    }*/

    /*public function testGetACPI()
    {
        var_dump($this->bankLoan->getACPI());
    }*/
}
