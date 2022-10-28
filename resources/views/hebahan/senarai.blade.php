
@extends('layouts.anon')

<style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }

    #chartdiv2 {
      width: 100%;
      height: 500px;
    }

    #chartdiv3 {
      width: 100%;
      height: 500px;
    }
</style>


@section('content')

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">BORANG HEBAHAN</h2>
                </div>

                <div class="col">
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/hebahan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-4">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama Hebahan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="tajukHebahan" type="text"/>
                                    </div>
                
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Muat Naik Dokumen Sokongan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="jenisHebahan" type="file"/>
                                    </div>
                    
                                    <div class="col-3 mb-2">
                                        
                                    </div>
                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/hebahan" class="btn btn-outline-primary">Batal</a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">SENARAI HEBAHAN</h2>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table datatable table-striped" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="sort">Bil.</th>
                                            <th class="sort">Tajuk Hebahan</th>
                                            <th class="sort">Kategori</th>
                                            <th class="sort">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        
                                        @foreach ($hebahans as $hebahan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $hebahan->tajuk }}</td>
                                                <td>{{ $hebahan->isi }}</td>
                                                
                                                
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <a href="/hebahan/{{ $hebahan->id }}/edit"
                                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="/hebahan/{{ $hebahan->id }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

=======

</div>


{{-- utk java script --}}
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
{{-- chart1 --}}
<script>
    am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: false,
    panY: false,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
    }));


    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(
    am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
    })
    );

    var data = [{
    "year": "2021",
    "europe": 2.5,
    "namerica": 2.5,
    "asia": 2.1,
    "lamerica": 1,
    "meast": 0.8,
    "africa": 0.4
    }, {
    "year": "2022",
    "europe": 2.6,
    "namerica": 2.7,
    "asia": 2.2,
    "lamerica": 0.5,
    "meast": 0.4,
    "africa": 0.3
    }, {
    "year": "2023",
    "europe": 2.8,
    "namerica": 2.9,
    "asia": 2.4,
    "lamerica": 0.3,
    "meast": 0.9,
    "africa": 0.5
    }]


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "year",
    renderer: am5xy.AxisRendererX.new(root, {
        cellStartLocation: 0.1,
        cellEndLocation: 0.9
    }),
    tooltip: am5.Tooltip.new(root, {})
    }));

    xAxis.data.setAll(data);

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {})
    }));


    // Chart Title
    chart.children.unshift(am5.Label.new(root, {
    text: "Chart 1",
    fontSize: 15,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 10
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "year"
    }));

    series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}:{valueY}",
        width: am5.percent(90),
        tooltipY: 0
    });

    series.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();

    series.bullets.push(function () {
        return am5.Bullet.new(root, {
        locationY: 0,
        sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: 0,
            centerX: am5.p50,
            populateText: true
        })
        });
    });

    legend.data.push(series);
    }

    makeSeries("Europe", "europe");
    makeSeries("North America", "namerica");
    makeSeries("Asia", "asia");
    makeSeries("Latin America", "lamerica");
    makeSeries("Middle East", "meast");
    makeSeries("Africa", "africa");


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>

{{-- chart2 --}}
<script>
    am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv2");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: false,
    panY: false,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
    }));


    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(
    am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
    })
    );

    var data = [{
    "year": "2021",
    "europe": 2.5,
    "namerica": 2.5,
    "asia": 2.1,
    "lamerica": 1,
    "meast": 0.8,
    "africa": 0.4
    }, {
    "year": "2022",
    "europe": 2.6,
    "namerica": 2.7,
    "asia": 2.2,
    "lamerica": 0.5,
    "meast": 0.4,
    "africa": 0.3
    }, {
    "year": "2023",
    "europe": 2.8,
    "namerica": 2.9,
    "asia": 2.4,
    "lamerica": 0.3,
    "meast": 0.9,
    "africa": 0.5
    }]


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "year",
    renderer: am5xy.AxisRendererX.new(root, {
        cellStartLocation: 0.1,
        cellEndLocation: 0.9
    }),
    tooltip: am5.Tooltip.new(root, {})
    }));

    xAxis.data.setAll(data);

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {})
    }));

    // Chart Title
    chart.children.unshift(am5.Label.new(root, {
    text: "Chart 2",
    fontSize: 15,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 10
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "year"
    }));

    series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}:{valueY}",
        width: am5.percent(90),
        tooltipY: 0
    });

    series.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();

    series.bullets.push(function () {
        return am5.Bullet.new(root, {
        locationY: 0,
        sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: 0,
            centerX: am5.p50,
            populateText: true
        })
        });
    });

    legend.data.push(series);
    }

    makeSeries("Europe", "europe");
    makeSeries("North America", "namerica");
    makeSeries("Asia", "asia");
    makeSeries("Latin America", "lamerica");
    makeSeries("Middle East", "meast");
    makeSeries("Africa", "africa");


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>

{{-- chart3 --}}
<script>
    am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv3");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: false,
    panY: false,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
    }));


    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(
    am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
    })
    );

    var data = [{
    "year": "2021",
    "europe": 2.5,
    "namerica": 2.5,
    "asia": 2.1,
    "lamerica": 1,
    "meast": 0.8,
    "africa": 0.4
    }, {
    "year": "2022",
    "europe": 2.6,
    "namerica": 2.7,
    "asia": 2.2,
    "lamerica": 0.5,
    "meast": 0.4,
    "africa": 0.3
    }, {
    "year": "2023",
    "europe": 2.8,
    "namerica": 2.9,
    "asia": 2.4,
    "lamerica": 0.3,
    "meast": 0.9,
    "africa": 0.5
    }]


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "year",
    renderer: am5xy.AxisRendererX.new(root, {
        cellStartLocation: 0.1,
        cellEndLocation: 0.9
    }),
    tooltip: am5.Tooltip.new(root, {})
    }));

    xAxis.data.setAll(data);

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {})
    }));

    // Chart Title
    chart.children.unshift(am5.Label.new(root, {
    text: "Chart 3",
    fontSize: 15,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 10
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "year"
    }));

    series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}:{valueY}",
        width: am5.percent(90),
        tooltipY: 0
    });

    series.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();

    series.bullets.push(function () {
        return am5.Bullet.new(root, {
        locationY: 0,
        sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: 0,
            centerX: am5.p50,
            populateText: true
        })
        });
    });

    legend.data.push(series);
    }

    makeSeries("Europe", "europe");
    makeSeries("North America", "namerica");
    makeSeries("Asia", "asia");
    makeSeries("Latin America", "lamerica");
    makeSeries("Middle East", "meast");
    makeSeries("Africa", "africa");


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>

@endsection