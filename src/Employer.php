<?php

namespace Zedcore;

class Employer
{
	/**
	 * @var string
	 */
	private $sEmployerName;
	/**
	 * @var \DateTimeImmutable
	 */
	private $sStart;
	/**
	 * @var \DateTimeImmutable
	 */
	private $sEnd;
	/**
	 * @var int
	 */
	private $iThreshold;

	public function __construct(string $sEmployerName, string $sStart, string $sEnd, int $iThreshold)
	{
		$this->sEmployerName = $sEmployerName;
		$this->sStart = $sStart;
		$this->sEnd = $sEnd;
		$this->iThreshold = $iThreshold;
	}

	/**
	 * This should return false if the number of days between the start and stop time is greater than the threshold
	 *
	 * @return bool
	 */
	private function MeetsThreshold(): bool
	{
		return false;
	}

	/**
	 * This should return one of the following:
	 *
	 * * "badge-success" if the days between the start and stop time is less than the threshold
	 * * "badge-warning" if the days between the start and stop time is less than the threshold + 50%
	 * * "badge-danger" if the days between the start and stop time is greater than the threshold + 50%
	 *
	 * @return string
	 */
	private function ThresholdClass(): string
	{
		return '';
	}

	public function ThresholdIsMet(): Cell
	{
		$sThreshold = $this->MeetsThreshold() ? 'Yes' : 'No';
		$sThresholdClass = $this->ThresholdClass();

		return new Cell("<td><span class=\"badge $sThresholdClass\">$sThreshold</span></td>", true);
	}

	public function GetName(): Cell
	{
		return new Cell('<th scope="row">' . $this->sEmployerName . '</th>', true);
	}

	public function GetStartTime(): Cell
	{
		// This should display the start time in the format like "Monday, 1st January 2019"
		return new Cell($this->sStart);
	}

	public function GetStopTime(): Cell
	{
		// This should display the stop time in the format like "Monday, 1st January 2019"
		return new Cell($this->sEnd);
	}

}
