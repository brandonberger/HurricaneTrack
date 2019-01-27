<?php

namespace Models;

use Models\Base\HurricaneTrack as BaseHurricaneTrack;

/**
 * Skeleton subclass for representing a row from the 'hurricane_track' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class HurricaneTrack extends BaseHurricaneTrack
{

	public $state;
	public $category;

	public function setHurricaneState()
	{
		$speed = $this->getMaxSustainedWind();

		switch (true) {
			case $this->getMaxSustainedWind() <= 38:
				$this->state = 'Tropical Depression';
				break;
			case $speed >= 39 && $speed <= 73:
				$this->state = 'Tropical Storm';
				break;
			case $speed >= 74 && $speed <= 95:
				$this->state = 'Hurricane';
				$this->category = 1;
				break;
			case $speed >= 96 && $speed <= 110:
				$this->state = 'Hurricane';
				$this->category = 2;
				break;
			case $speed >= 111 && $speed <= 129:
				$this->state = 'Major Hurricane';
				$this->category = 3;
				break;
			case $speed >= 130 && $speed <= 156:
				$this->state = 'Major Hurricane';
				$this->category = 4;
				break;
			case $speed >= 157:
				$this->state = 'Major Hurricane';
				$this->category = 5;
				break;
			default:
				$this->state = 'Dissipated';
				break;
		}

		return true;
	}

	public function isPostTropical()
	{
		// $test = array_map($this->toArray(), 'MaxSustainedWind');
		var_dump($this->toArray());
	}
}
