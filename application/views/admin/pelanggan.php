<style type="text/css">
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $title ?>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                            <?=  $this->session->flashdata('msg'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                <?= form_open('admin/pelanggan',[ 'id' => 'regForm' ]); ?>                                    
                                    <div class="tab">
                                        <h4>Data Pribadi</h4><hr>
                                        <div class="form-group">
                                            <label>UNITUPI</label>
                                            
                                            <input type="text" name="unitupi" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>UNITAP</label>
                                            
                                            <input type="text" name="unitap" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>UNITUP</label>
                                            
                                            <input type="text" name="unitup" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Pelanggan </label>
                                            <input type='text' pattern='[0-9]{12}' required name='idpel' id='idpel' maxlength="12" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan </label>
                                            <input required name='nama' id='namapel' maxlength="20" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Pelanggan</label>
                                            <textarea required name='alamatpel' id='alamatpel' class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tarif</label>

                                            <input type="text" name="tarif" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            
                                            <input type="text" name="daya" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            
                                            <input type="text" name="status" class="form-control">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="tab">
                                        <h4>Data Meteran</h4>
                                        <div class="form-group">
                                            <label>Nomor Meteran </label>
                                            <input type='text' required name='idmeter' id='idmeter' maxlength="13" class="form-control">
                                        </div>                          
                                        <div class="form-group">
                                            <label>Merk Meteran</label>
                                            
                                            <input type="text" name="merkmeter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Meteran</label>
                                            
                                            <input type="text" name="tipemeter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas Meteran</label>
                                            
                                            <input type="text" name="kelasmeter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pembuatan</label>
                                            <input type='text' pattern='[0-9]{4}' maxlength='4' required name='tahunbuat' id='tahunbuat' class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Arus</label>
                                            
                                            <input type="text" name="arusmeter" class="form-control">
                                        </div>
                                        <hr>
                                        </div>
                                        <div class="tab">
                                        <h4>Data Modem</h4>
                                        <div class="form-group">
                                            <label>IMEI Modem </label>
                                            <input type='text' pattern='[0-9]' required name='imeimodem' id='imeimodem' maxlength="16" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Merk Modem</label>
                                            
                                            <input type="text" name="merkmodem" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Modem</label>
                                            
                                            <input type="text" name="tipemodem" class="form-control">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="tab">
                                        <h4>Data Sim Card</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label>Nomor</label>
                                            <input type='text' pattern='[0-9]' required name='nomortlp' id='nomortlp' maxlength="13" class="form-control">
                                        </div>                          
                                        <div class="form-group">
                                            <label>Provider</label>
                                            <input type="text" name="provider" class="form-control">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="tab">
                                        <h4>Data Pembatas</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label>Merk Pembatas</label>             
                                            <input type="text" name="merkpembatas" class="form-control"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Pembatas</label>                                
                                            
                                            <input type="text" name="tipepembatas" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Arus Pembatas</label>                                
                                            
                                            <input type="text" name="aruspembatas" class="form-control">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="tab">
                                        <h4>Data CT</h4>
                                        <div class="form-group">
                                            <label>Jenis ct</label>                                
                                            
                                            <input type="text" name="jenis_ct" class="form-control">
                                        </div>
                                    </div>


                                    <div style="overflow:auto;">
                                      <div style="float:right;">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                      </div>
                                    </div>

                                    <!-- Circles which indicates the steps of the form: -->
                                    <div style="text-align:center;margin-top:40px;">
                                      <span class="step"></span>
                                      <span class="step"></span>
                                      <span class="step"></span>
                                      <span class="step"></span>
                                      <span class="step"></span>
                                      <span class="step"></span>
                                    </div>
                                <?= form_close(); ?>    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">
    var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true, tahunbuat, idpel;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  tahunbuat = document.getElementById("tahunbuat").value;
  idpel = document.getElementById("idpel").value;
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "" || (tahunbuat==y[i].value && tahunbuat.length < 4) || (idpel==y[i].value && idpel.length < 12) ) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>