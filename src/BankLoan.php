<?php
namespace Jiangbianwanghai\BankLoan;
class BankLoan 
{
	/**
	 * @var int
	 */
	protected $total = 100000;

	/**
	 * @var float
	 */
	protected $rate = 0.0435;

	/**
	 * @var int
	 */
	protected $year = 1;

	/**
	 * @var int
	 */
	protected $rateByMonth = 0;

	public function __construct($total, $rate, $year)
	{
		!empty($total) && $this->total = $total;
		!empty($rate) && $this->rate = $rate;
		!empty($year) && $this->year = $year;
		$this->rateByMonth = $this->rate/12;
	}

	/**
	 * 等额本息
	 *
	 * 等额本息的计算公式是：
	 * a=F*i(1+i)^n/[(1+i)^n-1]
	 * a:月供;
	 * F:贷款总额;
	 * i:贷款月利率=年利率/12；
	 * n：还款月数
	 * ^：次方。
	 * 利息和本金的计算方法是：首先依据上面的公式计算每月还款额，再根据还款时间计算每月的利息和本金。
	 * 举例说明，比如贷款50万，时间20年，利率5.9%，每月的还款额计算为：3553.37元。
	 * 第一个月：利息=500000×5.9%/12= 2458.33元，本金=3553.37-2458.33=1095.04元；
	 * 第二个月：利息=（500000-1095.04）×5.9%/12=2452.95元，本金=3553.37-2452.95=1100.42元；
	 * 第三个月：利息（500000-1095.04-1100.42）×5.9%/12=2447.54，本金=3557.37-2447.54=1109.83；
	 */
	public function getACPI()
	{
		$output = [];
		//计算出每月偿还的本息
		$priAndInt = $this->total*($this->rateByMonth*pow(1+$this->rateByMonth, $this->year*12))/(pow(1+$this->rateByMonth, $this->year*12)-1);
		$monthTotal = $this->year*12;
		$total = $this->total;
		$principal = 0;
		for ($i=1; $i <= $monthTotal; $i++) {
			$total = $total - $principal;
			//偿还本息
			$output[$i]['priandint'] = sprintf("%.2f", $priAndInt);
			//偿还利息
			$interest = $total*$this->rateByMonth;
			$output[$i]['interest'] = sprintf("%.2f", $interest);
			//偿还本金
			$principal = $priAndInt - $interest;
			$output[$i]['principal'] = sprintf("%.2f", $principal);
			//剩余本金
			$array[$i]['lesstotal'] = sprintf("%.2f", $total-$principal);
		}
		return $output;
	}
}
