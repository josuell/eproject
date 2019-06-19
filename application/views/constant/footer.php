<!-- jQuery -->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url('assets/vendor/raphael/raphael.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/morrisjs/morris.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/data/morris-data.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

<!-- jQuery -->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url('assets/vendor/raphael/raphael.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/morrisjs/morris.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/data/morris-data.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

<script src="<?php echo base_url('/assets/gantt/core.js'); ?>"></script>
<script src="<?php echo base_url('/assets/gantt/charts.js'); ?>"></script>
<script src="<?php echo base_url('/assets/gantt/animated.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/jspdf.min.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        loadGantt();
    });

    let chart;
    function loadGantt() {
        var $id = $('#projet').val();
        console.log($id);
        am4core.ready(function () {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end
            $.get('http://localhost/devort/Taches/getGanttTaches/' + $id, (response) => {
                let taches = JSON.parse(response);
                console.log(taches);
                chart = am4core.create("chartdiv", am4charts.XYChart);

                let dataArray = [];

                for (let i = 0; i < taches.length; i++) {
                    let startTime = new Date(taches[i].DEBUT * 1000);
                    let message = parseFloat(taches[i].DEBUT) + parseFloat(taches[i].TEMPSESTIME);
                    console.log(message);
                    let endTime = new Date(message * 1000);
                    dataArray.push({
                        "name": taches[i].NOMTACHE,
                        "startTime": startTime,
                        "endTime": endTime,
                        "color": chart.colors.next()
                    });
                }

                console.log(dataArray);
                chart.data = dataArray;

                var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "name";
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.renderer.inversed = true;

                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.dateFormatter.dateFormat = "yyyy-MM-dd HH:mm";
                dateAxis.renderer.minGridDistance = 70;
                dateAxis.baseInterval = { count: 30, timeUnit: "minute" };
                // dateAxis.max = new Date(2018, 0, 1, 24, 0, 0, 0).getTime();
                // dateAxis.strictMinMax = true;
                dateAxis.renderer.tooltipLocation = 0;

                var series1 = chart.series.push(new am4charts.ColumnSeries());
                series1.columns.template.width = am4core.percent(80);
                series1.columns.template.tooltipText = "{name}: {openDateX} - {dateX}";

                series1.dataFields.openDateX = "startTime";
                series1.dataFields.dateX = "endTime";
                series1.dataFields.categoryY = "name";
                series1.columns.template.propertyFields.fill = "color"; // get color from data
                series1.columns.template.propertyFields.stroke = "color";
                series1.columns.template.strokeOpacity = 1;

                chart.scrollbarX = new am4core.Scrollbar();
            });


        }); // end am4core.ready()
    }

    function formatDate(current_datetime) {
        let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds();
        return formatted_date;
    }
    
    function exporterPDF() {
        window.print();
    }
</script>
