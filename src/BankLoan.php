<?php
/**
 * Amortization Schedule Calculator
 */
namespace Jiangbianwanghai\BankLoan;
class BankLoan
{
	/**
	 * @var int
	 */
	protected $total = 100000;

	/**
	 * @var int
	 */
	protected $year = 1;

	/**
	 * @var float
	 */
	protected $rate = 0;

	/**
	 * @var int
	 */
	protected $ratechangeindex = 0;

	/**
	 * @var int
	 */
	protected $bank = 'PBC'; // The people's bank of China

	/**
	 * @var int
	 */
	private $_monthlyRate = 0;

	/**
	 * @var int
	 */
	private $_interestPartTemp = 0;

	/**
	 * init param
	 *
	 * @param int $config['total']
	 * @param int $config['year']
	 * @param int $config['rate']
	 * @param int $config['ratechangeindex']
	 *
	 */
	public function __construct($config)
	{
		if (isset($config['total']) && !empty($config['total'])) {
			$this->total = $config['total'];
		}
		if (isset($config['year']) && !empty($config['year'])) {
			$this->year = $config['year'];
		}
		if (isset($config['ratechangeindex']) && !empty($config['ratechangeindex'])) {
			$this->ratechangeindex = $config['ratechangeindex'];
		}
		if (isset($config['rate']) && !empty($config['rate'])) {
			$this->rate = $config['rate']/100;
		} else {
			$this->_getRate();
		}
		$this->_monthlyRate = $this->rate/12;
		$this->period = $this->year*12;
	}

	/**
	 * Equal Loan Payments
	 *
	 * @return array
	 *
	 */
	public function getELP()
	{
		$output = [];
		$paymentAmount = $this->total*($this->_monthlyRate*pow(1+$this->_monthlyRate, $this->year*12))/(pow(1+$this->_monthlyRate, $this->year*12)-1); // Payment Amount
		$total = $this->total;
		$initPrincipalPart = 0; // Init Prncipal Part
		for ($i=1; $i <= $this->period; $i++) {
			$total = $total - $initPrincipalPart;
			$interestPart = $total*$this->_monthlyRate;
			$output['period'][$i]['ip'] = sprintf("%.2f", $interestPart); // Interest Part
			$output['period'][$i]['pa'] = sprintf("%.2f", $paymentAmount); // Payment Amount
			$principal = $initPrincipalPart = $paymentAmount - $interestPart;
			$output['period'][$i]['pp'] = sprintf("%.2f", $principal); // Principal Part
			$output['period'][$i]['bo'] = sprintf("%.2f", abs($total-$principal)); // Banlance Owed
		}
		return $output;
	}

	/**
	 * Equal Principal Payments
	 *
	 * @return array
	 *
	 */
	public function getEPP()
	{
		$output = [];
		$principalPart = $this->total/($this->year*12); // Principal Part
		$totalInterest = 0;
		$total = $this->total;
		$equalAll = $equalItem = 0;
		for ($i=1; $i <= $this->period; $i++) {
			if ($i > 1)
				$total = $total - $principalPart;
			$interestPart = $total*$this->_monthlyRate;
			$totalInterest += $interestPart;
			$output['period'][$i]['ip'] = sprintf("%.2f", $interestPart); // Interest Part
			$output['period'][$i]['pp'] = sprintf("%.2f", $principalPart); // Principal Part
			$output['period'][$i]['pa'] = sprintf("%.2f", $principalPart+$interestPart); // Payment Amount
			$output['period'][$i]['bo'] = sprintf("%.2f", $total - $principalPart); // Balance Owed
			$i > 1 && $equalItem = $this->_interestPartTemp - $interestPart;
			$this->_interestPartTemp = $interestPart;
			$equalAll += $equalItem;
		}
		$output['ti'] = sprintf("%.2f", $totalInterest); // Total Interest
		$output['tp'] = sprintf("%.2f", $this->total+$totalInterest); // Total Payments
		$output['equal'] = sprintf("%.2f", $equalAll/($this->year*12 - 1));
		return $output;
	}

	/**
	 * Get ank rate
	 */
	private function _getRate()
	{
		$config = [
			'PBC' => [
				'20141122' => ['5.60', '5.60', '6.00', '6.00', '6.15'],
				'20150301' => ['5.35', '5.35', '5.75', '5.75', '5.90'],
				'20150511' => ['5.10', '5.10', '5.50', '5.50', '5.65'],
				'20150628' => ['4.85', '4.85', '5.25', '5.25', '5.40'],
				'20150826' => ['4.60', '4.60', '5.00', '5.00', '5.15'],
				'20151024' => ['4.35', '4.35', '4.75', '4.75', '4.90']
			]
		];
		if ($this->ratechangeindex) {
			if (isset($config[$this->bank][$this->ratechangeindex])) {
				$currConfig = $config[$this->bank][$this->ratechangeindex];
			}
		} else {
			$currConfig = end($config[$this->bank]);
		}

		if (empty($this->rate)) {
			if ($this->year <= 0.6) {
				$rate = $currConfig[0];
			} elseif ($this->year <= 1) {
				$rate = $currConfig[1];
			} elseif ($this->year <= 3) {
				$rate = $currConfig[2];
			} elseif ($this->year <= 5) {
				$rate = $currConfig[3];
			} else {
				$rate = $currConfig[4];
			}
			$this->rate = $rate/100;
		}
	}
}
