<!DOCTYPE html>
<html>
<head>
<style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #BDD1F8;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #BDD1F8;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: 	#7B68EE;
            color: white;
        }
    </style>
</head>
<body>


<table id="customers">
        <tr>
            <td>
                <h2>Waterfall Institute ERP</h2>
                <p>Address: KE</p>
                <p>Phone : 343434343434</p>
                <p>Email : support@waterfallinstitute.com</p>
            </td>
        </tr>


    </table>

@php 
$registrationfee = App\Models\fee_category_amount::where('fee_category_id','3')->where('course_id',$details->course_id)->first();
$originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;
@endphp 

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $details->roll }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

 
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class </b></td>
    <td>{{ $details['student_course']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Exam Fee</b></td>
    <td>Ksh. {{ $originalfee }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Fee </b></td>
    <td>{{ $discount  }} %</td>
  </tr>

    <tr>
    <td>9</td>
    <td><b>Fee For this Student of {{ $exam_type }} </b></td>
    <td>Ksh. {{ $finalfee }}</td>
  </tr>
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

  <hr style="border: dashed 1px; width: 95%; color: #BDD1EE; margin-bottom: 30px">

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $details->roll }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Course </b></td>
    <td>{{ $details['student_course']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Exam Fee</b></td>
    <td>Ksh. {{ $originalfee }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Fee </b></td>
    <td>{{ $discount  }} %</td>
  </tr>

    <tr>
    <td>9</td>
   <td><b>Fee For this Student of {{ $exam_type }} </b></td>
    <td>Ksh. {{ $finalfee }}</td>
  </tr>
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>







</body>
</html>