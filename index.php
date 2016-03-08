<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.2/angular-material.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/angular.chartjs/latest/angular-chart.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="inc/css/dashpage_therapeutic_area_snapshot.page.css">
  <link rel="stylesheet" href="inc/css/dashpage_subpage_common.css">
  <link rel="stylesheet" href="inc/css/bootstrap_override.css">
  <link rel="stylesheet" href="inc/css/bootstrap_plugin.css">
  <link rel="stylesheet" href="inc/css/customize_plugin.css">
  <link rel="stylesheet" href="inc/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-route.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-animate.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-aria.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-messages.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-resource.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.14.3/ui-bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.14.3/ui-bootstrap-tpls.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.2/angular-material.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/angular.chartjs/latest/angular-chart.min.js"></script>
  <script type="text/javascript" src=""></script>
  <script type="text/javascript" src="inc/lib/angular-datatables/angular-datatables.min.js"></script>
  <script type="text/javascript" src="inc/lib/angular-gauge.min.js"></script>
  <script type="text/javascript" src="inc/lib/gauge.min.js"></script>
  <script type="text/javascript" src="inc/lib/chart-new-js/chartNew.js"></script>
  <script type="text/javascript" src="inc/lib/chart-new-js/angular-chartNew.js"></script>
  <script type="text/javascript" src="inc/lib/js/dashpage_therapeutic_area_program.js"></script>
  <script type="text/javascript" src="inc/lib/ng_js/dashpage_therapeutic_area_type.ng.js"></script>
  <script type="text/javascript" src="js/html2canvas.js">
  </script>
</head>

<body>
  <?php
// echo "My first PHP script!";
echo _dashpage_therapeutic_area_type_content();
?>
    <?php
function _dashpage_therapeutic_area_type_content() {

  $output = '';
  $output .= '<div data-ng-app="pageInfoBase" class="custom-pageinfo pageinfo-subpage-common">';
    $output .= '<div data-ng-controller="PageInfoBaseController" class="row margin-0">';
    $output .= '<div class="se-pre-con" ng-show="loading"></div>';
      // pageWidgets
      $output .= '<div class="dashpage-index-square-number-wrapper bg-ffffff" style="padding-bottom: 20px">';
        $output .= '<div class="row margin-top-24">';
          $output .= '<div data-ng-repeat="widget in landingPageData.pageWidgets.value track by $index">';
            $output .= '<div class="col-xs-6 col-sm-3 text-center margin-top-2">';
            // passing id of the widget :- (pageChart0-1)
              $output .= '<div id="pageChart0-{{$index}}" style="background: #fff" class="dashpage-square-number-wrapper"><span ng-click="captureimg(0,$index)" id="pageChartSaveBtn-{{$index}}" style="margin-right:0px; padding:1px; border-radius:0px; "class="btn btn-primary float-right">save</span>';
                $output .= '<div class="dashpage-square-number-top border-1-e7e7e7">';
                  $output .= '<div class="h6 padding-top-6">{{ widget.title }}</div>';
                  $output .= '<div class="h3 line-height-1-5">{{ widget.value }}</div>';
                $output .= '</div>';

                $output .= '<div class="row margin-0">';
                  $output .= '<div class="dashpage-square-number-left col-xs-6 {{ widget.bgColorClass1 }} color-fff padding-0 height-52">';
                    $output .= '<div class="margin-top-6 margin-bottom-6">{{ widget.subValue1 }}</div>';
                    $output .= '<div class="font-size-10">{{ widget.subLabel1 }}</div>';
                  $output .= '</div>';
                  $output .= '<div class="dashpage-square-number-right col-xs-6 {{ widget.bgColorClass2 }} color-fff padding-0 height-52">';
                    $output .= '<div class="margin-top-6 margin-bottom-6">{{ widget.subValue2 }}</div>';
                    $output .= '<div class="font-size-10 text-center">{{ widget.subLabel2 }}</div>';
                  $output .= '</div>';
                $output .= '</div>';
              $output .= '</div>';
            $output .= '</div>';
          $output .= '</div>';
        $output .= '</div>';
      $output .= '</div>';
      // pageCharts
      $output .= '<div class="row margin-top-12 charts-block-width">';
        $output .= '<div data-ng-repeat="chartBlock in landingPageData.pageCharts track by $index">';
          $output .= '<div class="col-md-{{ chartBlock.column }}">';
          // passing id of the pageCharts (pageChart1-0)
            $output .= '<div id="pageChart1-{{$index}}" class="panel" style="margin-bottom: 0px !important;border-bottom: 0px; margin-top: 24px;">';
              $output .= '<div class="panel-header">{{ chartBlock.caption }}<span ng-click="captureimg(1,$index)" id="pageChartSaveBtn-{{$index}}" style="margin-right:12px; padding:5px; border-radius:0px; "class="btn btn-primary float-right">save</span></div>';
              $output .= '<div class="panel-body bg-ffffff margin-bottom-n-10 padding-0" style="height:100%;">';
                $output .= '<div data-ng-repeat="chart in chartBlock.charts">';
                  $output .= '<div data-ng-switch on="chart.chartType">';
                    // Pie chart
                    $output .= '<div class="canvas-holder" data-ng-switch-when="piechart">';
                      $output .= '<canvas chart-options="options" chart-series="chart.series" id="bar" chart-colours="chart.colorClass" class="chart chart-pie" chart-legend="true" chart-data="chart.data" chart-labels="chart.legend"></canvas>';
                      // chart widget
                      $output .= '<div class="row text-center" style="margin: -16px; margin-top: 16px;">';
                      // $output .= '{{ chart.widget}}';
                        $output .= '<div class="dashpage-square-number-left col-xs-6 {{ chart.widget.bgColorClass1 }} color-000 border-1-eee padding-0 height-66">';
                          $output .= '<div class="margin-top-6 margin-bottom-6 font-size-16 font-bold">{{ chart.widget.subValue1 }}</div>';
                          $output .= '<div class="font-size-10">{{chart.widget.subLabel1}}</div>';
                        $output .= '</div>';
                        $output .= '<div class="dashpage-square-number-right col-xs-6 {{ chart.widget.bgColorClass2 }} color-000 border-1-eee padding-0 height-66">';
                          $output .= '<div class="margin-top-6 margin-bottom-6 font-size-16 font-bold">{{ chart.widget.subValue2 }}</div>';
                          $output .= '<div class="font-size-10 text-center">{{chart.widget.subLabel2}}</div>';
                        $output .= '</div>';
                      $output .= '</div>';
                      //
                    $output .= '</div>';
                    // Doughnut Chart
                    $output .= '<div data-ng-switch-when="doughnut" style="height:auto">';
                      $output .= '<canvas chart-options="options" chart-series="chart.series" id="bar" chart-colours="chart.colorClass" class="chart chart-doughnut" chart-legend="true" chart-data="chart.data" chart-labels="chart.legend"></canvas>';
                    $output .= '</div>';
                    // Bar Chart
                    $output .= '<div data-ng-switch-when="Bar" data-ng-init="loadGraph(chart.data, chart.chartId, chart.chartType)">';
                    // $output .= '<canvas  chart-options="options" chart-series="chart.series" id="bar" chart-colours="chart.colorClass" class="chart chart-doughnut" chart-legend="true" chart-data="chart.data" chart-labels="chart.legend"></canvas>';
                      $output .= '<canvas id="101" style="width: 100%"></canvas>';
                    $output .= '</div>';
                    // Column Chart
                    $output .= '<div data-ng-switch-when="columnchart">';
                      //$output .= '<div class="col-md-4">';
                       // $output .= '<canvas chart-options="options" id="bar" chart-colours="chart.colorClass" class="chart chart-bar" chart-legend="true" chart-data="chart.data" chart-labels="chart.legend"></canvas>';
                      //$output .= '</div>';
                    $output .= '</div>';
                    // Gauge Chart
                    $output .= '<div data-ng-controller="GaugeJsController">';
                      $output .= '<div data-ng-switch-when="progressbar" class="div-center" style="width:60%;">';
                        $output .= '<canvas gaugejs options="{angle: 0, pointer: { length: 0.7}, colorStart: chart.colorClass, colorStop: chart.colorClass, generateGradient: false, lineWidth: 0.24 }" gaugeType = "donut" value="chart.data" max-value="maxValue" animation-time="animationTime"></canvas> ';
                        //$output .= '<div id="knob-matrics-1" class="circleful  div-center" data-percent="{{ chart.data }}" data-text="{{ chart.data }}" data-fgcolor="{{ chart.colorClass }}" data-bgcolor="#fff" data-info="Some Metric" ></div>';
                        // $output .= '<input type="number" data-ng-model="chart.data"/>';
                      $output .= '</div>';
                    $output .= '</div>';
                  $output .= '</div>';
                $output .= '</div>';
              $output .= '</div>';
            $output .= '</div>';
          $output .= '</div>';
        $output .= '</div>';
      $output .= '</div>';

      // timeGeographyCharts
      $output .= '<div class="col-xs-12 margin-top-24">';
          $output .= '<div class="panel">';
              $output .= '<div class="panel-header">Program Learning Objective{{ chartBlock.caption }}</div>';
                $output .= '<div class="panel-body bg-ffffff">';
                  $output .= '<md-content class="">';
                    $output .= '<md-tabs md-dynamic-height="" md-border-bottom="" >';
                      $output .= '<md-tab class="" label="OVERALL">';
                        $output .= '<div class="col-md-12">';
                        $output .= '<md-content class="padding-top-12 col-md-4" data-ng-repeat="chart in landingPageData.timeGeographyCharts.overall.charts">';
                          $output .= '<div data-ng-switch on="chart.chartType">';
                            $output .= '<div data-ng-switch-when="Bar">';
                              $output .= '<canvas flexxiachartjs options={{chart.ChartOptions}} type="{{chart.chartType}}" id="{{chart.chartId}}" data="{{chart.chartData}}" style="width: 80%"></canvas>';
                              $output .= '<div class="row margin-top-n-10 margin-bottom-12 padding-left-24 font-size-13">';
                                $output .= '<span>{{ chart.chartTitle | limitTo: 70 }}{{ chart.chartTitle.length > 70 ? \'...\' : \'\'}}</span>';
                                $output .= '<md-tooltip md-direction="top">';
                                  $output .= '{{ chart.chartTitle }}';
                                $output .= '</md-tooltip>';
                              $output .= '</div>';

                            $output .= '</div>';
                          $output .= '</div>';
                        $output .= '</md-content>';
                        $output .= '<div class="text-center">';
                          /* call labels*/
                          $output .= '<div class="font-size-12 text-center margin-12 display-inline-block"><div class="dashpage-chart-legend-item pull-left margin-left-48" data-ng-repeat="labels in landingPageData.timeGeographyCharts.overall.legends">';
                            $labels = '{{labels.value}}';
                            $label_colors = '{{labels.color}}';
                            $output .= _dashpage_therapeutic_area_generateLegends($labels,  $label_colors);
                          $output .= '</div>';
                          /* call labels ends*/

                        $output .= '</div>';
                        $output .= '</div>';
                      $output .= '</md-tab>';
                      $output .= '<md-tab label="Region">';
                        $output .= '<md-content class="padding-top-12" data-ng-repeat="programByRegion in landingPageData.timeGeographyCharts">';
                          $output .= '<div data-ng-switch on="programByRegion.chartId">';
                            $output .= '<div data-ng-switch-when="102">';
                              $output .= '<canvas id="102" style="width: 100%;" data-ng-init="loadGraph(programByRegion.chartData, programByRegion.chartId, programByRegion.chartType, \'true\')"></canvas>';
                            $output .= '</div>';
                          $output .= '</div>';
                        $output .= '</md-content>';
                      $output .= '</md-tab>';
                      $output .= '<md-tab label="PROVINCE">';
                        $output .= '<md-content class="padding-top-12" data-ng-repeat="programByProvince in landingPageData.timeGeographyCharts">';
                          $output .= '<div data-ng-switch on="programByProvince.chartId">';
                            $output .= '<div data-ng-switch-when="103">';
                              $output .= '<canvas id="103" style="width: 100%;" data-ng-init="loadGraph(programByProvince.chartData, programByProvince.chartId, programByProvince.chartType, \'true\')"></canvas>';
                            $output .= '</div>';
                          $output .= '</div>';
                        $output .= '</md-content>';
                      $output .= '</md-tab>';
                      // $output .= '<md-tab label="MAP">';
                      //   $output .= '<md-content class="md-padding">';
                      //     $output .= '<div id="map_div" style="height: 600px;"></div>';
                      //   $output .= '</md-content>';
                      // $output .= '</md-tab>';
                    $output .= '</md-tabs>';
                  $output .= '</md-content>';
                $output .= '</div>';
          $output .= '</div>';
      $output .= '</div>';
      // pageCharts2
      $output .= '<div class="row margin-top-24">';
        $output .= '<div data-ng-repeat="chartBlock in landingPageData.pageCharts2 track by $index">';
          $output .= '<div class="col-md-{{ chartBlock.column }}">';
          // passing id of the pageCharts2(pageChart2-0)
            $output .= '<div id="pageChart2-{{$index}}" class="panel" style="margin-bottom: 0px !important;border-bottom: 0px; margin-top: 24px;">';
            // save button
              $output .= '<div class="panel-header">{{ chartBlock.caption }}<span ng-click="captureimg(2,$index)" id="pageChartSaveBtn-{{$index}}" style="margin-right:12px; padding:5px; border-radius:0px; "class="btn btn-primary float-right">save</span></div>';
              $output .= '<div class="panel-body bg-ffffff" style="height:100%; min-height:332px;">';
                $output .= '<div data-ng-repeat="chart in chartBlock.charts">';
                // $output .= '{{ chart.chartType }}';
                  $output .= '<div data-ng-switch on="chart.chartType">';
                    $output .= '<div data-ng-switch-when="piechart">';
                      $output .= '<canvas chart-options="options" chart-series="chart.series" id="bar" chart-colours="chart.colorClass" class="chart chart-pie" chart-legend="true" chart-data="chart.data" chart-labels="chart.legend"></canvas>';
                    $output .= '</div>';
                    $output .= '<div data-ng-switch-when="doughnut" class="doughnut-chart-container" style="height:auto">';
                      $output .= '<div class="margin-top-24 font-size-14 text-center">{{ chart.title }}</div>';
                      $output .= '<canvas chart-options="{percentageInnerCutout: 80}" chart-series="chart.series" id="bar" chart-colours="chart.colorClass" class="chart chart-doughnut" chart-legend="true" chart-data="chart.data" chart-labels="chart.legend"></canvas>';
                    $output .= '</div>';

                    $output .= '<div data-ng-switch-when="Bar" data-ng-init="loadGraph(chart.data, chart.chartId, chart.chartType)">';
                      $output .= '<canvas id="101" style="width: 100%"></canvas>';
                    $output .= '</div>';
                    $output .= '<div data-ng-switch-when="columnchart">';
                      //$output .= '<div class="col-md-4">';
                       // $output .= '<canvas chart-options="options" id="bar" chart-colours="chart.colorClass" class="chart chart-bar" chart-legend="true" chart-data="chart.data" chart-labels="chart.legend"></canvas>';
                      //$output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div data-ng-controller="GaugeJsController">';
                      $output .= '<div data-ng-switch-when="gauge" class="div-center" style="width:70%;">';
                        $output .= '<div class="margin-top-24 font-size-14 text-center">{{ chart.title }}</div>';
                        $output .= '<canvas style="margin-top: -20px" gaugejs options="{angle: 0, pointer: { length: 0.65}, colorStart: chart.colorClass, colorStop: chart.colorClass, generateGradient: false, lineWidth: 0.65 }" gaugeType = "donut" value="chart.data" max-value="maxValue" animation-time="animationTime"></canvas> ';
                      $output .= '</div>';
                    $output .= '</div>';
                  $output .= '</div>';
                $output .= '</div>';
              $output .= '</div>';
            $output .= '</div>';
          $output .= '</div>';
        $output .= '</div>';
      $output .= '</div>';

  return $output;
}

function _dashpage_therapeutic_area_generateLegends($lables, $label_colors){
  $output = '';
  $output .='<span class="fa fa-circle" style="color:'. $label_colors .';" aria-hidden="true"></span>';
  $output .='<span class="margin-left-8"> '. $lables .'</span></div>';
  return $output;
}
?>
</body>

</html>