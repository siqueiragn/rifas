
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Data');
        data.addColumn('number', 'Quantidade');
        data.addRows(JSON.parse('<?php echo ($dados);?>'));

        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById('myPieChart'));
        var options = {'title':'Acessos por Dia'};
        chart.draw(data, options);
    }
</script>

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/checkLogin');?>" method="POST">

                    <div class="col-lg-10 col-xs-10 offset-lg-1 offset-xs-1">
                        <div class="form-group">
                            <label for="">Bem-vindo ao seu painel, <?php echo $this->nativesession->get('usuario');?>!</label>
                        </div>
                        <div id="myPieChart"/>

                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>



    </script>



