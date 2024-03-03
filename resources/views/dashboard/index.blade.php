@extends('layout')
@section('content')

    @php
        $disciplines = \App\Models\Student::where('user_id', auth()->user()->id)->first()->disciplines()->get();
        $marks = [];
        $disciplines_decoded = json_encode(\App\Models\Student::where(
        'user_id', auth()->user()->id)->first()->disciplines()->pluck('title'), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        foreach ($disciplines as $discipline) {
            array_push($marks, $discipline->marks->sum('mark'));
        }
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Статистика студента</h5>
                    </div>
                    <div class="card-body">
                        <div class="stat-item">
                            <div class="container">
                                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="rose-tab" data-toggle="tab" href="#rose"
                                           role="tab" aria-controls="rose" aria-selected="true">Радар</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bar-tab" data-toggle="tab" href="#bar" role="tab"
                                           aria-controls="bar" aria-selected="false">Стовпчаста</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="rose" role="tabpanel"
                                         aria-labelledby="rose-tab">
                                        <div class="stat-item">
                                            <h6>Загальні курси</h6>
                                            <canvas id="radarChart" width="200" height="200"></canvas>
                                            <script>

                                                    const subjects = {!! $disciplines_decoded !!};
                                                    const grades = {!! json_encode($marks) !!};

                                                    const ctx = document.getElementById('radarChart').getContext('2d');
                                                    const myRadarChart = new Chart(ctx, {
                                                        type: 'radar',
                                                        data: {
                                                            labels: subjects,
                                                            datasets: [{
                                                                label: 'Оцінка',
                                                                data: grades,
                                                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                                borderWidth: 1
                                                            }]
                                                        },
                                                        options: {
                                                            scale: {
                                                                angleLines: {
                                                                    display: false
                                                                },
                                                                ticks: {
                                                                    beginAtZero: true,
                                                                    min: 0,
                                                                    max: 100
                                                                }
                                                            }
                                                        }
                                                })
                                            </script>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="bar" role="tabpanel" aria-labelledby="bar-tab">
                                        <div class="stat-item">
                                            <h6>Завершені курси</h6>
                                            <canvas id="barChart" width="400" height="400"></canvas>
                                            <script>


                                                // Дані для графіка
                                                const subjects2 = {!! $disciplines_decoded !!};
                                                const averageGrades2 = {!! json_encode($marks) !!};

                                                // Створення стовпчастого графіка
                                                const context = document.getElementById('barChart').getContext('2d');
                                                const myBarChart = new Chart(context, {
                                                    type: 'bar',
                                                    data: {
                                                        labels: subjects2,
                                                        datasets: [{
                                                            label: 'Оцінка',
                                                            data: averageGrades2,
                                                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Колір стовпців
                                                            borderColor: 'rgba(54, 162, 235, 1)', // Колір меж стовпців
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true // Початок шкали Y з нуля
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });

                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $('#myTab a').on('click', function (e) {
                                    e.preventDefault()
                                    $(this).tab('show')
                                })
                            </script>
                        </div>
                        <div class="stat-item">
                            <h6>Середній бал</h6>
                            <p>@php($sum = 0)
                                @foreach($disciplines as $discipline)
                                    @php($sum += $discipline->marks->sum('mark'))
                            @endforeach {{ $sum / $disciplines->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
