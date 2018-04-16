@extends('layouts.main')
@section('title', 'Observations for Bin at '.$obs->first()->bin->location)
@section('content')
<div class="row">
  <div class="col-md-12">
    <p>
      Date: {{(new \DateTime($obs->first()->created_at))->format("d-M-Y")}} <br>
      GSM: {{$obs->first()->bin->mobile}}
    </p>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="weight_chart" style="width: 100%; height: 300px;"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	<hr>
		<div id="infrared_chart" style="width: 100%; height: 300px;"></div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1() {
        var data1 = google.visualization.arrayToDataTable([
          		['Time', 'Weight'],
          @foreach ($obs as $o)
          	@if ($o == $obs->last())
          		['{{ (new \DateTime($o->created_at))->format("h:i A") }}', {{ $o->weight }}]
      		@else
      			['{{ (new \DateTime($o->created_at))->format("h:i A") }}', {{ $o->weight }}],
  			@endif
          @endforeach
        ]);

        var options1 = {
          title: 'Weight (grams)',
          hAxis: {title: 'Time',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          legend: { position: 'none' }
        };

        var chart1 = new google.visualization.AreaChart(document.getElementById('weight_chart'));
        chart1.draw(data1, options1);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          		['Time', 'Status'],
          @foreach ($obs as $o)
          	@if ($o == $obs->last())
          		['{{ (new \DateTime($o->created_at))->format("h:i A") }}', {{ $o->infrared }}]
      		@else
      			['{{ (new \DateTime($o->created_at))->format("h:i A") }}', {{ $o->infrared }}],
  			@endif
          @endforeach
        ]);

        var options2 = {
          title: 'Status of Infrared Sensor',
          hAxis: {title: 'Time',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          legend: { position: 'none' }
        };

        var chart2 = new google.visualization.SteppedAreaChart(document.getElementById('infrared_chart'));
        chart2.draw(data2, options2);
      }
    </script>
@endsection