@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: white">
                <div class="card-header">{{ __('Cash Flows') }}</div>

                <div class="card-body">
                    <h2>Finance Report - Cash Flows Chart</h2>
                    <canvas id="cashFlowsChart" width="800" height="400"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var months = {!! json_encode(['Jan','Feb','Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']) !!};
                        var cashFlowsData = {!! json_encode($data) !!};

                        var ctx = document.getElementById('cashFlowsChart').getContext('2d');
                        var cashFlowsChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: months,
                                datasets: [{
                                    label: 'Cash Flows',
                                    data: cashFlowsData,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
