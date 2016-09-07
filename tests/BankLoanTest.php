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

    /**
     * test default setting
     */
    public function testThan5Year()
    {
        $this->bankLoan = new BankLoan(['total' => 100000, 'year' => 10]);

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

    /**
     * test $rate
     */
    public function testRate()
    {
        $this->bankLoan = new BankLoan(['total' => 100000, 'year' => 1, 'rate' => 5.60]);

        $elp = $this->bankLoan->getELP();
        $this->assertEquals(8588.27, $elp['period'][7]['pa']);
        $this->assertEquals(8351.68, $elp['period'][7]['pp']);
        $this->assertEquals(236.59, $elp['period'][7]['ip']);
        $this->assertEquals(42346.65, $elp['period'][7]['bo']);

        $epp = $this->bankLoan->getEPP();
        $this->assertEquals(8566.67, $epp['period'][7]['pa']);
        $this->assertEquals(8333.33, $epp['period'][7]['pp']);
        $this->assertEquals(233.33, $epp['period'][7]['ip']);
        $this->assertEquals(41666.67, $epp['period'][7]['bo']);
        $this->assertEquals(38.89, $epp['equal']);
        $this->assertEquals(3033.33, $epp['ti']);
        $this->assertEquals(103033.33, $epp['tp']);
    }

    /**
     * test $ratechangeindex
     */
    public function testRateChangeIndex()
    {
        $this->bankLoan = new BankLoan(['total' => 100000, 'year' => 4, 'ratechangeindex' => 20150301]);

        $elp = $this->bankLoan->getELP();
        $this->assertEquals(2337.06, $elp['period'][7]['pa']);
        $this->assertEquals(1911.95, $elp['period'][7]['pp']);
        $this->assertEquals(425.11, $elp['period'][7]['ip']);
        $this->assertEquals(86806.31, $elp['period'][7]['bo']);

        $epp = $this->bankLoan->getEPP();
        $this->assertEquals(2402.78, $epp['period'][17]['pa']);
        $this->assertEquals(2083.33, $epp['period'][17]['pp']);
        $this->assertEquals(319.44, $epp['period'][17]['ip']);
        $this->assertEquals(64583.33, $epp['period'][17]['bo']);
        $this->assertEquals(9.98, $epp['equal']);
        $this->assertEquals(11739.58, $epp['ti']);
        $this->assertEquals(111739.58, $epp['tp']);
    }
}
