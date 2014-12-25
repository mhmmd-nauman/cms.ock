@extends('layouts.admin')
@section('content')

{{ Form::open(array('name'=>'job_vac_edit_form','id'=>'job_vac_edit_form','url' => 'update_career/'.$career->id,"method" => "post","class"=>"form-horizontal")) }}
{{ Form::hidden('job_responsibilities') }}
{{ Form::hidden('job_requirements') }}
{{ Form::hidden('job_footer_content') }} 
     <div id="page-wrapper">
              <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label2" class="modal-title">Edit Vacancy</h4>
                                  </div>
                                  <div class="modal-body">
                                    
                                      <form class="form-horizontal">
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Status</label>
                                          <div class="col-md-9">
                                            <div data-on="success" data-off="primary" class="make-switch">
                                             @if($career->status == 1) <?php $checked = true ?> @else <?php  $checked = false ?> @endif
                                             {{ Form::checkbox('status', '1',$checked);}}
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Job Title <span class='require'>*</span></label>
                                          <div class="col-md-9">
                                            {{ Form::textarea('job_title', $career->jobtitle, array('placeholder' => 'Title','class'=>'form-control')) }}
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                          <div class="col-md-5">
                                            <div class="input-group">
                                                
                                             {{ Form::text('date', $career->date, array('placeholder' => 'Title','class'=>'form-control','id'=>'career-vacancy-date')) }}
                                              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Responsibilities <span class='require'>*</span></label>
                                          <div class="col-md-9"> note to programmer: the below list style, pls follow 100% css style in front end with icons.
                                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                            
                                            <div id="job_responsibilities" contenteditable="true">
                                                    <ul class="list icons">
                                                       
                                                        <li><i class="icon-ok"></i> Liaising and networking with customers, suppliers and partner organisations.</li>
                                                        <li><i class="icon-ok"></i> Communicating with target audiences and managing customer relationship.</li>
                                                        <li><i class="icon-ok"></i> Maintaining and updating customer databases.</li>
                                                        <li><i class="icon-ok"></i> Contributing to and developing marketing plans and strategies, and achieve performance target.</li>
                                                        <li><i class="icon-ok"></i> Market research and competitor analysis.</li>
                                                        <li><i class="icon-ok"></i> Focus on both business growth and customer retention.</li>
                                                        <li><i class="icon-ok"></i> Attend to customer's queries and provide quotation.</li>
                                                        <li><i class="icon-ok"></i> Handle RFP activities and production of tender submission material.</li>

                                                    </ul>
                                                </div>

                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Requirements <span class='require'>*</span></label>
                                          <div class="col-md-9"> note to programmer: the below list style, pls follow 100% css style in front end with icons.
                                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                            <div id="job_requirements" contenteditable="true">
                                                <ul class="list icons">
                                                  <li><i class="icon-ok"></i> Pocess own vehicle.</li>
                                                  <li><i class="icon-ok"></i> Pleasant personality, easy going.</li>
                                                  <li><i class="icon-ok"></i> Able to communicate in Bahasa Malaysia and English.</li>
                                                  <li><i class="icon-ok"></i> Able to use Microsoft Excel, Words and Powerpoint.</li>
                                                  <li><i class="icon-ok"></i> Able to work after office hour occasionally.</li>
                                                  <li><i class="icon-ok"></i> Having experience in telco industry will be advantageous.</li>
                                                  <li><i class="icon-ok"></i> Qualification: Diploma.</li>
                                                </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Footer Content</label>
                                          <div class="col-md-9">
                                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                            <div id="job_footer_content" contenteditable="true">
                                              <p>Whether you are an experienced professional looking to elevate your career to greater heights or a fresh graduate ready to fast track your career; we invite you to join our team.</p>
                                              <p>For those who are ready to explore a new career path and grow with us as a team, please email your resume to <a href="mailto:hrm@myock.com">hrm@myock.com</a>.</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <div class="col-md-offset-5 col-md-8">
                                              {{ Form::button(
                                                            'Update &nbsp;<i class="fa fa-floppy-o"></i>',
                                                            array(
                                                                'class'=>'btn btn-red',
                                                                'type'=>'submit')) 
                                                        }}
                                                        &nbsp;<a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                
                                               </div>
                                        </div>
                                      {{ Form::close() }}
                                    </div>
                                  </div>
                    
                      </div>
                    
         <!--END MODAL Add New Montage-->
         <!--Modal delete start-->
        
         <!-- modal delete end -->
<!--BEGIN PAGE HEADER & BREADCRUMB-->
       
      
          
   
          
         
            <!--BEGIN FOOTER-->
            <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="images/logo_webqom.png" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>



<script>var dump_file="savecontents";</script>
@stop