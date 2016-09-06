<?php
namespace Jiangbianwanghai\BankLoan;
class BankLoan 
{
	/**
	 * @var int
	 */
	protected $total = 445000;

	/**
	 * @var float
	 */
	protected $rate = 0.049;

	/**
	 * @var int
	 */
	protected $year = 20;

	/**
	 * @var int
	 */
	protected $rateByMonth = 0;

	public function __construct($total, $rate, $year)
	{
		$this->total = $total;
		$this->rate = $rate;
		$this->year = $year;
		$this->rateByMonth = $this->rate/12;
	}

	/**
	 * average capital plus interest
	 */
	public function getACPI()
	{
		$array = array();
		$monthTotal = $this->year*12;
		for ($i=0; $i < $monthTotal; $i++) { 
			$array[]['interest'] = $this->getInterest($i);
			$array[]['principal'] = $this->getPrincipal($i);
			$array[]['priInt'] = $this->getPriAndInt($i);
		}
		return $array;
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
	public function getInterest($no = 1)
	{
		$result = $this->total*$this->rateByMonth*(bcpow((1+$this->rateByMonth), $this->year*12)-bcpow((1+$this->rateByMonth), ($no-1))/(bcpow((1+$this->rateByMonth), $this->year*12)-1));
		return sprintf("%.2f", $result);
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
	public function getPrincipal($no = 1)
	{
		// 每月本金 = 本金×月利率×(1+月利率)^(还款月序号-1)÷((1+月利率)^还款月数-1))
		$result = ($this->total*$this->rateByMonth*pow((1+$this->rateByMonth), ($no-1)))/(pow((1+$this->rateByMonth), $this->year*12)-1);
		return sprintf("%.2f", $result);
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
	public function getPriAndInt($no = 1)
	{
		//则月供 M=150000X[0.00542X(1+0.00542)240]/[(1+0.00542)240-1]=1118.36.
		$result = $this->total*($this->rateByMonth*pow(1+$this->rateByMonth, 240))/(pow(1+$this->rateByMonth, 240)-1);
		return sprintf("%.2f", $result);
	}
}
