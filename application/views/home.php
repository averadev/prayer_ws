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
            <div class="clearfix"></div>
            <div class="row">
            </div>
          </div>
        <div class="row">
         <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Days</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="app">
                        <thead>
                          <tr class="headings">
                            <th v-for="header in headers">
                                {{ header.text }}
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        <tr v-for="day in days">
                                <td> {{ day.id_day }} </td>
                                <td> {{ day.day_name }} </td>
                                <td> {{ day.day_date | date }} </td>
                                <td> {{ day.day_shortdesc }} </td>
                                <td>
                             
                                  <audio controls>
                                    <source src=" {{  BASE_URL + (day.audio) }}"  type="audio/mp3">
                                  Your browser does not support the audio element.
                                </audio>
                                </td>
                                <td>

                                  <button onclick="deleteDay({{day.id_day}});" type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="left" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </td>
                        </tr>
                        </tbody>
                      </table>
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
</body>
<script>
  var BASE_URL_AUDIO = '<?php echo base_url().AU ?>';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url().LBRY; ?>nprogress/nprogress.js"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>home.js"></script>


</body>
</html>
