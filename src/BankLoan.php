<?php
namespace Jiangbianwanghai\BankLoan;
class BankLoan 
{
    public function sum($a, $b) {
        return $a + $b;
    }

    public function subtract($a, $b) {
        return $a - $b;
    }

    /**
	 * get interest by month
	 *
	 * author jiangbianwanghai <webmaster@jiangbianwanghai.com>
	 *
	 * @param $total Loan principal
	 * @param $rate The interest rate of the people's bank of China
	 * @param $year The loan period
	 * @param $no Reimbursement of the serial number
	 * @since v2.0
	 */
	function getInterest($total = 445000, $rate = 0.049, $year = 20, $no = 1)
	{
		$rateByMonth = $rate/12;
		$result = $total*$rateByMonth*(bcpow((1+$rateByMonth), $year*12)-bcpow((1+$rateByMonth), ($no-1))/(bcpow((1+$rateByMonth), $year*12)-1));
		return $result;
	}
}
