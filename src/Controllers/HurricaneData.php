<?php
namespace Controllers;
class HurricaneData
{
	public function __construct($klein) 
	{	

		var_dump($this->getHurricaneData('irma', '2017'));exit;


		$klein->respond('GET','table-data/[:hurricane]/[:year]?', function ($request, $response, $service) {
			$service->track = $this->getHurricaneData($request->hurricane, $request->year);
			$service->content = 'templates/components/table.php';
			$service->render('templates/default.php');
		});

		$klein->respond('GET', '', function ($request, $response, $service) {
			$service->track = $this->getHurricaneData();
			$service->render('templates/default.php');
		});
			
	}

	public function getHurricaneData($hurricane_name = null, $year = null)
	{	
		$test = new \Models\Hurricanes();
		// $test->getHurricaneTracks();

		return $test;


		$tracking_data = \Models\HurricanesQuery::create()->find();
		return $tracking_data;
	}
}