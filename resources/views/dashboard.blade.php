@extends('layouts.app')
<style>
    #carta1 {
      width: 100%;
      height: 400px;
    }
    #carta2 {
      width: 100%;
      height: 400px;
    }
    #carta3 {
      width: 100%;
      height: 400px;
    }
    #carta4 {
      width: 100%;
      height: 400px;
    }
</style>


@section('content')
<h1 class="jkr-header-title">
    DASHBOARD
</h1>
<hr class="line-horizontal-jkr">

{{-- <img src="star7" alt="Error" width="10" height="10" >Keputusan Permarkahan --}}

<div class="row container-fluid">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div id="carta1"></div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div id="carta2"></div>
            </div>
        </div>
    </div>

    <div class="card mt-6">
      <div class="card-body" id="senarai-projek">
          <h3>Senarai Projek</h3>
          <div class="row mt-3">
            <table class="table table-bordered projek-datatable line-table" style="width:100%">
              <thead class="text-white bg-orange-jkr">
                  <tr>
                      <th class="text-center">Nama Projek</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Peranan</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Jenis Kategori</th>
                  </tr>
              </thead>
            </table> 
          </div>
        </div>
    </div>
    {{-- <hr class="mt-3 line-horizontal-jkr">

    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div id="carta3"></div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div id="carta4"></div>
            </div>
        </div>
    </div> --}}
    {{-- <h4 class="mt-3" align="center">Senarai Projek</h4>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-bordered line-table">
                <thead class="text-white bg-orange-jkr">
                <tr>
                    <th scope="col" class="text-center">Bil.</th>
                    <th scope="col" class="text-center">ID Projek</th>
                    <th scope="col" class="text-center">ID Rujukan Skala</th>
                    <th scope="col" class="text-center">Nama Projek</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Bandar</th>
                    <th scope="col" class="text-center">Negeri</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <th>PR2333</th>
                    <th>SKL2091</th>
                    <th>Turap Jalan</th>
                    <th>Jalan</th>
                    <th>Sitiawan</th>
                    <th>Perak</th>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <th>PR1220</th>
                    <th>SKL129</th>
                    <th>Ubah Suai Siling</th>
                    <th>Bangunan</th>
                    <th>Kajang</th>
                    <th>Selangor</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div> --}}










</div><!--Container-->

<!--JavaScript-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>

<!--Projek DataTable-->
<script type="text/javascript">
  $(function() {

      var table = $('.projek-datatable').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          ajax: "/projek",
          columns: [
              {
                  data: 'nama',
                  name: 'nama'
              },
              {
                  data: 'alamat',
                  name: 'alamat'
              },
              {
                  data: 'peranan',
                  name: 'peranan'
              },                
              {
                  data: 'status',
                  name: 'status'
              },
              {
                  data: 'kategori',
                  name: 'kategori'
              },                                                                 
          ]
      });


  });
</script>

<!-- Chart code -->
<script>
    am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("carta1");


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
    text: "Bilangan Projek Mengikut Bintang",
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

<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("carta2");
    
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX:true
    }));
    
    chart.get("colors").set("step", 3);
    
    
    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      maxDeviation: 0.3,
      baseInterval: {
        timeUnit: "day",
        count: 1
      },
      renderer: am5xy.AxisRendererX.new(root, {}),
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      maxDeviation: 0.3,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));

    // Chart Title
    chart.children.unshift(am5.Label.new(root, {
    text: "Jumlah Markah Mengikut Tahun Berdasarkan Kategori",
    fontSize: 15,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 10,
    paddingBottom: 80
    }));
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.LineSeries.new(root, {
      name: "Series 1",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value1",
      valueXField: "date",
      tooltip: am5.Tooltip.new(root, {
        labelText: "{valueX}: {valueY}\n{previousDate}: {value2}"
      })
    }));
    
    series.strokes.template.setAll({
      strokeWidth: 2
    });
    
    series.get("tooltip").get("background").set("fillOpacity", 0.5);
    
    var series2 = chart.series.push(am5xy.LineSeries.new(root, {
      name: "Series 2",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value2",
      valueXField: "date"
    }));
    series2.strokes.template.setAll({
      strokeDasharray: [2, 2],
      strokeWidth: 2
    });
    
    // Set date fields
    // https://www.amcharts.com/docs/v5/concepts/data/#Parsing_dates
    root.dateFormatter.setAll({
      dateFormat: "yyyy-MM-dd",
      dateFields: ["valueX"]
    });
    
    
    // Set data
    var data = [{
      date: new Date(2019, 5, 12).getTime(),
      value1: 50,
      value2: 48,
      previousDate: new Date(2019, 5, 5)
    }, {
      date: new Date(2019, 5, 13).getTime(),
      value1: 53,
      value2: 51,
      previousDate: "2019-05-06"
    }, {
      date: new Date(2019, 5, 14).getTime(),
      value1: 56,
      value2: 58,
      previousDate: "2019-05-07"
    }, {
      date: new Date(2019, 5, 15).getTime(),
      value1: 52,
      value2: 53,
      previousDate: "2019-05-08"
    }, {
      date: new Date(2019, 5, 16).getTime(),
      value1: 48,
      value2: 44,
      previousDate: "2019-05-09"
    }, {
      date: new Date(2019, 5, 17).getTime(),
      value1: 47,
      value2: 42,
      previousDate: "2019-05-10"
    }, {
      date: new Date(2019, 5, 18).getTime(),
      value1: 59,
      value2: 55,
      previousDate: "2019-05-11"
    }]
    
    series.data.setAll(data);
    series2.data.setAll(data);
    
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    series2.appear(1000);
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>

<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("carta3");
    
    
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
    var legend = chart.children.push(am5.Legend.new(root, {
      centerX: am5.p50,
      x: am5.p50
    }));
    
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
    }];
    
    
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
      min: 0,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName, stacked) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        stacked: stacked,
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "year"
      }));
    
      series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}:{valueY}",
        width: am5.percent(90),
        tooltipY: am5.percent(10)
      });
      series.data.setAll(data);
    
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      series.appear();
    
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          locationY: 0.5,
          sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: am5.percent(50),
            centerX: am5.percent(50),
            populateText: true
          })
        });
      });
    
      legend.data.push(series);
    }
    
    makeSeries("Europe", "europe", false);
    makeSeries("North America", "namerica", true);
    makeSeries("Asia", "asia", false);
    makeSeries("Latin America", "lamerica", true);
    makeSeries("Middle East", "meast", true);
    makeSeries("Africa", "africa", true);
    
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>

<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("carta4");
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(
      am5percent.PieChart.new(root, {
        endAngle: 270
      })
    );
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(
      am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "category",
        endAngle: 270
      })
    );
    
    series.states.create("hidden", {
      endAngle: -90
    });
    
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
      category: "Lithuania",
      value: 501.9
    }, {
      category: "Czechia",
      value: 301.9
    }, {
      category: "Ireland",
      value: 201.1
    }, {
      category: "Germany",
      value: 165.8
    }, {
      category: "Australia",
      value: 139.9
    }, {
      category: "Austria",
      value: 128.3
    }, {
      category: "UK",
      value: 99
    }]);
    
    series.appear(1000, 100);
    
    }); // end am5.ready()
</script>

@endsection