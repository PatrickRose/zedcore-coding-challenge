<?php

namespace Zedcore;
use PHPUnit\Framework\TestCase;

class EmployerTest extends TestCase
{
	/**
	 * @dataProvider provider_MeetsTarget()
	 *
	 * @param string $sStartDate
	 * @param string $sEndDate
	 * @param integer $iTarget
	 * @param bool $bExpected
	 */
	public function test_MeetsTarget(string $sStartDate, string $sEndDate, int $iTarget, bool $bExpected)
	{
		$oEmployer = new Employer("Test employer", $sStartDate, $sEndDate, $iTarget);
		$this->assertEquals($bExpected, $oEmployer->MeetsTarget());
	}

	/**
	 * @dataProvider provider_KPIStyle()
	 *
	 * @param string $sStartDate
	 * @param string $sEndDate
	 * @param integer $iTarget
	 * @param string $sExpected
	 */
	public function test_KPIStyle(string $sStartDate, string $sEndDate, int $iTarget, string $sExpected)
	{
		$oEmployer = new Employer("Test employer", $sStartDate, $sEndDate, $iTarget);
		$this->assertEquals($sExpected, $oEmployer->KPIStyle());
	}

	public static function provider_MeetsTarget(): array
	{
		return [
			'Exactly on target' => [
				'2019-10-01',
				'2019-10-11',
				10,
				true
			],
			'Under target by 1 day' => [
				'2019-10-01',
				'2019-10-10',
				10,
				true
			],
			'Over target by 1 day' => [
				'2019-10-01',
				'2019-10-12',
				10,
				false
			],
			'Edge-case, zero days between dates...' => [
				'2019-10-01',
				'2019-10-01',
				10,
				true
			],
		];
	}

	public static function provider_KPIStyle(): array
	{
		return [
			'Exactly on target' => [
				'2019-10-01',
				'2019-10-11',
				10,
				'badge-success'
			],
			'Under target' => [
				'2019-10-01',
				'2019-10-10',
				10,
				'badge-success'
			],
			'Over target by 1 day' => [
				'2019-10-01',
				'2019-10-12',
				10,
				'badge-warning'
			],
			'Over target by 50% - 1 day' => [
				'2019-10-01',
				'2019-10-15',
				10,
				'badge-warning'
			],
			'Over target by 50%' => [
				'2019-10-01',
				'2019-10-16',
				10,
				'badge-warning'
			],
			'Over target by 50% + 1 day' => [
				'2019-10-01',
				'2019-10-17',
				10,
				'badge-danger'
			],
			'Edge-case, zero days between dates...' => [
				'2019-10-01',
				'2019-10-01',
				10,
				'badge-success'
			],
		];
	}

}
