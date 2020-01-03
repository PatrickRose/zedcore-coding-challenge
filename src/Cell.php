<?php

namespace Zedcore;

class Cell
{
	/**
	 * The cell value
	 * @var string
	 */
	private $sValue;

	/**
	 * Whether this cell should be a heading or not.
	 * @var bool
	 */
	private $bHeading;

	/**
	 * Whether the value contains HTML or is plain-text.
	 * @var bool
	 */
	private $bHTML;

	public function __construct(string $sValue, bool $bHeading = false, $bHTML=false)
	{
		$this->sValue = $sValue;
		$this->bHeading = $bHeading;
		$this->bHTML = $bHTML;
	}

	/**
	 * Test used in twig template
	 * @return bool
	 */
	public function IsHeading(): bool
	{
		return $this->bHeading;
	}

	/**
	 * Test used in twig template
	 * @return bool
	 */
	public function IsHTML(): bool
	{
		return $this->bHTML;
	}

	/**
	 * Value displayed by twig template
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->sValue;
	}

}
