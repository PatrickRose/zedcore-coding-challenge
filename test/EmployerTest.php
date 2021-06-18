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
			'Edge-case passes over UK GMT boundary' => [
				'2019-03-25',
				'2019-04-04',
				10,
				true
			],
			'Edge-case starts at UK GMT boundary' => [
				'2019-03-31',
				'2019-04-01',
				1,
				true
			],
			'Edge-case ends at UK GMT boundary' => [
				'2019-03-30',
				'2019-03-31',
				1,
				true
			],
			'Edge-case passes over UK BST boundary' => [
				'2019-10-20',
				'2019-10-30',
				10,
				true
			],
			'Edge-case starts at UK BST boundary' => [
				'2019-10-28',
				'2019-10-29',
				1,
				true
			],
			'Edge-case ends at UK BST boundary' => [
				'2019-10-27',
				'2019-10-28',
				1,
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
			'Edge-case passes over UK GMT boundary' => [
				'2019-03-25',
				'2019-04-04',
				10,
				'badge-success'
			],
			'Edge-case starts at UK GMT boundary' => [
				'2019-03-31',
				'2019-04-01',
				1,
				'badge-success'
			],
			'Edge-case ends at UK GMT boundary' => [
				'2019-03-30',
				'2019-03-31',
				1,
				'badge-success'
			],
			'Edge-case passes over UK BST boundary' => [
				'2019-10-20',
				'2019-10-30',
				10,
				'badge-success'
			],
			'Edge-case starts at UK BST boundary' => [
				'2019-10-28',
				'2019-10-29',
				1,
				'badge-success'
			],
			'Edge-case ends at UK BST boundary' => [
				'2019-10-27',
				'2019-10-28',
				1,
				'badge-success'
			],
		];
	}

}
