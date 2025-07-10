<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    {{-- 
    <table border="1">
        <tr>
            <th>Divisi</th>
            <th>RTP</th>
            <th>PROVISION</th>
            <th>PS</th>
            <th>CANCEL</th>
            <th>UNMAPPING</th>
            <th>GRANDTOTAL</th>
        </tr>
        @foreach ($divisions as $division)
            <tr>
                <td>{{ $division->name }}</td>
                <td>{{ number_format($division->units->sum('rtp'), 0, '', '.') }}</td>
                <td>{{ number_format($division->units->sum('provision'), 0, '', '.') }}</td>
                <td>{{ number_format($division->units->sum('ps'), 0, '', '.') }}</td>
                <td>{{ number_format($division->units->sum('cancel'), 0, '', '.') }}</td>
                <td>{{ number_format($division->units->sum('unmapping'), 0, '', '.') }}</td>
                <td>{{ number_format($division->units->sum('rtp') + $division->units->sum('provision') + $division->units->sum('ps') + $division->units->sum('cancel') + $division->units->sum('unmapping'), 0, '', '.') }}
                </td>
            </tr>
        @endforeach
        <tr>
            <th>Grand Total</th>
            <th>{{ number_format($total['rtp'], 0, '', '.') }}</th>
            <th>{{ number_format($total['provision'], 0, '', '.') }}</th>
            <th>{{ number_format($total['ps'], 0, '', '.') }}</th>
            <th>{{ number_format($total['cancel'], 0, '', '.') }}</th>
            <th>{{ number_format($total['unmapping'], 0, '', '.') }}</th>
            <th>{{ number_format($total['rtp'] + $total['provision'] + $total['ps'] + $total['cancel'] + $total['unmapping'], 0, '', '.') }}
            </th>
        </tr>
    </table>

    <br><br><br>

    <table border="1">
        <tr>
            <th>Row Label</th>
            <th>RTP</th>
            <th>PROVISION</th>
            <th>PS</th>
            <th>CANCEL</th>
            <th>UNMAPPING</th>
            <th>GRANDTOTAL</th>
        </tr>
        @foreach ($divisions as $division)
            <tr>
                <th>{{ $division->name }}</th>
                <th>{{ number_format($division->units->sum('rtp'), 0, '', '.') }}</th>
                <th>{{ number_format($division->units->sum('provision'), 0, '', '.') }}</th>
                <th>{{ number_format($division->units->sum('ps'), 0, '', '.') }}</th>
                <th>{{ number_format($division->units->sum('cancel'), 0, '', '.') }}</th>
                <th>{{ number_format($division->units->sum('unmapping'), 0, '', '.') }}</th>
                <th>{{ number_format($division->units->sum('rtp') + $division->units->sum('provision') + $division->units->sum('ps') + $division->units->sum('cancel') + $division->units->sum('unmapping'), 0, '', '.') }}
                </th>
            </tr>
            @foreach ($division->units as $unit)
                <tr>
                    <td>{{ $unit->name }}</td>
                    <td>{{ number_format($unit->rtp, 0, '', '.') }}</td>
                    <td>{{ number_format($unit->provision, 0, '', '.') }}</td>
                    <td>{{ number_format($unit->ps, 0, '', '.') }}</td>
                    <td>{{ number_format($unit->cancel, 0, '', '.') }}</td>
                    <td>{{ number_format($unit->unmapping, 0, '', '.') }}</td>
                    <td>{{ number_format($unit->rtp + $unit->provision + $unit->ps + $unit->cancel + $unit->unmapping, 0, '', '.') }}
                    </td>
                </tr>
            @endforeach
        @endforeach
        <tr>
            <th>Grand Total</th>
            <th>{{ number_format($total['rtp'], 0, '', '.') }}</th>
            <th>{{ number_format($total['provision'], 0, '', '.') }}</th>
            <th>{{ number_format($total['ps'], 0, '', '.') }}</th>
            <th>{{ number_format($total['cancel'], 0, '', '.') }}</th>
            <th>{{ number_format($total['unmapping'], 0, '', '.') }}</th>
            <th>{{ number_format($total['rtp'] + $total['provision'] + $total['ps'] + $total['cancel'] + $total['unmapping'], 0, '', '.') }}
            </th>
        </tr>
    </table>

    <div>
        <canvas id="myChart1"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('myChart1');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($divisions as $division)
                        "{{ $division->name }}",
                    @endforeach
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        @foreach ($divisions as $division)
                            "{{ $division->units->sum('rtp') + $division->units->sum('provision') + $division->units->sum('ps') + $division->units->sum('cancel') + $division->units->sum('unmapping') }}",
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <canvas id="pieChart" width="20" height="20"></canvas>

    <script>
        const ctx2 = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: [
                    @foreach ($divisions as $division)
                        "{{ $division->name }}",
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach ($divisions as $division)
                            "{{ $division->units->sum('rtp') + $division->units->sum('provision') + $division->units->sum('ps') + $division->units->sum('cancel') + $division->units->sum('unmapping') }}",
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script> --}}

    <table>
        <thead>
            <tr>
                <th>BUD</th>
                <th>RTP</th>
                <th>Provision</th>
                <th>PS</th>
                <th>Cancel</th>
                <th>Unmapping</th>
                <th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->bud }}</td>
                    <td>{{ $row->rtp }}</td>
                    <td>{{ $row->provison }}</td>
                    <td>{{ $row->ps }}</td>
                    <td>{{ $row->cancel }}</td>
                    <td>{{ $row->unmapping }}</td>
                    <td>{{ $row->rtp + $row->provison + $row->ps + $row->cancel + $row->unmapping }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
