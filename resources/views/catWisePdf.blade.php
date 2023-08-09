<!DOCTYPE html>
<html>
<head>
    <title>INTERNAL COMPLAIN MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>	<h1 style="text-align: center;color: #0179ff;">CAPITOL GRAVURE CYLINDER SDN. BHD.</h1>
    <h3 style="text-align: center;color: #0179ff;">{{ $title }}</h3>
    <p>Printed: {{ $date }}</p>
    <p>Monthly Internal Rejects</p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Place</th>
            <th>Categories</th>
            <th>Jan</th>
            <th>Feb</th>
            <th>Mar</th>
            <th>Apr</th>
            <th>May</th>
            <th>Jun</th>
            <th>Jul</th>
            <th>Aug</th>
            <th>Sep</th>
            <th>Oct</th>
            <th>Nov</th>
            <th>Dec</th>

        </tr>
        </thead>
        <tbody>
        <?php
         $total01 = 0;
         $total02 = 0;
         $total03 = 0;
         $total04 = 0;
         $total05 = 0;
         $total06 = 0;
         $total07 = 0;
         $total08 = 0;
         $total09 = 0;
         $total10 = 0;
         $total11 = 0;
         $total12 = 0;
        ?>    
        @foreach($department as $key => $user)
        <tr>
            <td>Internal</td>
            <td>{{ $user->category }}</td>
            @foreach(\App\Models\Complain::getCountByCatAndMonth($user->category) as $k => $data)
            @php
            if($k==1){
                $total01 = $total01+$data;
            }
            if($k==2){
                $total02 = $total02+$data;
            }
            if($k==3){
                $total03 = $total03+$data;
            }
            if($k==4){
                $total04 = $total04+$data;
            }
            if($k==5){
                $total05 = $total05+$data;
            }
            if($k==6){
                $total06 = $total06+$data;
            }
            if($k==7){
                $total07 = $total07+$data;
            }

            if($k==8){
                $total08 = $total08+$data;
            }
            if($k==9){
                $total09 = $total09+$data;
            }
            if($k==10){
                $total10 = $total10+$data;
            }
            if($k==11){
                $total11 = $total11+$data;
            }
            if($k==12){
                $total12 = $total12+$data;
            }
            
            @endphp
            <td>{{$data}}</td>
            @endforeach
          
        </tr>
 
        @endforeach
        </tbody>
         <tfoot>
            <tr>
              <th></th>
              <th>TOTAL -</th>
              <th>{{$total01}}</th>
              <th>{{$total02}}</th>
              <th>{{$total03}}</th>
              <th>{{$total04}}</th>
              <th>{{$total05}}</th>
              <th>{{$total06}}</th>
              <th>{{$total07}}</th>
              <th>{{$total08}}</th>
              <th>{{$total09}}</th>
              <th>{{$total10}}</th>
              <th>{{$total11}}</th>
              <th>{{$total12}}</th>
            </tr>
        </tfoot>
    </table>
  
</body>
</html>