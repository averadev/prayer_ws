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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Desactivar oraciones despues de: 
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="form-control" id="days_cancel">
                          <option <?php if($days_cancel == '7'){echo("selected");}?>>7 días</option>
                          <option <?php if($days_cancel == '15'){echo("selected");}?>>15 días</option>
                          <option <?php if($days_cancel == '30'){echo("selected");}?>>30 días</option>
                          </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
        </div>
        </div>
<!--                   <div class="x_content">

                      <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12 control-label">Desactivar Oraciones despues de 
                        </label>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="radio">
                            <label>
                              <input type="radio" checked="" value="option1" id="dias_7" name="rangeDays">
                              7 dias
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" checked="" value="option1" id="dias_15" name="rangeDays">
                              15 dias
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" value="option2" id="dias_30" name="rangeDays">30 dias
                            </label>
                          </div>
                        </div>
                      </div>

                  </div> -->
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
    <div id="dialog" class="ui-widget"></div>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url().LBRY; ?>nprogress/nprogress.js"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<!-- Full Calendar -->
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/locale/es.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    var modalCreditLimit = null;
</script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>config.js"></script>
</body>
</html>
