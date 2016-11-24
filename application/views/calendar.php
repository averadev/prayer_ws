<?php
  $this->load->view('header');
?>
<?php
  $this->load->view('menus');
?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendario</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id='calendar'></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
<!--           <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div> -->
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url().LBRY; ?>nprogress/nprogress.js"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>custom.js"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>addDays.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<!-- Full Calendar -->
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/locale/es.js"></script>
<script>

$(document).ready(function() {
    getDays();
});

 function getDays(){
       $.get('RestPrayer/days/', function(data){  
            datos = data.items;
            var fechas = [];
            for (var i = 0; i < datos.length; i++) {
                evento = {
                    title: datos[i].day_name,
                    start: new Date(datos[i].day_date),
                }
                fechas.push(evento);
            }
            $('#calendar').fullCalendar({
                editable: true,
                events: fechas,
                eventColor: '#378006',
                displayEventTime: false
            })
        })
    }

</script>
</body>
</html>
