<?php


namespace Zedcore;

use Twig\Environment;

class Report
{
	/**
	 * @var Environment
	 */
	private $oTwig;

	public function __construct(Environment $oTwig)
	{
		$this->oTwig = $oTwig;
	}

	/**
	 * A set of common KPI targets as pre-defined options for the report
	 * @return array
	 */
	public function CommonTargets(): array
	{
		return [
			5,
			10,
			15,
			20,
		];
	}

	/**
	 * Whether the KPI target field has a value or not
	 * @return bool
	 */
	public function HasValue(): bool
	{
		return $_GET['target'] ?? '' !== '';
	}

	/**
	 * Displays the results tempalte, if the form has been submitted
	 * @return string
	 */
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
				'input' => $_GET['target'] ?? ''
			]
		);
	}

	/**
	 * This returns the columns for the main results table.
	 *
	 * The key should be the table header caption, and the value should be the
	 * method to call on an Employer object to get the value.
	 *
	 * @return array
	 */
	public function TableColumns(): array
	{
		return [
			'Employer name' => 'Cell_Name',
			'Date audit started' => 'Cell_StartDate',
			'Date audit finished' => 'Cell_StopDate',
			'Target met' => 'Cell_IsTargetMet',
		];
	}

	/**
	 * Calculates the columns for each Employer 'row', using the functions
	 * from TableColumns()
	 *
	 * @return array
	 */
	public function CalculateRows(): array
	{
		$aRows = [];

		foreach ($this->GetEmployers() as $oEmployer)
		{
			$aRows[] = array_map(function($sFunction) use ($oEmployer): Cell { return $oEmployer->$sFunction(); }, $this->TableColumns());
		}

		return $aRows;
	}

	/**
	 * Get the employers performance data.
	 *
	 * For simplicity this just generates some static data instead of requiring
	 * a database for this simple challenge.
	 *
	 * @return Employer[]
	 */
	public static function GetEmployers(): array
	{
		$iTarget = $_GET['target'];
		return [
			new Employer('First employer', '2019-07-04', '2019-07-10', $iTarget),
			new Employer('Second employer', '2019-06-04', '2019-07-10', $iTarget),
			new Employer('Third employer', '2019-08-04',  '2019-08-16', $iTarget),
			new Employer('Fourth employer', '2019-08-04', '2019-09-04', $iTarget)
		];
	}

}
