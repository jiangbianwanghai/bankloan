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
	public function getInterest($total = 445000, $rate = 0.049, $year = 20, $no = 1)
	{
		$rateByMonth = $rate/12;
		$result = $total*$rateByMonth*(bcpow((1+$rateByMonth), $year*12)-bcpow((1+$rateByMonth), ($no-1))/(bcpow((1+$rateByMonth), $year*12)-1));
		return sprintf("%.2f", $result);
	}

	public function getPrincipal($total = 445000, $rate = 0.049, $year = 20, $no = 1)
	{
		$rateByMonth = $rate/12;
		// 每月本金 = 本金×月利率×(1+月利率)^(还款月序号-1)÷((1+月利率)^还款月数-1))
		$result = ($total*$rateByMonth*pow((1+$rateByMonth), ($no-1)))/(pow((1+$rateByMonth), $year*12)-1);
		return sprintf("%.2f", $result);
	}

	public function getPriAndInt($total = 445000, $rate = 0.049, $year = 20, $no = 1)
	{
		//则月供 M=150000X[0.00542X(1+0.00542)240]/[(1+0.00542)240-1]=1118.36.
		$rateByMonth = $rate/12;
		$result = $total*($rateByMonth*pow(1+$rateByMonth, 240))/(pow(1+$rateByMonth, 240)-1);
		return sprintf("%.2f", $result);
	}
}
