@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
<!--END CONTENT-->
         <!--Modal Add New Montage start-->
     <div id="page-wrapper">
         {{ Form::open(array('url' => 'Add_Vacancy',"method" => "post","class"=>"form-horizontal")) }}
             <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New Vacancy</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form">
                            
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-9">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    
                                    {{ Form::checkbox('status', '1','yes');}}
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Job Title <span class='require'>*</span></label>
                                <div class="col-md-9">
                                    {{ Form::textarea('job_title', Input::old('job_title'), array('class' => 'form-control','placeholder' => 'Job Title','rows'=>'4'))}}
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Date</label>
                                <div class="col-md-5">
                                  <div class="input-group">
                                      {{ Form::text('date', Input::old('date'), array('class' => 'form-control','placeholder' => 'Date'))}}
                                   
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Responsibilities <span class='require'>*</span></label>
                                <div class="col-md-9"> note to programmer: please follow 100% front end style, including the list style in below fckeditor.
                                  {{ Form::textarea('Responsibilities', Input::old('Responsibilities'), array('class' => 'form-control','placeholder' => 'Responsibilities','rows'=>'4'))}}
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Requirements <span class='require'>*</span></label>
                                <div class="col-md-9"> note to programmer: please follow 100% front end style, including the list style in below fckeditor.
                                 {{ Form::textarea('Requirements', Input::old('Requirements'), array('class' => 'form-control','placeholder' => 'Requirements','rows'=>'4'))}}
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Footer Content</label>
                                <div class="col-md-9">
                                  <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                  <div contenteditable="true">
                                    <p>Whether you are an experienced professional looking to elevate your career to greater heights or a fresh graduate ready to fast track your career; we invite you to join our team.</p>
                                    <p>For those who are ready to explore a new career path and grow with us as a team, please email your resume to <a href="mailto:hrm@myock.com">hrm@myock.com</a>.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="col-md-offset-5 col-md-8"> 
                                      {{ Form::button(
                                                            'Save &nbsp;<i class="fa fa-check"></i>&nbsp;',
                                                            array(
                                                                'class'=>'btn btn-red',
                                                                'type'=>'submit')) 
                                                        }}
                                                        <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> 
                                    
                                   
                                
                                
                                </div>
                              </div>
                           
                              
                          </div>
                        </div>
                      </div>
                       {{ Form::close() }}
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