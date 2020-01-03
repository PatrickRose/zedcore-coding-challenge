<?php

namespace Zedcore;

class Employer
{
	/**
	 * @var string
	 */
	private $sEmployerName;

	/**
	 * @var string
	 */
	private $sStartDate;

	/**
	 * @var string
	 */
	private $sEndDate;

	/**
	 * @var int
	 */
	private $iTarget;

	/**
	 * Employer constructor, each object represents a row in the report
	 *
	 * @param string $sEmployerName
	 * @param string $sStartDate
	 * @param string $sEndDate
	 * @param int $iKPITarget
	 */
	public function __construct(string $sEmployerName, string $sStartDate, string $sEndDate, int $iKPITarget)
	{
		$this->sEmployerName = $sEmployerName;
		$this->sStartDate = $sStartDate;
		$this->sEndDate = $sEndDate;
		$this->iTarget = $iKPITarget;
	}

	/**
	 * This should return false if the number of days between the start and stop time is greater than the target
	 *
	 * @return bool
	 */
	public function MeetsTarget(): bool
	{
		return false; // TODO
	}

	/**
	 * This should return one of the following:
	 *
	 * * "badge-success" if the days between the start and stop time is less than the target
	 * * "badge-warning" if the days between the start and stop time is less than the target + 50%
	 * * "badge-danger" if the days between the start and stop time is greater than the target + 50%
	 *
	 * @return string
	 */
	public function KPIStyle(): string
	{
		return ''; // TODO
	}

	/**
	 * Display whether the target is met, as a table cell
	 * @return Cell
	 */
	public function Cell_IsTargetMet(): Cell
	{
		$sMeetsTarget = $this->MeetsTarget() ? 'Yes' : 'No';
		$sKPIStyle = $this->KPIStyle();

		return new Cell("<span class=\"badge $sKPIStyle\">$sMeetsTarget</span>", false, true);
	}

	/**
	 * The employer name as a table cell
	 * @return Cell
	 */
	public function Cell_Name(): Cell
	{
		return new Cell($this->sEmployerName, true);
	}

	/**
	 * Get the start date as a table cell
	 * @return Cell
	 */
	public function Cell_StartDate(): Cell
	{
		return new Cell($this->sStartDate);
	}

	/**
	 * Get the stop date as a table cell
	 * @return Cell
	 */
	public function Cell_StopDate(): Cell
	{
		return new Cell($this->sEndDate);
	}

}
