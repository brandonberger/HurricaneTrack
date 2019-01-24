<table class="table">
	<thead>
		<th>Date</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th>Pressure</th>
		<th>Max. Wind</th>
		<th>Status</th>
	</thead>

<?php foreach ($this->track as $t) { ?>
	<tr>
		<td><?=$t->getDate('M jS Y h:i A')?></td>
		<td><?=$t->getLatitude()?>&deg;W</td>
		<td><?=$t->getLongitude()?>&deg;N</td>
		<td><?=$t->getPressure()?> mbar</td>
		<td><?=$t->getMaxSustainedWind()?> MPH</td>
		<td><?=ucwords($t->getStatus())?></td>
	</tr>
<?php } ?>
</table>
