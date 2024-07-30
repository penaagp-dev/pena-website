@extends('layout.base')
@section('title')
@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="womanCount"></h3>
                            <p>Perempuan</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-images"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="manCount"></h3>
                            <p>Laki - Laki</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="pengurusCount"></h3>
                            <p>Pengurus Inti</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="registerCount"></h3>
                            <p>Total Pendaftar</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="card-body" style="height: 500px;">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>
        $(document).ready(function() {
            const dashboardservice = new dashboardService();
            dashboardservice.getDataLineCarth();
            dashboardservice.getCountGender();
            dashboardservice.getCountRegister()
        });

        class dashboardService {
            async getDataLineCarth() {
                const response = await axios.get(`${appUrl}/v1/dashboard/line-chart`);
                const responseData = response.data;
                if (responseData.status === 'success') {
                    this.chartJs(responseData);
                } else {

                }
            }

            chartJs(result) {
                const data = result.data;
                const labels = Object.keys(data);
                const counts = Object.values(data);

                const ctx = $('#myChart')[0].getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pendaftaran',
                            data: counts,
                            borderWidth: 4,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    userCallback: function(label, index, labels) {
                                        if (Math.floor(label) === label) {
                                            return label;
                                        }
                                    },
                                }
                            }],
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day',
                                    tooltipFormat: 'll',
                                    displayFormats: {
                                        day: 'MMM D'
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Tanggal'
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }

            async getCountGender() {
              try {
                  const response = await axios.get(`${appUrl}/v1/dashboard/count-gender`)
                  const responseData = response.data;
                  console.log(responseData)
                  $('#manCount').html(responseData.man)
                  $('#womanCount').html(responseData.woman)
              } catch (error) {
                  console.log(error);
              };
            }

            async getCountRegister() {
              try {
                  const response = await axios.get(`${appUrl}/v1/dashboard/total-register`)
                  const responseData = response.data;
                  console.log(responseData)
                  $('#registerCount').html(responseData.register)
                  $('#pengurusCount').html(responseData.pengurus)
              } catch (error) {
                  console.log(error);
              };
            }
        }
    </script>


@endsection
