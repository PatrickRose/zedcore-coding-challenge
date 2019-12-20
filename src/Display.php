<?php


namespace Zedcore;

use Twig\Environment;

class Display
{
	/**
	 * @var Environment
	 */
	private $oTwig;

	public function __construct(Environment $oTwig)
	{
		$this->oTwig = $oTwig;
	}

	public function Known(): array
	{
		return [
			'1234'
		];
	}

	public function HasValue(): bool
	{
		return $_GET['challenge'] ?? '' !== '';
	}

	public function ShowResult(): string
	{
		if (!$this->HasValue())
		{
			return '';
		}

		return $this->oTwig->render(
			'result.html.twig',
			[
				'display' => $this,
				'input' => $_GET['challenge'] ?? ''
			]
		);
	}

	/**
	 * This returns the table headers
	 *
	 * The key should be the caption used, and the value should be the method to call on an Employer object to get the value
	 *
	 * @return array
	 */
	public function TableHeaders(): array
	{
		return [
			'Employer name' => 'GetName',
			'Date audit started' => 'GetStartTime',
			'Date audit finished' => 'GetStopTime',
			'Is within threshold' => 'ThresholdIsMet',
		];
	}

	/**
	 * @return Employer[]
	 */
	private static function Employers(): array
	{
		return [
			new Employer('First employer', '2019-07-04', '2019-07-10', $_GET['challenge'] ?? 0),
			new Employer('Second employer', '2019-06-04', '2019-07-10', $_GET['challenge'] ?? 0),
			new Employer('Third employer', '2019-02-04',  '2019-02-16', $_GET['challenge'] ?? 0),
			new Employer('Fourth employer', '2019-08-04', '2019-09-04', $_GET['challenge'] ?? 0)
		];
	}

	public function CalculateRow(): array
	{
		$aRows = [];

		foreach (self::Employers() as $oEmp)
		{
			$aRows[] = array_map(function($sFunction) use ($oEmp): Cell { return $oEmp->$sFunction(); }, $this->TableHeaders());
		}

		return $aRows;
	}

}
