<?php
namespace Jiangbianwanghai\Tests\BankLoan;
use Jiangbianwanghai\BankLoan\BankLoan;
use PHPUnit_Framework_TestCase;
class BankLoanTest extends PHPUnit_Framework_TestCase
{
    
    protected $bankLoan = '';

    protected function setUp() {
        parent::setUp ();
        $this->bankLoan = new BankLoan(100000, 0.0435, 1);
        $this->bankLoan2 = new BankLoan(445000, 0.049, 20);
    }

    protected function tearDown() {
        parent::tearDown ();
    }

    public function __construct() {

    }

    public function testGetACPI()
    {
        $acpi = $this->bankLoan->getACPI();
        $this->assertEquals(61.51, $acpi[11]['interest']);
        $acpi2 = $this->bankLoan2->getACPI();
        $this->assertEquals(1837.60, $acpi2[128]['principal']);
    }
}
