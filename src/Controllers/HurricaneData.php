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
		return $track_data;
	}
}