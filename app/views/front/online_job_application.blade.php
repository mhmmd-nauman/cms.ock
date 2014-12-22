@extends('layouts.front')
@section('content') 
  <!-- End content info -->
   
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
            <div class="info_white1 border_bottom">
             
                <div class="container">
                    <div class="row-fluid">
                        <div class="span12">
                             <h5>Position Applied: Business Development Executive</h5>
                             <div class="alert alert-error">
                                <strong>Error!</strong> Please correct the errors in the form below. 
                            </div>
                            <div class="alert alert-success">
                                <strong>Thank you!</strong> You have successfully submitted your CV. Only short listed candidates will be notified for interview. 
                            </div>
                             
                             <form method="POST" action="Add_Application"  id="form" enctype="multipart/form-data">
                                <div class="span6">
                                    <h6>Name <span class="red-title">*</span></h6>
                                   {{ Form::text('Name', Input::old('Name'), array('class' => 'input-xxlarge','placeholder' => 'Your Name'))}}
                                    <h6>Date of Birth <span class="red-title">*</span></h6>
                                   {{ Form::text('DOB', Input::old('DOB'), array('class' => 'input-xxlarge','placeholder' => 'DD/MM/YYYY'))}}
                                    <h6>E-mail Address <span class="red-title">*</span></h6>
                                  {{ Form::text('Email', Input::old('Email'), array('class' => 'input-xxlarge','placeholder' => 'E-mail Address'))}}
                                    <h6>Contact Number <span class="red-title">*</span></h6>
                                 {{ Form::text('Phone', Input::old('Phone'), array('class' => 'input-xxlarge','placeholder' => 'Contact Number'))}}
                                  <h6>Mobile Number <span class="red-title">*</span></h6>
                                  {{ Form::text('MPhone', Input::old('MPhone'), array('class' => 'input-xxlarge','placeholder' => 'Mobile Number'))}}
                                  
                                  <div class="clearfix"></div>
                                  
                                    <h6>Education Level <span class="red-title">*</span></h6>
                                    {{Form::select("Education_Level", $education_data,array('id'=>'subject') )}}
                                   
                                    
                                    <h6 class="margin_top_10px">Attach Your CV <span class="red-title">*</span></h6>
                                    {{ Form::file('CV_docs',array('class' => 'button btn-small'));}}
                                   
                                    (PDF, RTF, MS Word or JPEG file). Max file size: 2MB
                                    
                                    <p class="margin_top_10px">Please enter the text you see in the below box:<br/>
                                    <img src="{{ URL::asset('assets/front/img/img_reCAPTCHA.png" alt="recaptcha')}}"></p>
                                    
                                     <div class="clearfix"></div>
                                     <div class="margin_top_10px">
                                         <input type="submit" value='Submit Your Application &nbsp;' class="button">
                                         </div>
                                     
                                    <div id="result"></div>  
                                </div>
        
                                <div class="span6">
                                
                                    <h6>Address <span class="red-title">*</span></h6>
                                   {{ Form::text('Address', Input::old('Address'), array('class' => 'input-xxlarge','placeholder' => 'Address'))}}
                                    <h6>City <span class="red-title">*</span></h6>
                                    {{ Form::text('City', Input::old('City'), array('class' => 'input-xxlarge','placeholder' => 'City'))}}
                                    <h6>State <span class="red-title">*</span></h6>
                                     {{ Form::text('State', Input::old('State'), array('class' => 'input-xxlarge','placeholder' => 'State'))}}
                                    <h6>Postal Code <span class="red-title">*</span></h6>
                                    {{ Form::text('Postal_Code', Input::old('Postal_Code'), array('class' => 'input-xxlarge','placeholder' => 'Postal Code'))}}
                                    <h6>Country <span class="red-title">*</span></h6>
                                    {{Form::select("Country", $country_data,array('id'=>'DDLCountry') )}}
                                    
                                  
                                  
                                  
                                    
                                   
                                </div>
                                  </form>

                        </div>

                    </div>
                </div>
                <i class="icon-briefcase right"></i>
            </div>
            
            <!-- End Info white-->
          
        <!-- InstanceEndEditable -->
          <!-- Info title-->
      <div class="row-fluid info_title">
 				<br/>
                <div class="info_vertical">
                    <h2><span>Our Clients</span></h2>
                    <p>"We bring a personal and effective approach to every project we work on, which is why our clients love us and why they keep coming back."</p>
                </div>
                <br/>
                <div class="vertical_line"><div class="circle_top"></div></div>

                <i class="icon-group left"></i>
            </div>
            <!-- End Info title-->
           
            <!-- clients-->
             
            <!-- End clients--> 


           

        </section>
  
        <!-- End content info-->
        <!-- End content info -->
        
          
      
           
            <!-- clients-->
            <section class="info_resalt border_top">
            	
              <div class="container">
               <div class="row-fluid">  
                <div class="sponsors" id="sponsors">                
                    <ul class="slides">
                       <li>
                          <a href="#"  class="tooltip_hover" title="Digi"><img src="{{ URL::asset('assets/img/logo/digi.png')}}" alt="Digi"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="U Mobile"><img src="{{ URL::asset('assets/img/logo/umobile.png')}}" alt="U Mobile"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Maxis"><img src="{{ URL::asset('assets/img/logo/maxis.png')}}" alt="Maxis"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Celcom"><img src="{{ URL::asset('assets/img/logo/celcom.png')}}" alt="Celcom"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Ericsson"><img src="{{ URL::asset('assets/img/logo/ericsson.png')}}" alt="Ericsson"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="NEC"><img src="{{ URL::asset('assets/img/logo/nec.png')}}" alt="NEC"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Alcatel Lucent"><img src="{{ URL::asset('assets/img/logo/alcatel_lucent.png')}}" alt="Alcatel Lucent"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Huawei"><img src="{{ URL::asset('assets/img/logo/huawei.png')}}" alt="Huawei"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="ZTE"><img src="{{ URL::asset('assets/img/logo/zte.png')}}" alt="ZTE"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="P1"><img src="{{ URL::asset('assets/img/logo/p1.png')}}" alt="P1"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="yes"><img src="{{ URL::asset('assets/img/logo/yes.png')}}" alt="yes"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="nsn"><img src="{{ URL::asset('assets/img/logo/nsn.png')}}" alt="nsn"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="Smart"><img src="{{ URL::asset('assets/img/logo/smart.png')}}" alt="Smart"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="Axiata"><img src="{{ URL::asset('assets/img/logo/axiata.png')}}" alt="Axiata"></a>
                       </li>                                       
                    </ul> 
                </div>
              </div>  
             </div>  
            </section>  
            <!-- End clients--> 


           

       
        <!-- End content info-->

        <!-- footer-->
        
      
@stop
        