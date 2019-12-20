<?php

namespace Zedcore;

class Cell
{
	/**
	 * @var string
	 */
	private $sValue;
	/**
	 * @var bool
	 */
	private $bIsRaw;

	public function __construct(string $sValue, bool $bIsRaw = false)
	{
		$this->sValue = $sValue;
		$this->bIsRaw = $bIsRaw;
	}

	public function IsRaw(): bool
	{
		return $this->bIsRaw;
	}

	public function __toString()
	{
		return $this->sValue;
	}
}
