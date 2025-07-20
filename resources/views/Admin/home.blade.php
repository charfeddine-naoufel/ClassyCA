@extends('layouts.app')
@section('title','Accueil Admin')



@section('content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2"><a href="#">Tableau de Bord</a></h1>
                {{-- <ul>
                    <li><a href="">Dashboard</a></li>
                    <li>Version 1</li>
                </ul> --}}
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <!-- ICON BG -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Inscrits</p>
                                <p class="text-primary text-24 line-height-1 mb-2">205</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Financial"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Paiements</p>
                                <p class="text-primary text-24 line-height-1 mb-2">9023</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Checkout-Basket"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Lives</p>
                                <p class="text-primary text-24 line-height-1 mb-2">80</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Money-2"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Leçons</p>
                                <p class="text-primary text-24 line-height-1 mb-2">120</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Elèves Inscrits et Présents </div>
                            <div id="echartBar" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Elèves par classe</div>
                            <div id="echartPie" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card card-chart-bottom o-hidden mb-4">
                                <div class="card-body">
                                    <div class="text-muted">Paiements moi dernier</div>
                                    <p class="mb-4 text-primary text-24">4025 DT</p>
                                </div>
                                <div id="echart1" style="height: 260px;"></div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-6 col-md-12">
                            <div class="card card-chart-bottom o-hidden mb-4">
                                <div class="card-body">
                                    <div class="text-muted">Last Week Sales</div>
                                    <p class="mb-4 text-warning text-24">$10250</p>
                                </div>
                                <div id="echart2" style="height: 260px;"></div>
                            </div>
                        </div> --}}
                    </div>

                    

                </div>


                

            </div>

            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- fotter end -->
        </div>

@endsection

@section('scripts')
<script>

    $(document).ready(function(){
        {{-- lll --}}
var echartElemBar = document.getElementById("echartBar");
    if (echartElemBar) {
        
        var inscrit={!! json_encode($ElInscrit)!!};
       
        console.log(inscrit)
        var active={!! json_encode($ElActive)!!};
        var echartBar = echarts.init(echartElemBar);
        echartBar.setOption({
            legend: {
                borderRadius: 0,
                orient: "horizontal",
                x: "right",
                data: ["Active", "Inscrit"],
            },
            grid: {
                left: "8px",
                right: "8px",
                bottom: "0",
                containLabel: true,
            },
            tooltip: {
                show: true,
                backgroundColor: "rgba(0, 0, 0, .8)",
            },
            xAxis: [
                {
                    type: "category",
                    data: [
                        "Jan",
                        "Fev",
                        "Mar",
                        "Avr",
                        "Mai",
                        "Juin",
                        "Juil",
                        "Aout",
                        "Sept",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                    axisTick: {
                        alignWithLabel: true,
                    },
                    splitLine: {
                        show: false,
                    },
                    axisLine: {
                        show: true,
                    },
                },
            ],
            yAxis: [
                {
                    type: "value",
                    axisLabel: {
                        formatter: "{value}",
                    },
                    min: 0,
                    max: 50,
                    interval: 5,
                    axisLine: {
                        show: false,
                    },
                    splitLine: {
                        show: true,
                        interval: "auto",
                    },
                },
            ],

            series: [
                {
                    name: "Active",
                    data:active,
                    // data: [
                    //     25, 50, 50, 55, 60, 63, 40, 80,
                    //     100, 90, 99, 110,
                    // ],
                    label: { show: false, color: "#0168c1" },
                    type: "bar",
                    barGap: 0,
                    color: "#bcbbdd",
                    smooth: true,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowOffsetY: -2,
                            shadowColor: "rgba(0, 0, 0, 0.3)",
                        },
                    },
                },
                {
                    name: "Inscrit",
                    data:inscrit,
                    // data: [
                    //     45, 60, 90, 100, 120, 110, 150, 200,
                    //     170, 150, 150, 200,
                    // ],
                    label: { show: false, color: "#639" },
                    type: "bar",
                    color: "#7569b3",
                    smooth: true,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowOffsetY: -2,
                            shadowColor: "rgba(0, 0, 0, 0.3)",
                        },
                    },
                },
            ],
        });
        $(window).on("resize", function () {
            setTimeout(function () {
                echartBar.resize();
            }, 500);
        });
    }
{{-- kk --}}
      // Chart in Dashboard version 1
    var echartElemPie = document.getElementById("echartPie");
    var classes={!! json_encode($Elclasse)!!};
    var eleves=[];
    classes.forEach((element) => {
        eleves.push({"value":element[0],"name":element[1]})
    });
    console.log(eleves)
    
    if (echartElemPie) {
        var echartPie = echarts.init(echartElemPie);
        echartPie.setOption({
            color: [
                "#62549c",
                "#7566b5",
                "#7d6cbb",
                "#8877bd",
                "#9181bd",
                "#6957af",
            ],
            tooltip: {
                show: true,
                backgroundColor: "rgba(0, 0, 0, .8)",
            },

            series: [
                {
                    name: "nombre d'eleves ",
                    type: "pie",
                    radius: "60%",
                    center: ["50%", "50%"],
                    data: eleves,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: "rgba(0, 0, 0, 0.5)",
                        },
                    },
                },
            ],
        });
        $(window).on("resize", function () {
            setTimeout(function () {
                echartPie.resize();
            }, 500);
        });
    }
    });
</script>
@endsection

