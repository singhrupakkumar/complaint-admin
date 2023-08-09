<!DOCTYPE html>
<html>
<head>
    <title>INTERNAL COMPLAIN MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>	<h1 style="text-align: center;color: #0179ff;">CAPITOL GRAVURE CYLINDER SDN. BHD.</h1>
    <h3 style="text-align: center;color: #0179ff;">{{ $title }} ({{ $from_date }} to {{ $to_date }})</h3>
    

  
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>REJ. DATE </th>
            <th>PROD. DATE</th>
            <th>PROD. TIME</th>
            <th>REJ. DEPT.</th>
            <th>TANK</th>
            <th>CUST. CODE</th>
            <th>JOB NO</th>
            <th>CIR </th>
            <th>LENGTH</th>
            <th>CYL. NO</th>
            <th>MT</th>
            <th style="width:200px;">CATEGORY</th>

        </tr>
		@php 
		$i = 1;
		$total = 0;
		@endphp
        @foreach($complain as $k => $comp)
		
		 @foreach($comp as $key => $user)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $user->rej_date }}</td>
            <td>{{ $user->prod_date }}</td>
            <td>{{ $user->prod_time }}</td>
            <td>{{ $user->rejdept?$user->rejdept->name:''}}</td>
            <td>{{ $user->tank }}</td>
            <td>{{ $user->custcode?$user->custcode->code:''}}</td>
            <td>{{ $user->job_number }}</td>
            <td>{{ $user->cir }}</td>
            <td>{{ $user->length }}</td>
            <td>{{ $user->cyl_number }}</td>
            <td>{{ $user->mt }}</td>
            <td>{!! $user->category !!}</td>
        </tr>
		@php
		$i++;
		@endphp
		
		@endforeach
		@php
		$total = $total  + count($comp);
		@endphp
		<tr><td colspan="13" style="text-align:center;">{{count($comp)}} PCS</td></tr>
        @endforeach
    </table>  <h4 style="text-align: left;color: #0179ff;">Total Rejected: {{$total}} PCS</h4>
  <p>Printed: {{ $date }}</p>
</body>
</html>