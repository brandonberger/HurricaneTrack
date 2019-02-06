<?php
namespace Controllers;
class HurricaneData
{
	public function __construct($klein) 
	{	

		$klein->respond('GET','table-data/[:hurricane]/[:year]?', function ($request, $response, $service) {
			$service->track = $this->getHurricaneData($request->hurricane, $request->year);
			$service->content = 'templates/components/table.php';
			$service->render('templates/default.php');
		});

		$klein->respond('GET', '', function ($request, $response, $service) {
			$service->track = $this->getHurricaneData('irma', '2017');
			$service->render('templates/default.php');
		});
	}

	public function getHurricaneData($hurricane_name = null, $year = null)
	{	
		$hurricane = \Models\HurricanesQuery::create()->filterByName($hurricane_name)->find();
		foreach ($hurricane as $track) {
			$track_data = $track->getHurricaneTracks();
		}

		$track_data = $this->hurricaneStatus($track_data);

		return $track_data;
	}

	public function hurricaneStatus($track_data)
	{
		// If the storm is first forming it can classified as a tropical depression, else it is not.
		// If the storm is 34 mph or less and not a tropical depression and not a tropical wave or trough it can be
		//   classified as Post tropical cyclone. 

		// To know if it is a tropical wave or trough, i might need to check if the lat. and lon. is in the ocean
		// however there are still probably rules to this classificiation while over the ocean. 
		// If it is a tropical wave or trough, and lower than 34 mph it would be known simply as "remnants of tropical cylone x."

		// There is also two sub categories of a post-tropical storm; 1. Extra-tropical cycle. 2. Remnant Low. 
		// An extratropical is "frontal" // This also can be more than 34 mph. (winds of hurricane or tropical storm force.)
		// A remnant low is "non-frontal"
		// In order to differientate between these [:TODO]

		foreach ($track_data as $row) {
			$speed = $row->getMaxSustainedWind();

			switch (true) {
				case $speed <= 38:
					$row->setVirtualColumn('state', 'Tropical Depression');
					break;
				case $speed >= 39 && $speed <= 73:
					$row->setVirtualColumn('state', 'Tropical Storm');
					break;
				case $speed >= 74 && $speed <= 95:
					$row->setVirtualColumn('state', 'Hurricane');
					$row->setVirtualColumn('category', 1);
					break;
				case $speed >= 96 && $speed <= 110:
					$row->setVirtualColumn('state', 'Hurricane');
					$row->setVirtualColumn('category', 2);
					break;
				case $speed >= 111 && $speed <= 129:
					$row->setVirtualColumn('state', 'Major Hurricane');
					$row->setVirtualColumn('category', 3);
					break;
				case $speed >= 130 && $speed <= 156:
					$row->setVirtualColumn('state', 'Major Hurricane');
					$row->setVirtualColumn('category', 4);
					break;
				case $speed >= 157:
					$row->setVirtualColumn('state', 'Major Hurricane');
					$row->setVirtualColumn('category', 5);
					break;
				default:
					$row->setVirtualColumn('state', 'Dissipated');
					break;
			}	
		}
		return $track_data;
	}
}