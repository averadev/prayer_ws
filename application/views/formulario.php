<div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre</span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="nombreDia" required="required" class="form-control col-md-7 col-xs-12" value='<?php echo $day_name; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha</span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input readonly type="date" id="fechaDia" value='<?= $day_date; ?>' name="last-name" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion Corta</label>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input id="descripcionCorta" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value='<?= $day_shortdesc; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion Larga</label>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea id="descripcionLarga" class="form-control col-md-7 col-xs-12" type="text"><?= $day_longdesc; ?>
                </textarea>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-12 col-sm-12 col-xs-12">Audio</span>
            </label>
            <?php if ($day_audio) {?>
             <div class="col-md-12 col-sm-12 col-xs-12">
              <audio controls>
                <source src=" <?php echo base_url().AU.$day_audio; ?>"  type="audio/mpeg">
              Your browser does not support the audio element.
              </audio>
              </div>
              <?php
            }?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input id="file" class="date-picker form-control col-md-7 col-xs-12" required="required" type="file" accept="audio/*">
            </div>
            
        </div>
</div>