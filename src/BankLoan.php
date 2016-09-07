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
	protected $loanAmount = 100000;

	/**
	 * @var int
	 */
	protected $year = 1;

	/**
	 * @var float
	 */
	protected $interestRate = 0;

	/**
	 * @var int
	 */
	protected $interestRateChangeIndex = 0;

	/**
	 * @var int
	 */
	protected $bank = 'PBC'; // The people's bank of China

	/**
	 * @var int
	 */
	private $_monthlyinterestRate = 0;

	/**
	 * @var int
	 */
	private $_interestPartTemp = 0;

	/**
	 * init param
	 *
	 * @param int $config['loanAmount']
	 * @param int $config['year']
	 * @param int $config['interestRate']
	 * @param int $config['interestRateChangeIndex']
	 *
	 */
	public function __construct($config)
	{
		if (isset($config['loanAmount']) && !empty($config['loanAmount'])) {
			$this->loanAmount = $config['loanAmount'];
		}
		if (isset($config['year']) && !empty($config['year'])) {
			$this->year = $config['year'];
		}
		if (isset($config['interestRateChangeIndex']) && !empty($config['interestRateChangeIndex'])) {
			$this->interestRateChangeIndex = $config['interestRateChangeIndex'];
		}
		if (isset($config['interestRate']) && !empty($config['interestRate'])) {
			$this->interestRate = $config['interestRate']/100;
		} else {
			$this->_getinterestRate();
		}
		$this->_monthlyinterestRate = $this->interestRate/12;
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
		$paymentAmount = $this->loanAmount*($this->_monthlyinterestRate*pow(1+$this->_monthlyinterestRate, $this->year*12))/(pow(1+$this->_monthlyinterestRate, $this->year*12)-1); // Payment Amount
		$loanAmount = $this->loanAmount;
		$initPrincipalPart = 0; // Init Prncipal Part
		for ($i=1; $i <= $this->period; $i++) {
			$loanAmount = $loanAmount - $initPrincipalPart;
			$interestPart = $loanAmount*$this->_monthlyinterestRate;
			$output['period'][$i]['ip'] = sprintf("%.2f", $interestPart); // Interest Part
			$output['period'][$i]['pa'] = sprintf("%.2f", $paymentAmount); // Payment Amount
			$principal = $initPrincipalPart = $paymentAmount - $interestPart;
			$output['period'][$i]['pp'] = sprintf("%.2f", $principal); // Principal Part
			$output['period'][$i]['bo'] = sprintf("%.2f", abs($loanAmount-$principal)); // Banlance Owed
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
		$principalPart = $this->loanAmount/($this->year*12); // Principal Part
		$loanAmountInterest = 0;
		$loanAmount = $this->loanAmount;
		$equalAll = $equalItem = 0;
		for ($i=1; $i <= $this->period; $i++) {
			if ($i > 1)
				$loanAmount = $loanAmount - $principalPart;
			$interestPart = $loanAmount*$this->_monthlyinterestRate;
			$loanAmountInterest += $interestPart;
			$output['period'][$i]['ip'] = sprintf("%.2f", $interestPart); // Interest Part
			$output['period'][$i]['pp'] = sprintf("%.2f", $principalPart); // Principal Part
			$output['period'][$i]['pa'] = sprintf("%.2f", $principalPart+$interestPart); // Payment Amount
			$output['period'][$i]['bo'] = sprintf("%.2f", $loanAmount - $principalPart); // Balance Owed
			$i > 1 && $equalItem = $this->_interestPartTemp - $interestPart;
			$this->_interestPartTemp = $interestPart;
			$equalAll += $equalItem;
		}
		$output['ti'] = sprintf("%.2f", $loanAmountInterest); // loanAmount Interest
		$output['tp'] = sprintf("%.2f", $this->loanAmount+$loanAmountInterest); // loanAmount Payments
		$output['equal'] = sprintf("%.2f", $equalAll/($this->year*12 - 1));
		return $output;
	}

	/**
	 * Get ank interestRate
	 */
	private function _getinterestRate()
	{
		$config = require(__DIR__.'/config.php');
		if ($this->interestRateChangeIndex) {
			if (isset($config[$this->bank][$this->interestRateChangeIndex])) {
				$currConfig = $config[$this->bank][$this->interestRateChangeIndex];
			}
		} else {
			$currConfig = end($config[$this->bank]);
		}

		if (empty($this->interestRate)) {
			if ($this->year <= 0.6) {
				$interestRate = $currConfig[0];
			} elseif ($this->year <= 1) {
				$interestRate = $currConfig[1];
			} elseif ($this->year <= 3) {
				$interestRate = $currConfig[2];
			} elseif ($this->year <= 5) {
				$interestRate = $currConfig[3];
			} else {
				$interestRate = $currConfig[4];
			}
			$this->interestRate = $interestRate/100;
		}
	}
}
