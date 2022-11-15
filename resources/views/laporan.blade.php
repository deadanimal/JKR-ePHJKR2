@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="print.css">

<style>
    #senarai_projek_phjkr {
      width: 100%;
      height: 400px;
    }
    #phjkr_bangunan {
      width: 100%;
      height: 500px;
    }
    #phjkr_jalan {
      width: 100%;
      height: 500px;
    }
    #analisa_phjkr_bangunan {
      width: 100%;
      height: 400px;
    }
    #analisa_phjkr_jalan {
      width: 100%;
      height: 500px;
    }
    #tapak_lestari_bangunan {
      width: 100%;
      height: 500px;
     }
    #kecekapan_tenaga_bangunan {
      width: 100%;
      height: 500px;
    }
    #sumber_bahan_bangunan {
      width: 100%;
      height: 500px;
    }
    #kecekapan_penggunaan_air_bangunan {
      width: 100%;
      height: 500px;
    }
    #persekitaran_dalaman_bangunan {
      width: 100%;
      height: 500px;
    }
    #fasiliti_lestari_bangunan {
      width: 100%;
      height: 500px;
    }
    #inovasi_bangunan {
      width: 100%;
      height: 500px;
    }
    #tapak_lestari_bangunan_vp {
      width: 100%;
      height: 500px;
    }
    #kecekapan_tenaga_bangunan_vp {
      width: 100%;
      height: 500px;
    }
    #sumber_bahan_bangunan_vp {
      width: 100%;
      height: 500px;
    }
    #kecekapan_penggunaan_air_bangunan_vp {
      width: 100%;
      height: 500px;
    }
    #persekitaran_dalaman_bangunan_vp {
      width: 100%;
      height: 500px;
    }
    #fasiliti_lestari_bangunan_vp {
      width: 100%;
      height: 500px;
    }
    #inovasi_bangunan_vp {
      width: 100%;
      height: 500px;
    }

</style>


@section('content')
<div class="header">
    <b class="text-dark-green-jkr">Laporan</b>

<h1 class="jkr-header-title">
    ANALISA MODUL LAPORAN
</h1>
<hr class="line-horizontal-jkr">


</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3>Analisa Keseluruhan PHJKR (dari Tahun 2020)</h3>
            <h4>Senarai Projek PHJKR (Jalan & Bangunan)</h4>
                <div id="senarai_projek_phjkr"></div>
                <div id="phjkr_bangunan"></div>
                <div id="phjkr_jalan"></div>
        </div> 
    </div>

    <div class="card mt-6">
        <div class="card-body">
            <h3>Analisa PHJKR 2018-2021 (Bangunan)</h3>
            <div id="tapak_lestari_bangunan"></div>
            <div id="kecekapan_tenaga_bangunan"></div>
            <div id="sumber_bahan_bangunan"></div>
            <div id="kecekapan_penggunaan_air_bangunan"></div>
            <div id="persekitaran_dalaman_bangunan"></div>
            <div id="fasiliti_lestari_bangunan"></div>
            <div id="inovasi_bangunan"></div>
        </div>
    </div>
            

    <div class="card mt-6">
        <div class="card-body">
            <h3>Analisa PHJKR 2019-2022 (Bangunan) VP</h3>
                <div id="tapak_lestari_bangunan_vp"></div>
                <div id="kecekapan_tenaga_bangunan_vp"></div>
                <div id="sumber_bahan_bangunan_vp"></div>
                <div id="kecekapan_penggunaan_air_bangunan_vp"></div>
                <div id="persekitaran_dalaman_bangunan_vp"></div>
                <div id="fasiliti_lestari_bangunan_vp"></div>
                <div id="inovasi_bangunan_vp"></div>
        </div>
    </div>

    <div class="card mt-6">
        <div class="card-body">
            <h3>Analisa PHJKR 2018-2021 (Jalan)</h3>
            <h4>Bilangan Pencapaian mengikut Pematuhan Kriteria</h4>
            <h5>(Jumlah Projek Melaksanakan Kriteria) pHJKR JALAN</h5>
                <div id="analisa_phjkr_jalan"></div>
        </div>
    </div>

    <div class="card mt-6">
      <div class="card-body" id="senarai-projek">
          <h3>Senarai Projek yang telah Didaftar</h3>
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
            <div class="col text-center">
                <button class="btn btn-primary" onclick="printJS('senarai-projek', 'html')">Muat Turun</button>
            </div>
        </div>
      </div>
  </div>

</div>


<!------------JavaScript------------->

<!--Resource-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>

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
<!--Senarai Projek PHJKR (Jalan & Bangunan)-->
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("senarai_projek_phjkr");
    
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
        categoryField: "senaraiprojekphjkr",
        endAngle: 270
      })
    );
    
    series.states.create("hidden", {
      endAngle: -90
    });
    

    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
      senaraiprojekphjkr: "Senarai Projek yang Belum Penilaian PHJKR",
      value: 48
    }, {
      senaraiprojekphjkr: "Penilaian Bangunan",
      value: 29
    }, {
      senaraiprojekphjkr: "Penilaian Jalan",
      value: 23
    }]);
    
    series.appear(1000, 100);
    
    }); // end am5.ready()
</script>

<!--PHJKR Bangunan-->
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("phjkr_bangunan");
    
    
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
    
    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set("scrollbarX", am5.Scrollbar.new(root, {
      orientation: "horizontal"
    }));
    
    var data = [{
      "phjkrbangunan": "Projek Berdaftar yang Belum menjalankan Penilaian",
      "tiadaphjkr": 44
    }, {
      "phjkrbangunan": "Projek Berdaftar yang telah menjalankan Penilaian pHJKR",
      "phjkr": 61,
    }, {
      "phjkrbangunan": "PRB",
      "kosongbintang": 0,
      "limabintang": 5,
      "satubintang": 1,
      "duabintang": 14,
      "tigabintang": 9,
      "empatbintang": 5,
      "limabintang": 1
    }, {
      "phjkrbangunan": "VP",
      "satubintang": 0,
      "satubintang": 7,
      "duabintang": 16,
      "tigabintang": 9,
      "empatbintang": 2,
      "limabintang": 0
    }, {
      "phjkrbangunan": "VL",
      "empatbintang": 0,
      "empatbintang": 1,
      "limabintang": 0
    }, {
      "phjkrbangunan": "GPSS",
      "kosongbintang": 0,
      "kosongbintang": 1,
      "limabintang": 0
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "phjkrbangunan",
      renderer: am5xy.AxisRendererX.new(root, {}),
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    xAxis.data.setAll(data);
    
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      min: 0,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));

    chart.children.unshift(am5.Label.new(root, {
    text: "PHJKR Bangunan",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));

    // labels
    xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
    
    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(am5.Legend.new(root, {
      centerX: am5.p50,
      x: am5.p50
    }));
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        stacked: true,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "phjkrbangunan"
      }));
    
      series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}: {valueY}",
        tooltipY: am5.percent(10)
      });
      series.data.setAll(data);
    
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      series.appear();
    
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: am5.p50,
            centerX: am5.p50,
            populateText: true
          })
        });
      });
    
      legend.data.push(series);
    }
    
    makeSeries("Tiada pHJKR", "tiadaphjkr");
    makeSeries("pHJKR", "phjkr");
    makeSeries("0 Bintang", "kosongbintang");
    makeSeries("1 Bintang", "satubintang");
    makeSeries("2 Bintang", "duabintang");
    makeSeries("3 Bintang", "tigabintang");
    makeSeries("4 Bintang", "empatbintang");
    makeSeries("5 Bintang", "limabintang");

    // makeSeries("Europe", "europe");
    // makeSeries("North America", "namerica");
    // makeSeries("Asia", "asia");
    // makeSeries("Latin America", "lamerica");
    // makeSeries("Middle Kecekapan Tenaga", "meast");
    // makeSeries("Africa", "africa");
    
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>

<!--PHJKR Jalan-->
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("phjkr_jalan");
    
    
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
    
    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set("scrollbarX", am5.Scrollbar.new(root, {
      orientation: "horizontal"
    }));
    
    var data = [{
      "phjkrjalan": "Projek Berdaftar yang Belum menjalankan Penilaian",
      "tiadaphjkr": 48
    }, {
      "phjkrjalan": "Projek Berdaftar yang telah menjalankan Penilaian pHJKR",
      "phjkr": 49,
    }, {
      "phjkrjalan": "PRB",
      "kosongbintang": 0,
      "limabintang": 5,
      "satubintang": 1,
      "duabintang": 14,
      "tigabintang": 9,
      "empatbintang": 5,
      "limabintang": 1
    }, {
      "phjkrjalan": "VP",
      "satubintang": 0,
      "satubintang": 7,
      "duabintang": 16,
      "tigabintang": 9,
      "empatbintang": 2,
      "limabintang": 0
    }, {
      "phjkrjalan": "VL",
      "empatbintang": 0,
      "empatbintang": 1,
      "limabintang": 0
    }, {
      "phjkrjalan": "GPSS",
      "kosongbintang": 0,
      "kosongbintang": 1,
      "limabintang": 0
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "phjkrjalan",
      renderer: am5xy.AxisRendererX.new(root, {}),
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    xAxis.data.setAll(data);
    
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      min: 0,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));
    
    chart.children.unshift(am5.Label.new(root, {
    text: "PHJKR Jalan",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));

    // labels
    xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });

    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(am5.Legend.new(root, {
      centerX: am5.p50,
      x: am5.p50
    }));
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        stacked: true,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "phjkrjalan"
      }));
    
      series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}: {valueY}",
        tooltipY: am5.percent(10)
      });
      series.data.setAll(data);
    
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      series.appear();
    
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: am5.p50,
            centerX: am5.p50,
            populateText: true
          })
        });
      });
    
      legend.data.push(series);
    }
    
    makeSeries("Tiada pHJKR", "tiadaphjkr");
    makeSeries("pHJKR", "phjkr");
    makeSeries("0 Bintang", "kosongbintang");
    makeSeries("1 Bintang", "satubintang");
    makeSeries("2 Bintang", "duabintang");
    makeSeries("3 Bintang", "tigabintang");
    makeSeries("4 Bintang", "empatbintang");
    makeSeries("5 Bintang", "limabintang");
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>

<!--Analisa PHJKR 2018-2021 (Bangunan)-->
{{-- TL --}}
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("tapak_lestari_bangunan");
  
  
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
    "kriteria": "Perancangan Tapak",
    "TL1": 77
  }, {
    "kriteria": "Sistem Pengurusan Alam Sekitar (SPAS)",
    "TL2": 86
  }, {
    "kriteria": "Kerja Tanah Lestari - i. Pemotongan dan Penambakan tanah",
    "TL3 (i)": 55
  }, {
    "kriteria": "Mengekalkan Topografi Tanah",
    "TL32 (ii)": 50
  }, {
    "kriteria": "Pelan Kawalan Hakisan dan Kelodak (ESCP)",
    "TL4": 86
  }, {
    "kriteria": "Pemuliharaan dan Pemeliharaan Cerun",
    "TL5": 0
  }, {
    "kriteria": "Pengurusan Air Larian Hujan",
    "TL6": 86
  }, {
    "kriteria": "Rekabentuk, Aksebiliti dan Kemudahan OKU",
    "TL7": 86
  }, {
    "kriteria": "Memelihara dan menyenggara pokok yang matang",
    "TL8": 14
  }, {
    "kriteria": "Menyediakan kawasan hijau",
    "TL8.2": 86
  }, {
    "kriteria": "Menyedia dan menyenggara penanaman pokok teduhan",
    "TL8.3": 64
  }, {
    "kriteria": "Pemilihan bahan binaan siarkaki (walkway) yang mempunyai daya pantulan haba yang tinggi",
    "TL8.4": 45
  }, {
    "kriteria": "Menyedia dan menyenggara sistem turapan berumput",
    "TL8.5": 18
  }, {
    "kriteria": "Indeks Pantulan Suria (SRI) mengikut jenis & kecerunan bumbung",
    "TL9.1": 41
  }, {
    "kriteria": "Menggalakkan rekabentuk bumbung/ dinding hijau",
    "TL9.2": 14
  }, {
    "kriteria": "Tempat Letak Kenderaan",
    "TL10": 68
  }]
  
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "kriteria",
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

  chart.children.unshift(am5.Label.new(root, {
  text: "Tapak Lestari",
  fontSize: 25,
  fontWeight: "500",
  textAlign: "center",
  x: am5.percent(50),
  centerX: am5.percent(50),
  paddingTop: 0,
  paddingBottom: 0
  }));
  // labels
  xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
  
  
  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "kriteria"
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
  
  makeSeries("TL1", "TL1");
  makeSeries("TL2", "TL2");
  makeSeries("TL3 (i)", "TL3 (i)");
  makeSeries("TL32 (ii)", "TL32 (ii)");
  makeSeries("TL4", "TL4");
  makeSeries("TL7", "TL7");
  makeSeries("TL8", "TL8");
  makeSeries("TL8.2", "TL8.2");
  makeSeries("TL8.3", "TL8.3");
  makeSeries("TL8.4", "TL8.4");
  makeSeries("TL8.5", "TL8.5");
  makeSeries("TL9.1", "TL9.1");
  makeSeries("TL9.2", "TL9.2");
  makeSeries("TL10", "TL10");
  
  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
</script>

{{-- KT --}}
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("kecekapan_tenaga_bangunan");
  
  
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
    "kriteria": "U-value Bumbung/Rekabentuk bumbung",
    "KT1": 68
  }, {
    "kriteria": "Penggunaan penebat bumbung",
    "KT1 (1.2)": 78
  }, {
    "kriteria": "Fasad utama bangunan yang menghadap orientasi utara-selatan",
    "KT 2.1": 68
  }, {
    "kriteria": "Meminimumkan bukaan pada fasad yang menghadap timur dan barat",
    "KT2.2": 73
  }, {
    "kriteria": "Dinding luar bangunan",
    "KT3.1": 59
  }, {
    "kriteria": "Pemilihan Kaca Luaran",
    "KT3 (3.2)": 33
  }, {
    "kriteria": "Pengadang Suria Luaran",
    "KT3.2": 45
  }, {
    "kriteria": "OTTV dan RTTV",
    "KT4": 50
  }, {
    "kriteria": "Zon Pencahayaan",
    "KT5.1": 91
  }, {
    "kriteria": "Kawalan pencahayaan (M)",
    "KT5.2": 100
  }, {
    "kriteria": "Lighting Power Density (LPD)",
    "KT5.3": 86
  }, {
    "kriteria": "Coefficient of Performance (COP)",
    "KT6.1": 59
  }, {
    "kriteria": "Green Refrigerant",
    "KT6.2": 77
  }, {
    "kriteria": "Penyusupan Udara",
    "KT7": 82
  }, {
    "kriteria": "Tenaga Boleh Baharu (TBB)",
    "KT8": 5
  }, {
    "kriteria": "Prestasi Penggunaan Tenaga",
    "KT9": 23
  }, {
    "kriteria": "Pemasangan sub-meter digital",
    "KT10.1": 59
  }, {
    "kriteria": "Sistem Pengurusan Kawalan Tenaga",
    "KT10.2": 27
  }, {
    "kriteria": "Verifikasi sistem paparan dan kawalan",
    "KT10.3": 23
  }, {
    "kriteria": "Pengujian dan pentauliahan",
    "KT11": 86
  }]
  
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "kriteria",
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

  // title
  chart.children.unshift(am5.Label.new(root, {
  text: "Kecekapan Tenaga",
  fontSize: 25,
  fontWeight: "500",
  textAlign: "center",
  x: am5.percent(50),
  centerX: am5.percent(50),
  paddingTop: 0,
  paddingBottom: 0
  }));
  // labels
    xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
  
  
  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "kriteria"
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
  
  makeSeries("KT1", "KT1");
  makeSeries("KT1 (1.2)", "KT1 (1.2)");
  makeSeries("KT2.1", "KT2.1");
  makeSeries("KT2.2", "KT2.2");
  makeSeries("KT3.1", "KT3.1");
  makeSeries("KT3 (3.2)", "KT3 (3.2)");
  makeSeries("KT3.2", "KT3.2");
  makeSeries("KT4", "KT4");
  makeSeries("KT5.1", "KT5.1");
  makeSeries("KT5.2", "KT5.2");
  makeSeries("KT5.3", "KT5.3");
  makeSeries("KT6.1", "KT6.1");
  makeSeries("KT6.2", "KT6.2");
  makeSeries("KT7", "KT7");
  makeSeries("KT8", "KT8");
  makeSeries("KT9", "KT9");
  makeSeries("KT10.1", "KT10.1");
  makeSeries("KT10.2", "KT10.2");
  makeSeries("KT10.3", "KT10.3");
  makeSeries("KT11", "KT11");

  
  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
</script>

{{-- SB --}}
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("sumber_bahan_bangunan");
  
  
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
    "kriteria": "Sistem Binaan Berindustri (IBS)",
    "SB1": 68
  }, {
    "kriteria": "Produk hijau",
    "SB2": 78
  }, {
    "kriteria": "Pengurusan sisa semasa pembinaan",
    "SB3": 68
  }, {
    "kriteria": "Meminimumkan bukaan pada fasad yang menghadap timur dan barat",
    "SB4": 73
  }]
  
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "kriteria",
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

  chart.children.unshift(am5.Label.new(root, {
  text: "Sumber dan Bahan",
  fontSize: 25,
  fontWeight: "500",
  textAlign: "center",
  x: am5.percent(50),
  centerX: am5.percent(50),
  paddingTop: 0,
  paddingBottom: 0
  }));
  // labels
  xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
  
  
  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "kriteria"
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
  
  makeSeries("SB1", "SB1");
  makeSeries("SB2", "SB2");
  makeSeries("SB3", "SB3");
  makeSeries("SB4", "SB4");
  
  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
</script>

{{-- PA --}}
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("kecekapan_penggunaan_air_bangunan");
  
  
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
    "kriteria": "Produk Kecekapan Air",
    "PA1": 36
  }, {
    "kriteria": "Penjimatan Penggunaan Air Dalam Bangunan",
    "PA2 (2.1)": 36
  }, {
    "kriteria": "Luar Bangunan",
    "PA2 (2.2)": 22
  }, {
    "kriteria": "Sistem Pengumpulan Air Hujan (SPAH)",
    "PA3 (i)": 32
  }, {
    "kriteria": "Kitar Semula Air Sisa",
    "PA3 (ii)": 0
  }, {
    "kriteria": "Sub-Meter Air",
    "PA4": 45
  }, {
    "kriteria": "Sistem Pengesan Kebocoran Air",
    "PA5": 5
  }]
  
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "kriteria",
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

  chart.children.unshift(am5.Label.new(root, {
  text: "Kecekapan Penggunaan Air",
  fontSize: 25,
  fontWeight: "500",
  textAlign: "center",
  x: am5.percent(50),
  centerX: am5.percent(50),
  paddingTop: 0,
  paddingBottom: 0
  }));
  // labels
  xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
  
  
  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "kriteria"
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
  
  makeSeries("PA1", "PA1");
  makeSeries("PA2 (2.1)", "PA2 (2.1)");
  makeSeries("PA2 (2.2)", "PA2 (2.2)");
  makeSeries("PA3 (i)", "PA3 (i)");
  makeSeries("PA3 (ii)", "PA3 (ii)");
  makeSeries("PA4", "PA4");
  makeSeries("PA5", "PA5");

  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
</script>

{{-- PD --}}
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("persekitaran_dalaman_bangunan");
  
  
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
    "kriteria": "Larangan merokok",
    "PD1": 68
  }, {
    "kriteria": "Lebar bangunan yang efektif (no deep planning)",
    "PD2 (2.1)": 78
  }, {
    "kriteria": "Susunatur ruang pejabat terbuka sepanjang permukaan fasad",
    "PD2 (2.2)": 68
  }, {
    "kriteria": "Dinding sesekat dalaman yang telus cahaya",
    "PD2 (2.3)": 73
  }, {
    "kriteria": "Ketinggian siling yang efektif",
    "PD2 (2.4)": 59
  }, {
    "kriteria": "Warna cerah di permukaan dinding dan siling",
    "PD2 (2.5)": 33
  }, {
    "kriteria": "Faktor Pencahayaan Siang (DF)",
    "PD3 (3.1)": 45
  }, {
    "kriteria": "Menggunakan rak cahaya (light shelves)",
    "PD3 (3.2)": 50
  }, {
    "kriteria": "Kawalan Tahap Kesilauan",
    "PD3 (3.3)": 91
  }, {
    "kriteria": "Akses visual kepada pandangan di luar",
    "PD3 (3.4)": 100
  }, {
    "kriteria": "Tahap Pencahayaan (bukan semulajadi) Bilik",
    "PD3 (3.5)": 86
  }, {
    "kriteria": "Memaksimakan Kawasan Tanpa Keperluan Sistem Penyaman Udara",
    "PD4 (4.1)": 59
  }, {
    "kriteria": "Prestasi Kualiti Udara Dalaman : ASHRAE 62.1:2007 & 129",
    "PD4 (4.2)": 77
  }, {
    "kriteria": "Rekabentuk Keselesaan Thermal: ASHRAE 55",
    "PD5 (5.1)": 82
  }, {
    "kriteria": "Kawalan Sistem Pencahayaan& Pengudaraan",
    "PD5 (5.2)": 5
  }, {
    "kriteria": "Kawalan Paras Karbon Dioksida",
    "PD6 (6.1)": 23
  }, {
    "kriteria": "Kualiti Persekitaran Semasa Pembinaan & Sebelum Diduduki",
    "PD (6.2)": 59
  }, {
    "kriteria": "Keselesaan Akustik",
    "PD7": 27
  }, {
    "kriteria": "Kualiti Udara Dalaman (IAQ)",
    "PD8": 23
  }, {
    "kriteria": "Pencegahan Kulapuk (Mold)",
    "PD9": 86
  }, {
    "kriteria": "Kaji Selidik Keselesaan Penghuni",
    "PD10": 86
  }]
  
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "kriteria",
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

  chart.children.unshift(am5.Label.new(root, {
  text: "Persekitaran Dalaman",
  fontSize: 25,
  fontWeight: "500",
  textAlign: "center",
  x: am5.percent(50),
  centerX: am5.percent(50),
  paddingTop: 0,
  paddingBottom: 0
  }));
  // labels
  xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
  
  
  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "kriteria"
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
  
  makeSeries("PD1", "PD1");
  makeSeries("PD2 (2.1)", "PD2 (2.1)");
  makeSeries("PD2 (2.2)", "PD2 (2.2)");
  makeSeries("PD2 (2.3)", "PD2 (2.3)");
  makeSeries("PD2 (2.4)", "PD2 (2.4)");
  makeSeries("PD2 (2.5)", "PD2 (2.5)");
  makeSeries("PD3 (3.1)", "PD3 (3.1)");
  makeSeries("PD3 (3.2)", "PD3 (3.2)");
  makeSeries("PD3 (3.3)", "PD3 (3.3)");
  makeSeries("PD3 (3.4)", "PD3 (3.4)");
  makeSeries("PD3 (3.5)", "PD3 (3.5)");
  makeSeries("PD4 (4.1)", "PD4 (4.1)");
  makeSeries("PD4 (4.2)", "PD4 (4.2)");
  makeSeries("PD5 (5.1)", "PD5 (5.1)");
  makeSeries("PD (5.2)", "PD (5.2)");
  makeSeries("PD6.1", "PD6.1");
  makeSeries("PD6.2", "PD6.2");
  makeSeries("PD7", "PD7");
  makeSeries("PD8", "PD8");
  makeSeries("PD9", "PD9");
  makeSeries("PD10", "PD10");

  
  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
</script>

{{-- FL --}}
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("fasiliti_lestari_bangunan");
  
  
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
    "kriteria": "Ruang Pejabat untuk pasukan penyenggaraan",
    "FL3.1": 73
  }, {
    "kriteria": "Kontraktor Penyenggaraan / Prestasi Pengurusan",
    "FL3.2": 23
  }, {
    "kriteria": "Pelan Pengurusan Fasiliti (FM)",
    "FL3.3": 18
  }, {
    "kriteria": "Manual Operasi dan Penyenggaraan Bangunan",
    "FL3.4": 27
  }]
  
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "kriteria",
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

  chart.children.unshift(am5.Label.new(root, {
  text: "Fasiliti Lestari",
  fontSize: 25,
  fontWeight: "500",
  textAlign: "center",
  x: am5.percent(50),
  centerX: am5.percent(50),
  paddingTop: 0,
  paddingBottom: 0
  }));
  // labels
  xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
  
  
  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "kriteria"
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
  
  makeSeries("FL3.1", "FL3.1");
  makeSeries("FL3.2", "FL3.2");
  makeSeries("FL3.3", "FL3.3");
  makeSeries("FL3.4", "FL3.4");
  
  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
</script>

{{-- IN --}}
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("inovasi_bangunan");
  
  
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
    "kriteria": "Reka Bentuk Inovasi",
    "IN1": 41
  }]
  
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "kriteria",
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

  // chart title
  chart.children.unshift(am5.Label.new(root, {
  text: "Inovasi",
  fontSize: 25,
  fontWeight: "500",
  textAlign: "center",
  x: am5.percent(50),
  centerX: am5.percent(50),
  paddingTop: 0,
  paddingBottom: 0
  }));
  // labels
  xAxis.get("renderer").labels.template.setAll({
    oversizedBehavior: "wrap",
    maxWidth: 150,
    textAlign: "center"
    });
  
  
  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "kriteria"
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
  
  makeSeries("IN1", "IN1");

  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
</script>


<!--Analisa PHJKR 2019-2022 (Bangunan) VP -->
{{-- TL --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("tapak_lestari_bangunan_vp");
    
    
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
      "kriteria": "Perancangan Tapak",
      "TL1": 80
    }, {
      "year": "Sistem Pengurusan Alam Sekitar",
      "TL2": 94
    }, {
      "year": "Kerja Tanah Lestari",
      "TL31": 65
    }, {
      "year": "Mengekalakan Topografi Tanah",
      "TL32": 50
    }, {
      "year": "Kawalan Hakisan Kelodak dan Endapan",
      "TL4": 94
    }, {
      "year": "Pemuliharaan dan Pemeliharaan Cerun",
      "TL7": 0
    }, {
      "year": "Pengurusan Air Larian Hujan",
      "TL8": 88
    }, {
      "year": "Rekabentuk Mesra Orang Kurang Upaya (OKU)",
      "TL8.2": 100
    }, {
      "year": "Memulihara pokok-pokok yang matang",
      "TL2": 6
    }, {
      "year": "Kawasan hijau dalam pembangunan",
      "TL2": 47
    }, {
      "year": "Penanaman pokok teduhan",
      "TL2": 35
    }, {
      "year": "Pemilihan bahan binaan siarkaki (walkway) yang mempunyai daya pantulan haba yang tinggi",
      "TL2": 76
    }, {
      "year": "Sistem turapan berumput (berongga)",
      "TL2": 18
    }, {
      "year": "Indeks Pantulan Suria (SRI) mengikut jenis & kecerunan bumbung",
      "TL2": 41
    }, {
      "year": "Menggalakkan rekabentuk bumbung/ dinding hijau",
      "TL2": 6
    }, {
      "year": "Tempat Letak Kenderaan Hijau",
      "TL2": 29
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

    // Title
    chart.children.unshift(am5.Label.new(root, {
    text: "Tapak Lestari",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));
    
    // label x-axis
    xAxis.get("renderer").labels.template.setAll({
        oversizedBehavior: "wrap",
        maxWidth: 150,
        textAlign: "center"
    });
    
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
    
    makeSeries("TL1", "TL1");
    makeSeries("TL2", "TL2");
    makeSeries("TL31", "TL31");
    makeSeries("TL32", "TL32");
    makeSeries("TL4", "TL4");
    makeSeries("TL7", "TL7");
    makeSeries("TL8", "TL8");
    makeSeries("TL8.2", "TL8.2");
    makeSeries("TL8.3", "TL8.3");
    makeSeries("TL8.4", "TL8.4");
    makeSeries("TL8.5", "TL8.5");
    makeSeries("TL9.1", "TL9.1");
    makeSeries("TL9.2", "TL9.2");
    makeSeries("TL10", "TL10");

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>
  
  {{-- KT --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("kecekapan_tenaga_bangunan_vp");
    
    
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
      "kriteria": "U-value Bumbung/Rekabentuk bumbung",
      "KT1": 48
    }, {
      "kriteria": "Penggunaan penebat bumbung",
      "KT1 (1.2)": 39
    }, {
      "kriteria": "Fasad utama bangunan yang menghadap orientasi utara-selatan",
      "KT 2.1": 35
    }, {
      "kriteria": "Meminimumkan bukaan pada fasad yang menghadap timur dan barat",
      "KT2.2": 58
    }, {
      "kriteria": "Dinding luar bangunan",
      "KT3.1": 61
    }, {
      "kriteria": "Pemilihan Kaca Luaran",
      "KT3 (3.2)": 45
    }, {
      "kriteria": "Pengadang Suria Luaran",
      "KT3.2": 42
    }, {
      "kriteria": "OTTV dan RTTV",
      "KT4": 48
    }, {
      "kriteria": "Zon Pencahayaan",
      "KT5.1": 68
    }, {
      "kriteria": "Kawalan pencahayaan (M)",
      "KT5.2": 65
    }, {
      "kriteria": "Lighting Power Density (LPD)",
      "KT5.3": 55
    }, {
      "kriteria": "Coefficient of Performance (COP)",
      "KT6.1": 58
    }, {
      "kriteria": "Green Refrigerant",
      "KT6.2": 65
    }, {
      "kriteria": "Penyusupan Udara",
      "KT7": 65
    }, {
      "kriteria": "Tenaga Boleh Baharu (TBB)",
      "KT8": 16
    }, {
      "kriteria": "Prestasi Penggunaan Tenaga",
      "KT9": 58
    }, {
      "kriteria": "Pemasangan sub-meter digital",
      "KT10.1": 52
    }, {
      "kriteria": "Sistem Pengurusan Kawalan Tenaga",
      "KT10.2": 29
    }, {
      "kriteria": "Verifikasi sistem paparan dan kawalan",
      "KT10.3": 26
    }, {
      "kriteria": "Pengujian dan pentauliahan",
      "KT11": 61
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "kriteria",
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
  
    // title
    chart.children.unshift(am5.Label.new(root, {
    text: "Kecekapan Tenaga",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));
    // labels
      xAxis.get("renderer").labels.template.setAll({
      oversizedBehavior: "wrap",
      maxWidth: 150,
      textAlign: "center"
      });
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "kriteria"
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
    
    makeSeries("KT1", "KT1");
    makeSeries("KT1 (1.2)", "KT1 (1.2)");
    makeSeries("KT2.1", "KT2.1");
    makeSeries("KT2.2", "KT2.2");
    makeSeries("KT3.1", "KT3.1");
    makeSeries("KT3 (3.2)", "KT3 (3.2)");
    makeSeries("KT3.2", "KT3.2");
    makeSeries("KT4", "KT4");
    makeSeries("KT5.1", "KT5.1");
    makeSeries("KT5.2", "KT5.2");
    makeSeries("KT5.3", "KT5.3");
    makeSeries("KT6.1", "KT6.1");
    makeSeries("KT6.2", "KT6.2");
    makeSeries("KT7", "KT7");
    makeSeries("KT8", "KT8");
    makeSeries("KT9", "KT9");
    makeSeries("KT10.1", "KT10.1");
    makeSeries("KT10.2", "KT10.2");
    makeSeries("KT10.3", "KT10.3");
    makeSeries("KT11", "KT11");
  
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>
  
  {{-- SB --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("sumber_bahan_bangunan_vp");
    
    
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
      "kriteria": "Sistem Binaan Berindustri (IBS)",
      "SB1": 65
    }, {
      "kriteria": "Produk hijau",
      "SB2": 12
    }, {
      "kriteria": "Pengurusan sisa semasa pembinaan",
      "SB3": 88
    }, {
      "kriteria": "Meminimumkan bukaan pada fasad yang menghadap timur dan barat",
      "SB4": 94
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "kriteria",
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
  
    chart.children.unshift(am5.Label.new(root, {
    text: "Sumber dan Bahan",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));
    // labels
    xAxis.get("renderer").labels.template.setAll({
      oversizedBehavior: "wrap",
      maxWidth: 150,
      textAlign: "center"
      });
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "kriteria"
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
    
    makeSeries("SB1", "SB1");
    makeSeries("SB2", "SB2");
    makeSeries("SB3", "SB3");
    makeSeries("SB4", "SB4");
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>
  
  {{-- PA --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("kecekapan_penggunaan_air_bangunan_vp");
    
    
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
      "kriteria": "Produk Kecekapan Air",
      "PA1": 35
    }, {
      "kriteria": "Penjimatan Penggunaan Air Dalam Bangunan",
      "PA2 (2.1)": 29
    }, {
      "kriteria": "Luar Bangunan",
      "PA2 (2.2)": 18
    }, {
      "kriteria": "Sistem Pengumpulan Air Hujan (SPAH)",
      "PA3 (i)": 53
    }, {
      "kriteria": "Kitar Semula Air Sisa",
      "PA3 (ii)": 0
    }, {
      "kriteria": "Sub-Meter Air",
      "PA4": 41
    }, {
      "kriteria": "Sistem Pengesan Kebocoran Air",
      "PA5": 18
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "kriteria",
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
  
    chart.children.unshift(am5.Label.new(root, {
    text: "Kecekapan Penggunaan Air",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));
    // labels
    xAxis.get("renderer").labels.template.setAll({
      oversizedBehavior: "wrap",
      maxWidth: 150,
      textAlign: "center"
      });
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "kriteria"
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
    
    makeSeries("PA1", "PA1");
    makeSeries("PA2 (2.1)", "PA2 (2.1)");
    makeSeries("PA2 (2.2)", "PA2 (2.2)");
    makeSeries("PA3 (i)", "PA3 (i)");
    makeSeries("PA3 (ii)", "PA3 (ii)");
    makeSeries("PA4", "PA4");
    makeSeries("PA5", "PA5");
  
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>
  
  {{-- PD --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("persekitaran_dalaman_bangunan_vp");
    
    
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
      "kriteria": "Larangan merokok",
      "PD1": 88
    }, {
      "kriteria": "Lebar bangunan yang efektif (no deep planning)",
      "PD2 (2.1)": 65
    }, {
      "kriteria": "Susunatur ruang pejabat terbuka sepanjang permukaan fasad",
      "PD2 (2.2)": 71
    }, {
      "kriteria": "Dinding sesekat dalaman yang telus cahaya",
      "PD2 (2.3)": 76
    }, {
      "kriteria": "Ketinggian siling yang efektif",
      "PD2 (2.4)": 100
    }, {
      "kriteria": "Warna cerah di permukaan dinding dan siling",
      "PD2 (2.5)": 100
    }, {
      "kriteria": "Faktor Pencahayaan Siang (DF)",
      "PD3 (3.1)": 71
    }, {
      "kriteria": "Menggunakan rak cahaya (light shelves)",
      "PD3 (3.2)": 0
    }, {
      "kriteria": "Kawalan Tahap Kesilauan",
      "PD3 (3.3)": 94
    }, {
      "kriteria": "Akses visual kepada pandangan di luar",
      "PD3 (3.4)": 94
    }, {
      "kriteria": "Tahap Pencahayaan (bukan semulajadi) Bilik",
      "PD3 (3.5)": 76
    }, {
      "kriteria": "Memaksimakan Kawasan Tanpa Keperluan Sistem Penyaman Udara",
      "PD4 (4.1)": 82
    }, {
      "kriteria": "Prestasi Kualiti Udara Dalaman : ASHRAE 62.1:2007 & 129",
      "PD4 (4.2)": 65
    }, {
      "kriteria": "Rekabentuk Keselesaan Thermal: ASHRAE 55",
      "PD5 (5.1)": 88
    }, {
      "kriteria": "Kawalan Sistem Pencahayaan& Pengudaraan",
      "PD5 (5.2)": 88
    }, {
      "kriteria": "Kawalan Paras Karbon Dioksida",
      "PD6 (6.1)": 35
    }, {
      "kriteria": "Kualiti Persekitaran Semasa Pembinaan & Sebelum Diduduki",
      "PD (6.2)": 41
    }, {
      "kriteria": "Keselesaan Akustik",
      "PD7": 47
    }, {
      "kriteria": "Kualiti Udara Dalaman (IAQ)",
      "PD8": 82
    }, {
      "kriteria": "Pencegahan Kulapuk (Mold)",
      "PD9": 71
    }, {
      "kriteria": "Kaji Selidik Keselesaan Penghuni",
      "PD10": 65
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "kriteria",
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
  
    chart.children.unshift(am5.Label.new(root, {
    text: "Persekitaran Dalaman",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));
    // labels
    xAxis.get("renderer").labels.template.setAll({
      oversizedBehavior: "wrap",
      maxWidth: 150,
      textAlign: "center"
      });
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "kriteria"
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
    
    makeSeries("PD1", "PD1");
    makeSeries("PD2 (2.1)", "PD2 (2.1)");
    makeSeries("PD2 (2.2)", "PD2 (2.2)");
    makeSeries("PD2 (2.3)", "PD2 (2.3)");
    makeSeries("PD2 (2.4)", "PD2 (2.4)");
    makeSeries("PD2 (2.5)", "PD2 (2.5)");
    makeSeries("PD3 (3.1)", "PD3 (3.1)");
    makeSeries("PD3 (3.2)", "PD3 (3.2)");
    makeSeries("PD3 (3.3)", "PD3 (3.3)");
    makeSeries("PD3 (3.4)", "PD3 (3.4)");
    makeSeries("PD3 (3.5)", "PD3 (3.5)");
    makeSeries("PD4 (4.1)", "PD4 (4.1)");
    makeSeries("PD4 (4.2)", "PD4 (4.2)");
    makeSeries("PD5 (5.1)", "PD5 (5.1)");
    makeSeries("PD (5.2)", "PD (5.2)");
    makeSeries("PD6.1", "PD6.1");
    makeSeries("PD6.2", "PD6.2");
    makeSeries("PD7", "PD7");
    makeSeries("PD8", "PD8");
    makeSeries("PD9", "PD9");
    makeSeries("PD10", "PD10");
  
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>
  
  {{-- FL --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("fasiliti_lestari_bangunan_vp");
    
    
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
      "kriteria": "Ruang Pejabat untuk pasukan penyenggaraan",
      "FL3.1": 61
    }, {
      "kriteria": "Kontraktor Penyenggaraan / Prestasi Pengurusan",
      "FL3.2": 35
    }, {
      "kriteria": "Pelan Pengurusan Fasiliti (FM)",
      "FL3.3": 35
    }, {
      "kriteria": "Manual Operasi dan Penyenggaraan Bangunan",
      "FL3.4": 61
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "kriteria",
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
  
    chart.children.unshift(am5.Label.new(root, {
    text: "Fasiliti Lestari",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));
    // labels
    xAxis.get("renderer").labels.template.setAll({
      oversizedBehavior: "wrap",
      maxWidth: 150,
      textAlign: "center"
      });
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "kriteria"
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
    
    makeSeries("FL3.1", "FL3.1");
    makeSeries("FL3.2", "FL3.2");
    makeSeries("FL3.3", "FL3.3");
    makeSeries("FL3.4", "FL3.4");
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>
  
  {{-- IN --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("inovasi_bangunan_vp");
    
    
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
      "kriteria": "Reka Bentuk Inovasi",
      "IN1": 88
    }]
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "kriteria",
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
  
    // chart title
    chart.children.unshift(am5.Label.new(root, {
    text: "Inovasi",
    fontSize: 25,
    fontWeight: "500",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 0
    }));
    // labels
    xAxis.get("renderer").labels.template.setAll({
      oversizedBehavior: "wrap",
      maxWidth: 150,
      textAlign: "center"
      });
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "kriteria"
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
    
    makeSeries("IN1", "IN1");
  
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>

<!--Analisa PHJKR 2018-2021 (Jalan)-->
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("analisa_phjkr_jalan");
    
    
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
    
    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 10 });
    xRenderer.labels.template.setAll({
      rotation: -90,
      centerY: am5.p50,
      centerX: am5.p100,
      paddingRight: 15
    });
    
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      maxDeviation: 0.3,
      categoryField: "bilangan",
      renderer: xRenderer,
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      maxDeviation: 0.3,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));
    
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: "Series 1",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      sequencedInterpolation: true,
      categoryXField: "bilangan",
      tooltip: am5.Tooltip.new(root, {
        labelText:"{valueY}"
      })
    }));
    
    series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
    series.columns.template.adapters.add("fill", function(fill, target) {
      return chart.get("colors").getIndex(series.columns.indexOf(target));
    });
    
    series.columns.template.adapters.add("stroke", function(stroke, target) {
      return chart.get("colors").getIndex(series.columns.indexOf(target));
    });
    
    
    // Set data
    var data = [{
      bilangan: "SM 1",
      value: 30
    }, {
      bilangan: "SM 2",
      value: 30
    }, {
      bilangan: "SM 3",
      value: 29
    }, {
      bilangan: "SM 4",
      value: 26
    }, {
      bilangan: "PT 1",
      value: 9
    }, {
      bilangan: "PT 2",
      value: 25
    }, {
      bilangan: "PT 3",
      value: 0
    }, {
      bilangan: "PT 4",
      value: 27
    }, {
      bilangan: "EW 1",
      value: 27
    }, {
      bilangan: "EW 2",
      value: 19
    }, {
      bilangan: "AE 1",
      value: 30
    }, {
      bilangan: "CA 1",
      value: 0
    }, {
      bilangan: "CA 2",
      value: 29
    }, {
      bilangan: "CA 3",
      value: 26
    }, {
      bilangan: "CA 4",
      value: 29
    }, {
      bilangan: "CA 5",
      value: 29
    }, {
      bilangan: "CA 6",
      value: 26
    }, {
      bilangan: "CA 7",
      value: 29
    }, {
      bilangan: "MR 1",
      value: 26
    }, {
      bilangan: "MR 2",
      value: 0
    }, {
      bilangan: "MR 3",
      value: 11
    }, {
      bilangan: "MR 4",
      value: 12
    }, {
      bilangan: "SM 5 - EC",
      value: 0
    }, {
      bilangan: "SM 6 - EC",
      value: 3
    }, {
      bilangan: "EW 3 - EC",
      value: 2
    }, {
      bilangan: "AE 2 - EC",
      value: 1
    }, {
      bilangan: "AE 3 - EC",
      value: 6
    }, {
      bilangan: "AE 4 - EC",
      value: 24
    }, {
      bilangan: "AE 5 - EC",
      value: 2
    }, {
      bilangan: "AE 6 - EC",
      value: 0
    }, {
      bilangan: "IN 1",
      value: 4
    }];
    
    xAxis.data.setAll(data);
    series.data.setAll(data);

    // chart.children.unshift(am5.Label.new(root, {
    // text: "Inovasi",
    // fontSize: 25,
    // fontWeight: "500",
    // textAlign: "center",
    // x: am5.percent(50),
    // centerX: am5.percent(50),
    // paddingTop: 0,
    // paddingBottom: 0
    // }));
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>
@endsection