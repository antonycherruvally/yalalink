<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>
<div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-12 mx-auto">
            <div class="full-wrap innerpage-wrap">
                <div class="inner-header-box">
                  <div class="header-box-headerText">Terms & Conditions</div>
                 
                    <div class="full-wrap m-t-15 t-c">
                      <h4>In consideration of the promises and mutual covenants contained in this Agreement, the parties agree as follows:</h4>
                      <p><span>1. Advertisement Display and Services</span>
                        The Website agrees to publish the Advertisement on the Website for a period of __________ days commencing from ______ and ending on ___________. If the Client desires to remove the              Advertisement from the Website prior to the end of this period, the Client must request the Website in writing. No refund will be made for such early withdrawal of Advertisement.
                      </p>
                      <p><span>2. Payment </span>
                        The Client shall pay the Website for publication of the Advertisement on the Website, the sum of $________. All fees and payments are due and payable upon the execution and delivery of this Agreement. All late payments are subject to interest accrued at the rate of 1.5% per month, or up to the maximum amount allowed by law, whichever is greater. In the event if the Client defaults in making the full payment within ________________ days, the Website reserves the right to suspend the Advertisement posted on the website.
                      </p>
                      <p><span>3. Content </span>
                       Client shall deliver the Advertisements to Website digitally via ____________ at least five (5) business days before the scheduled start date. Client shall be solely responsible for providing the                 Advertisement in the format required for display. Client acknowledges that Website will not be responsible or liable for the quality of any portion of the Advertisement that does not meet the established mechanical criteria. If at any time Client desires to modify its content, it shall provide a written request to Website specifying in detail the modification desired. Website shall, within a reasonable time, effectuate the modifications to the content.
                      </p>

                    </div>







                </div>
                       
              
            </div>
            
                 





            </div><!-- col -->
          </div>
      </div>
<?php $this->load->view('front_end/include/footer'); ?>