@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
<!--END CONTENT-->
         <!--Modal Add New Montage start-->
     <div id="page-wrapper">
            
                      <div class="modal-content">
                        <div class="modal-header">
                            
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New Montage</h4>
                        </div>
                        <div class="modal-body">
                         
                             {{ Form::open(array('name'=>'montages_add_form','id'=>'montages_add_form','url' => 'montage',"method" => "post","files"=>true,"class"=>"form-horizontal")) }}
                             {{ Form::hidden('montage_banner_text') }} 
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                      {{ Form::checkbox('status', '1');}}
                                  
                                  </div>
                                </div>
                              </div>
                              <div class="form-group has-error">
                                <label class="col-md-3 control-label">Title </label>
                                <div class="col-md-6">
                                   {{ Form::text('title', Input::old('title'), array('class' => 'form-control','placeholder' => 'Title',"required"))}}
                                </div>
                               
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Banner Text </label>
                                <div class="col-md-9">
                                	<div class="text-blue border-bottom">You can edit the content by clicking the text section below.</div>
                                  <div id="montage_banner_text" contenteditable="true">
                                  	 <div class="camera_caption fadeFromLeft">

                                        <div class="row-fluid">                                
                                                <h1 class="animated fadeInDown">Banner Title <br>for <span> Client</span>.</h1>
                                                <p class="animated fadeInUp">Banner body, design &amp; banner body part 2 &amp; banner body part 3</p>
                                        </div>  
                                    </div>                                                                                         

                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload Banner <span class='require'>*</span></label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                   {{ Form::file('Banner_image');}}
                                    <br/>
                                    <span class="help-block">(Image dimension: min. 1700 x 1000 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Enable Explore More Button</label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                      {{ Form::checkbox('morestatus', '1');}}
                                    
                                    
                                  </div>
                                  <div class="clearfix"></div>
								  
                                  <div class="input-icon margin-top-10px"><i class="fa fa-link"></i>
                                     {{ Form::text('url', Input::old('url'), array('class' => 'form-control','placeholder' => 'http://'))}}
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
                                            <a href="{{ URL::to('/index_edit') }}" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> 
                                   
                                
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