@extends('layouts.front_without_banner')
@section('content') 


         <script type="text/javascript" src="js/pdfobject.js"></script>

	<script type="text/javascript">

	window.onload = function (){

	var success = new PDFObject({ url: "img/chairman_statement/ock-annualreport2013-31122013-06052014-CHM.pdf" }).embed("pdf");
	
	};

	</script>  
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container"><!-- InstanceBeginEditable name="EditRegion3" -->
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><a href="investor_relations_home.html">Investor Relations</a></li>
                <li>/</li>
                <li>Management Analysis</li>
                <li>/</li>
                <li>Chairman's Statement</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title">Chairman's Statement</h2>
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
                	<div id="twitter-bootstrap-container">
                        <div id="twitter-bootstrap-tabs">
                             <ul class="nav nav-tabs">
                              <li><a href="#viewpdf">View PDF</a></li>
                             </ul>
                             <div class="panels">
                                <div id="viewpdf">              
                                    <p class="pull-right">View Report Year:
                                        <select onChange="javascript:window.location=this.options[this.selectedIndex].value" name="selector">
                                            <option>-- Select --</option>
                                            <option value="img/chairman_statement/ock-annualreport2013-31122013-06052014-CHM.pdf" selected="selected">31-12-2013</option>
                                            <option value="img/chairman_statement/ock-annualreport2012-31122012-06052013-CHM.pdf">31-12-2012</option>
                                        </select>
                                    </p>
                                    <div class="clearfix"></div>
                                            
                                    <div id="pdf">It appears you don't have Adobe Reader or PDF support in this web browser. <a href="img/chairman_statement/ock-annualreport2013-31122013-06052014-CHM.pdf" target="_blank">Click here to download the PDF</a></div>
                                </div>
                            </div>
                           <!-- end panels -->
                       </div>
                  </div>
                  
                  <script type="text/javascript">
                  $('#twitter-bootstrap-tabs').easytabs();
                  </script>
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-comments right"></i>
          </div>
          <!-- End Info white -->
          
        <!-- InstanceEndEditable --></section>
        <!-- End content info-->

@stop
        