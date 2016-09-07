<?php
namespace Jiangbianwanghai\Tests\BankLoan;
use Jiangbianwanghai\BankLoan\BankLoan;
use PHPUnit_Framework_TestCase;
class BankLoanTest extends PHPUnit_Framework_TestCase
{

    protected $bankLoan = '';

    protected function setUp() {
        parent::setUp ();

    }

    protected function tearDown() {
        parent::tearDown ();
    }

    public function __construct() {

    }

    public function testThan5Year()
    {
        $this->bankLoan = new BankLoan(100000, 10);

        $elp = $this->bankLoan->getELP();
        $this->assertEquals(1055.77, $elp['period'][70]['pa']);
        $this->assertEquals(857.66, $elp['period'][70]['pp']);
        $this->assertEquals(198.12, $elp['period'][70]['ip']);
        $this->assertEquals(47660.96, $elp['period'][70]['bo']);

        $epp = $this->bankLoan->getEPP();
        $this->assertEquals(1006.88, $epp['period'][70]['pa']);
        $this->assertEquals(833.33, $epp['period'][70]['pp']);
        $this->assertEquals(173.54, $epp['period'][70]['ip']);
        $this->assertEquals(41666.67, $epp['period'][70]['bo']);
        $this->assertEquals(3.40, $epp['equal']);
        $this->assertEquals(24704.17, $epp['ti']);
        $this->assertEquals(124704.17, $epp['tp']);
    }
}
