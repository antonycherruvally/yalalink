              <div class="row">
                    <div class="col-md-4">
                    <!-- Filter By Country -->
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control filter" data-plugin="select2" data-placeholder="Sort by country" data-allow-clear="true" name="country" id="country" >
                          <option></option>
                          <option value="">All</option>
                          <option value="1" <?= (isset($_GET['country']) && ($_GET['country']=='1'))?'selected="selected"':''; ?>>United Arab Emirates</option>
                          <option value="2" <?= (isset($_GET['country']) && ($_GET['country']=='2'))?'selected="selected"':''; ?>>Oman</option>
                          <option value="3" <?= (isset($_GET['country']) && ($_GET['country']=='3'))?'selected="selected"':''; ?>>Saudi Arabia</option>
                          <option value="4" <?= (isset($_GET['country']) && ($_GET['country']=='4'))?'selected="selected"':''; ?>>Egypt</option>
                          <option value="5" <?= (isset($_GET['country']) && ($_GET['country']=='5'))?'selected="selected"':''; ?>>India</option>
                          <option value="6" <?= (isset($_GET['country']) && ($_GET['country']=='6'))?'selected="selected"':''; ?>>Philippines</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    <!-- End Filter By Country --> 
                    </div>
                    <div class="col-md-3">
                    <!-- End Filter By Date --> 
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control filter" data-plugin="select2" data-placeholder="From date" data-allow-clear="true" name="datefrom" id="datefrom" >
                          <option></option>
                        <?php 
                        $begin = new DateTime('2018-01-01');
                        $end = new DateTime(date('Y-m-d'));
                        $interval = DateInterval::createFromDateString('1 day');
                        $period = new DatePeriod($begin, $interval, $end);
                        $periods = array_reverse(iterator_to_array($period));
                        foreach ($periods as $dt) { ?>
                        <option value="<?php echo $dt->format("Y-m-d"); ?>" <?= (isset($_GET['from_date']) && ($_GET['from_date']==$dt->format("Y-m-d")))?'selected="selected"':''; ?> ><?php echo $dt->format("Y-m-d"); ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                      <!-- End Filter By Date --> 
                    </div>
                    <div class="col-md-3">
                    <!-- End Filter By Date --> 
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control filter" data-plugin="select2" data-placeholder="To date" data-allow-clear="true" name="dateto" id="dateto" >
                          <option></option>
                        <?php 
                        $begin = new DateTime('2018-01-01');
                        $end = new DateTime(date('Y-m-d'));
                        $interval = DateInterval::createFromDateString('1 day');
                        $period = new DatePeriod($begin, $interval, $end);
                        $periods = array_reverse(iterator_to_array($period));
                        foreach ($periods as $dt) { ?>
                        <option value="<?php echo $dt->format("Y-m-d"); ?>"  <?= (isset($_GET['to_date']) && ($_GET['to_date']==$dt->format("Y-m-d")))?'selected="selected"':''; ?>  ><?php echo $dt->format("Y-m-d"); ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                      <!-- End Filter By Date --> 
                    </div>
              </div>