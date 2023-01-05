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
            background-color: #7B68EE;
            color: white;
        }
    </style>
</head>

<body>
    <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
        Timetable
    </h2>

    <table class="table table-bordered">
        <thead>
            <th width="125">Time</th>
            @foreach($weekDays as $day)
            <th>{{ $day }}</th>
            @endforeach
        </thead>
        <tbody>
            @foreach($calendarData as $time => $days)
            <tr>
                <td>
                    {{ $time }}
                </td>
                @foreach($days as $value)
                @if (is_array($value))
                <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#f0f0f0">
                    {{ $value['unit_name'] }}<br>
                    {{ $value['course'] }}<br>
                    {{ $value['semester'] }}<br>
                    Lec: {{ $value['lecturer_name'] }}
                </td>
                @elseif ($value === 1)
                <td></td>
                @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>