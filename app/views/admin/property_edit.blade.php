@extends('layouts.innerpage')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/home-styles.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/jniceit.css" media="screen" />
	<noscript>
		<link rel="stylesheet" type="text/css" href="/css/nojs.css" />
	</noscript>
    <!-- Fonts
    ================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Economica:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Favicon
	================================================== -->
	<link rel="shortcut icon" href="favicon.html" type="image/x-icon">
          <!-- date picker-->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
         <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- JavaScript
    ================================================== -->
	
	<script type="text/javascript" src="/js/modernizr.custom.28468.js"></script>
	<script type="text/javascript" src="/js/scripts.js"></script>
	<script type="text/javascript" src="/js/jniceit.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('form.NiceIt').NiceIt();
		});
	</script>
	<!-- Price Slider JS
    ================================================== -->
  <script type="text/javascript" src="/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="/js/tmpl.js"></script>
	<script type="text/javascript" src="/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="/js/jquery.slider.js"></script>
	<script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>
  <script type="text/javascript" src="/js/ddaccordion.js"></script>
  <script type="text/javascript">
    ddaccordion.init({
      headerclass: "expandable",
      contentclass: "categoryitems",
      revealtype: "click",
      mouseoverdelay: 200,
      collapseprev: true,
      defaultexpanded: [0],
      onemustopen: false,
      animatedefault: false,
      persiststate: true,
      toggleclass: ["", "openheader"],
      togglehtml: ["prefix", "", ""],
      animatespeed: "fast",
      oninit:function(headers, expandedindices){ 
      },
      onopenclose:function(header, index, state, isuseractivated){
      }
    })
		jQuery(document).ready(function() {
			jQuery('#mycarousels').jcarousel({
				wrap: 'circular'
			});
		});
  </script>
<link rel="stylesheet" href="/css/datepicker3.css">

<script type="text/javascript" src="/bootstrap-datepicker.js"></script>
 <script type="text/javascript">
$(document).ready(function() {
    $('#calendar').datepicker({
    });
    $('#followupdate').datepicker({
    });
    $('#pricedate').datepicker({
    });
    $('#relocatingdate').datepicker({
    });
} );
</script> 
<style>
   
</style>

<div id="content" class='inner-content'>
    
     <h2><span>Property Information</span></h2>
     @if (Session::has('message'))
	<div class="success">{{ Session::get('message') }}</div>
@endif

<div style="text-align: right; padding: 10px;">
                  <div class="l-view"> 
                       <button type="submit" class="btn btn-primary"> <a href="/index.php/property-view/{{$id}}">View Property</a></button>
                     </div>
                  
                  
              </div>

      {{ Form::open(array('url' => 'updateProperty','files'=> true)) }}
      
            <table class='table-responsive bg ' border='1' width="100%">
                <tr>
                    <td valign="top" width="50%" >
                        <table class='table-responsive ' border='1' width="100%">
                            
                           <tr>
                               <td solspan="3">
                                   <div class="heading">
                                    <h3>Property Information</h3>
                                    </div>
                               </td>
                           </tr>
                           <tr>
                               <td width="50%"> Status:  {{Form::select("status", $status_data, $OuterData->status ,array('class'=>'form-control-list') )}}</td> 
                               <td width="50%">Property Progress: {{ Form::text('PropertyProgress', (isset($OuterData->PropertyProgress))?$OuterData->PropertyProgress:"", array('placeholder' => 'Property Progress','class'=>'form-control')) }}</td>
                               
                           </tr>
                           <tr>
                                <td>Follow Up Date: {{ Form::text('followUpDate', (isset($propertyData['followUpDate']))?$propertyData['followUpDate']:"" , array('placeholder' => 'Follow Up Date','id' => 'followupdate','class'=>'form-control datepicker')) }}</td>
                                <td width="50%">Date: {{ Form::text('date', (isset($propertyData['date']))?$propertyData['date']:"" , array('placeholder' => 'Date', 'id' => 'calendar','class'=>'form-control datepicker')) }}</td>
                                
                           </tr>
                        </table>
                      </td>
                    <td valign="top"  align="center">
                        <label for="inputStatus" >Old Picture:</label><br/>
                            <img height="150" width="250" src="{{ $PropertyImage }}" class='img' ><br/>
                            <label for="inputStatus" >Picture:</label>
                            {{ Form::file('propertyImage') }}
                    </td>
                </tr>
            </table>
            <table class='table-responsive bg ' border='1' width="100%">
                <tr>
                    <td valign="top" width="50%">
                       <table class='table-responsive ' border='1' width="100%">
                           <tr>
                               <td>
                                   <table class='table-responsive ' border='1' width="100%">
                                        <tr>
                                            <td colspan="2">
                                                <div class="heading">
                                                 <h3>Contact Information</h3>
                                                 </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" colspan="2"> Name:  {{ Form::text('name', $propertyData['name'], array('placeholder' => 'Name','class'=>'form-control_larg_box')) }}</td> 
                                        </tr>
                                        <tr>
                                            <td width="100%" colspan="2"> Email:  {{ Form::text('email', $propertyData['email'], array('placeholder' => 'Email','class'=>'form-control_larg_box')) }}</td> 
                                        </tr>
                                        <tr>
                                             <td width="50%">Home:  {{ Form::text('homePhoneNo', $propertyData['homePhoneNo'], array('placeholder' => 'Home','class'=>'form-control')) }}</td>

                                             <td>Cell: {{ Form::text('mobilePhoneNo', $propertyData['mobilePhoneNo'], array('placeholder' => 'Cell','class'=>'form-control')) }}</td>
                                        </tr>
                                        <tr>
                                             <td width="50%">Work:  {{ Form::text('workPhoneNo', $propertyData['workPhoneNo'], array('placeholder' => 'Work','class'=>'form-control')) }}</td>

                                             <td></td>
                                        </tr>
                                     </table>
                        
                               </td>
                           </tr>
                           <tr>
                               <td>
                                     <table class='table-responsive ' border='1' width="100%">
                            
                                        <tr>
                                            <td colspan="2">
                                                <div class="heading">
                                                 <h3>Property Address</h3>
                                                 </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" colspan="2"> Address:  {{ Form::text('propertyAddress', (isset($propertyData['propertyAddress']))?$propertyData['propertyAddress']:"", array('placeholder' => 'Address','class'=>'form-control_larg_box')) }}</td> 
                                        </tr>
                                        <tr>
                                            <td width="50%"> Apartment:  {{ Form::text('propertyAppartment', (isset($propertyData['propertyAppartment']))?$propertyData['propertyAppartment']:"", array('placeholder' => 'Apartment','class'=>'form-control')) }}  </td> 
                                            <td width="50%">City:  {{ Form::text('propertyCity', (isset($propertyData['propertyCity']))?$propertyData['propertyCity']:"", array('placeholder' => 'City','class'=>'form-control')) }}</td>
                                        </tr>
                                        <tr>
                                         <td>State: {{ Form::text('propertyState', (isset($propertyData['propertyState']))?$propertyData['propertyState']:"", array('placeholder' => 'State','class'=>'form-control')) }}</td>
                                             <td width="50%">Zip:   {{ Form::text('propertyZip', (isset($propertyData['propertyZip']))?$propertyData['propertyZip']:"", array('placeholder' => 'Zip','class'=>'form-control')) }}</td>
                                        </tr>

                                     </table> 
                 
                               </td>
                           </tr>
                           <tr>
                               <td>
                                    <table class='table-responsive ' border='1' width="100%">
                            
                                        <tr>
                                            <td colspan="2">
                                                <div class="heading">
                                                 <h3>Mailing</h3>
                                                 </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" colspan="2"> Address:  {{ Form::text('mailingAddress', $propertyData['mailingAddress'], array('placeholder' => 'Address','class'=>'form-control_larg_box')) }} </td> 
                                        </tr>
                                        <tr>
                                            <td width="50%"> APT #:  {{ Form::text('mailingAppartment', $propertyData['mailingAppartment'], array('placeholder' => 'APT #','class'=>'form-control')) }} </td> 
                                            <td width="50%">City:  {{ Form::text('mailingCity', $propertyData['mailingCity'], array('placeholder' => 'City','class'=>'form-control')) }}</td>
                                        </tr>
                                        <tr>
                                         <td>State: {{ Form::text('mailingState', $propertyData['mailingState'], array('placeholder' => 'State','class'=>'form-control')) }}</td>
                                         <td width="50%">Zip:   {{ Form::text('mailingZip', $propertyData['mailingZip'], array('placeholder' => 'Zip','class'=>'form-control')) }}</td>
                                        </tr>

                                     </table>
                        
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Pricing</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" > Price:   {{ Form::text('askingPrice', (isset($propertyData['askingPrice']))?$propertyData['askingPrice']:"" , array('placeholder' => 'Price','class'=>'form-control')) }} </td> 
                                        <td width="50%" > ARV:   {{ Form::text('estimateARV', (isset($propertyData['estimateARV']))?$propertyData['estimateARV']:"" , array('placeholder' => 'ARV','class'=>'form-control')) }} </td> 
                                    </tr>
                                    <tr>
                                        <td width="50%"> Taxable:  {{ Form::text('taxedBasedValue', (isset($propertyData['taxedBasedValue']))?$propertyData['taxedBasedValue']:"" , array('placeholder' => 'Taxable','class'=>'form-control')) }} </td> 
                                        <td width="50%">Appraisal:  {{ Form::text('appraisalValue', (isset($propertyData['appraisalValue']))?$propertyData['appraisalValue']:"" , array('placeholder' => 'Appraisal','class'=>'form-control')) }}</td>
                                    </tr>
                                    <tr>
                                     <td>State: {{ Form::text('mailingState', $propertyData['mailingState'], array('placeholder' => 'State','class'=>'form-control')) }}</td>
                                     <td width="50%">Zip:   {{ Form::text('mailingZip', $propertyData['mailingZip'], array('placeholder' => 'Zip','class'=>'form-control')) }}</td>
                                    </tr>
                                   <tr>
                                     <td>Type: {{ Form::text('appraisalType', (isset($propertyData['appraisalType']))?$propertyData['appraisalType']:"" , array('placeholder' => 'Type','class'=>'form-control')) }}</td>
                                     <td width="50%">Date: {{ Form::text('pricedate', (isset($propertyData['pricedate']))?$propertyData['pricedate']:"" , array('placeholder' => '','id' => 'pricedate','class'=>'form-control datepicker')) }}</td>
                                    </tr>

                                 </table>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="3">
                                            <div class="heading">
                                             <h3>Mortgage</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" > 1st:   {{ Form::text('mortageFirst', (isset($propertyData['mortageFirst']))?$propertyData['mortageFirst']:"" , array('placeholder' => '1st','class'=>'form-control')) }} </td> 
                                        <td width="50%" > Lender:    {{ Form::text('mortageFirstLender', (isset($propertyData['mortageFirstLender']))?$propertyData['mortageFirstLender']:"" , array('placeholder' => 'Lender','class'=>'form-control')) }} {{ Form::hidden('id', $id) }}</td> 
                                    </tr>
                                    <tr>
                                        <td width="50%"> Rate:   {{ Form::text('mortgageFirstRate', (isset($propertyData['mortgageFirstRate']))?$propertyData['mortgageFirstRate']:"" , array('placeholder' => 'Rate','class'=>'form-control')) }} </td> 
                                        <td width="50%">Payment: {{ Form::text('mortgageFirstPayment', (isset($propertyData['mortgageFirstPayment']))?$propertyData['mortgageFirstPayment']:"" , array('placeholder' => 'Payment','class'=>'form-control')) }}</td>
                                    </tr>
                                    <tr>
                                     <td>TI Payment:  {{ Form::text('mortageFirstPI', (isset($propertyData['mortageFirstPI']))?$propertyData['mortageFirstPI']:"" , array('placeholder' => 'TI Payment','class'=>'form-control')) }}</td>
                                     <td width="50%">2nd:{{ Form::text('mortageSecond', (isset($propertyData['mortageSecond']))?$propertyData['mortageSecond']:"" , array('placeholder' => '2nd','class'=>'form-control')) }}</td>
                                    </tr>
                                   <tr>
                                     <td>Lender:   {{ Form::text('mortageSecondLender', (isset($propertyData['mortageSecondLender']))?$propertyData['mortageSecondLender']:"" , array('placeholder' => 'Lender','class'=>'form-control')) }}</td>
                                     <td width="50%">Rate:  {{ Form::text('mortageSecondRate', (isset($propertyData['mortageSecondRate']))?$propertyData['mortageSecondRate']:"" , array('placeholder' => 'Rate','class'=>'form-control')) }}</td>
                                    </tr>
                                     <tr>
                                     <td>Payment:  {{ Form::text('mortageSecondPayment', (isset($propertyData['mortageSecondPayment']))?$propertyData['mortageSecondPayment']:"" , array('placeholder' => 'Payment','class'=>'form-control')) }}</td>
                                     <td width="50%">TI Payment:  {{ Form::text('mortageSecondPI', (isset($propertyData['mortageSecondPI']))?$propertyData['mortageSecondPI']:"" , array('placeholder' => 'TI Payment','class'=>'form-control')) }}</td>
                                    </tr>
                                    <tr>
                                     <td>Current:  {{ Form::text('paymentCurrunt', (isset($propertyData['paymentCurrunt']))?$propertyData['paymentCurrunt']:"" , array('placeholder' => 'Current','class'=>'form-control')) }}</td>
                                     <td width="50%"># Past:  {{ Form::text('propertyPaymentPastDue', (isset($propertyData['propertyPaymentPastDue']))?$propertyData['propertyPaymentPastDue']:"" , array('placeholder' => '# Past','class'=>'form-control')) }}</td>
                                    </tr>
                                 </table>  
                        
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Taxes</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%"> Annual:   {{ Form::text('AnnualTaxes', (isset($propertyData['AnnualTaxes']))?$propertyData['AnnualTaxes']:"" , array('placeholder' => 'Annual','class'=>'form-control')) }} </td> 
                                        <td width="50%"> Payment:   {{ Form::text('TaxesPayment', (isset($propertyData['TaxesPayment']))?$propertyData['TaxesPayment']:"" , array('placeholder' => 'Payment','class'=>'form-control')) }} </td> 
                                    </tr>
                                    <tr>
                                        <td width="50%">Current:  {{ Form::text('associatedFee', (isset($propertyData['associatedFee']))?$propertyData['associatedFee']:"" , array('placeholder' => 'Current','class'=>'form-control')) }} </td> 
                                        <td width="50%">Past:   {{ Form::text('associatedFee', (isset($propertyData['associatedFee']))?$propertyData['associatedFee']:"" , array('placeholder' => 'Past','class'=>'form-control')) }}</td>
                                    </tr>


                                 </table>
                        
                               </td>
                           </tr>
                           <tr>
                               <td>
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>General</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" colspan="2"> Deed:  {{ Form::text('deedName', (isset($propertyData['deedName']))?$propertyData['deedName']:"" , array('placeholder' => 'Deed Name','class'=>'form-control_larg_box')) }} </td> 

                                    </tr>
                                    <tr>
                                         <td width="50%"> Purchase:  {{ Form::text('GeneralPurchase', (isset($propertyData['GeneralPurchase']))?$propertyData['GeneralPurchase']:"" , array('placeholder' => 'Purchase','class'=>'form-control')) }} </td> 
                                        <td width="50%">Price:   {{ Form::text('GeneralPrice', (isset($propertyData['GeneralPrice']))?$propertyData['GeneralPrice']:"" , array('placeholder' => 'Price','class'=>'form-control')) }} </td> 

                                    </tr>
                                     <tr>
                                         <td width="50%">Sub Division:  {{ Form::text('subDivName', (isset($propertyData['subDivName']))?$propertyData['subDivName']:"" , array('placeholder' => 'Sub Division','class'=>'form-control')) }}</td>
                                        <td width="50%">Association Fee:    {{ Form::text('associatedFee', (isset($propertyData['associatedFee']))?$propertyData['associatedFee']:"" , array('placeholder' => 'Association Fee','class'=>'form-control')) }}</td> 

                                    </tr>
                                    <tr>
                                    <td width="50%">Assoc. Frequency:   {{Form::select("GFrequency", $Frequency_data, (isset($propertyData['GFrequency']))?$propertyData['GFrequency']:"" ,array('class'=>'form-control-list') )}}</td>
                                    <td width="50%">&nbsp;</td>
                                    </tr>

                                 </table>
                                   <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Misc:</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" calspan="2"> Notes:<br/>{{ Form::textarea('Notes', (isset($propertyData['Notes']))?$propertyData['Notes']:"" , array('placeholder' => 'Notes','class'=>'form-control_larg_box_area')) }}
                                        </td> 

                                               </tr>





                            </table> 
                               </td>
                           </tr>
                       </table>
                       
                        
                    </td>
                   
                    <td width="50%">
                      <table class='table-responsive ' border='1' width="100%">
                           <tr>
                               <td>
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Utilities</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  colspan="2"> Insurance Company:   {{ Form::text('UInsuranceCompany', (isset($propertyData['UInsuranceCompany']))?$propertyData['UInsuranceCompany']:"" , array('placeholder' => 'Insurance Company','class'=>'form-control_larg_box')) }} </td> 
                                        
                                    </tr>
                                    <tr>
                                         <td width="50%"> Insurance Payment: {{ Form::text('insurancePayment', (isset($propertyData['insurancePayment']))?$propertyData['insurancePayment']:"" , array('placeholder' => 'Insurance Payment','class'=>'form-control')) }}   </td> 
                                        <td width="50%">Electric Company:  {{ Form::text('electricCompany', (isset($propertyData['electricCompany']))?$propertyData['electricCompany']:"" , array('placeholder' => 'Electric Company','class'=>'form-control')) }}   </td> 

                                    </tr>
                                     <tr>
                                         <td width="50%">Electric Payment: {{ Form::text('electricPayment', (isset($propertyData['electricPayment']))?$propertyData['electricPayment']:"" , array('placeholder' => 'Electric Payment','class'=>'form-control')) }}  </td>
                                         <td width="50%">Water Company:  {{ Form::text('WaterCompany', (isset($propertyData['WaterCompany']))?$propertyData['WaterCompany']:"" , array('placeholder' => 'Water Company','class'=>'form-control')) }}  </td> 

                                    </tr>
                                    <tr>
                                        <td width="50%">Water Payment:  {{ Form::text('WaterCompanyPayment', (isset($propertyData['WaterCompanyPayment']))?$propertyData['WaterCompanyPayment']:"" , array('placeholder' => 'Water Payment','class'=>'form-control')) }}</td>
                                        <td width="50%">Gas Company: {{ Form::text('GasCompany', (isset($propertyData['GasCompany']))?$propertyData['GasCompany']:"" , array('placeholder' => 'Gas Company','class'=>'form-control')) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Gas Payment:    {{ Form::text('GasCompanyPayment', (isset($propertyData['GasCompanyPayment']))?$propertyData['GasCompanyPayment']:"" , array('placeholder' => 'Gas Payment','class'=>'form-control')) }}</td>
                                        <td width="50%">&nbsp;</td>
                                    </tr>


                                 </table>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Property</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" colspan="2"> Beds:{{ Form::text('bedRooms', (isset($propertyData['bedRooms']))?$propertyData['bedRooms']:"" , array('placeholder' => 'Beds','class'=>'form-control_larg_box')) }} </td> 

                                    </tr>
                                    <tr>
                                         <td width="50%"> Baths:{{ Form::text('baths', (isset($propertyData['baths']))?$propertyData['baths']:"" , array('placeholder' => 'Baths','class'=>'form-control')) }} </td> 
                                        <td width="50%">Living:{{ Form::text('PropertyLiving', (isset($propertyData['PropertyLiving']))?$propertyData['PropertyLiving']:"" , array('placeholder' => 'Living','class'=>'form-control')) }} </td> 

                                    </tr>
                                     <tr>
                                         <td width="50%">Lot Size:  {{ Form::text('lotSize', (isset($propertyData['lotSize']))?$propertyData['lotSize']:"" , array('placeholder' => 'Lot Size','class'=>'form-control')) }}</td>
                                        <td width="50%">Built:  {{ Form::text('Built', (isset($propertyData['Built']))?$propertyData['Built']:"" , array('placeholder' => 'Built','class'=>'form-control')) }} </td> 

                                    </tr>
                                    <tr>
                                        <td width="50%">A/C: {{Form::select("PAccount", $PAccount_data, (isset($propertyData['PAccount']))?$propertyData['PAccount']:"" ,array('class'=>'form-control-list') )}}</td>
                                        <td width="50%">Hot:  {{Form::select("Hot", $Hot_data, (isset($propertyData['Hot']))?$propertyData['Hot']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Plumbing: {{Form::select("Plumbing", $Plumbing_data, (isset($propertyData['Plumbing']))?$propertyData['Plumbing']:"" ,array('class'=>'form-control-list') )}}</td>
                                        <td width="50%">Type:{{Form::select("PType", $PType_data, (isset($propertyData['PType']))?$propertyData['PType']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                     <tr>
                                        <td width="50%">Stories:    {{Form::select("Stories", $Stories_data, (isset($propertyData['Stories']))?$propertyData['Stories']:"" ,array('class'=>'form-control-list') )}}</td>
                                        <td width="50%">Manufacture:{{Form::select("Manufacture", $Manufacture_data, (isset($propertyData['Manufacture']))?$propertyData['Manufacture']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Own Land:     {{Form::select("OwnLand", $OwnLand_data, (isset($propertyData['OwnLand']))?$propertyData['OwnLand']:"" ,array('class'=>'form-control-list') )}}</td>
                                        <td width="50%">55+:{{Form::select("fiftyFivePlusCommunity", $fiftyFive_data, (isset($propertyData['fiftyFivePlusCommunity']))?$propertyData['fiftyFivePlusCommunity']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                 </table> 
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Amenities</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%"> Garage:   {{Form::select("garages", $garages_data, (isset($propertyData['garages']))?$propertyData['garages']:"yes" ,array('class'=>'form-control-list') )}} </td> 
                                        <td width="50%"> Pool:  {{Form::select("Pool", $Pool_data, (isset($propertyData['Pool']))?$propertyData['Pool']:"" ,array('class'=>'form-control-list') )}} </td> 
                                    </tr>
                                    <tr>
                                        
                                        <td width="50%">Fire Place:   {{Form::select("firePlaces", $firePlaces_data, (isset($propertyData['firePlaces']))?$propertyData['firePlaces']:"" ,array('class'=>'form-control-list') )}} </td> 
                                        <td width="50%">Refrigerator: {{Form::select("Refrigerator", $Refrigerator_data, (isset($propertyData['Refrigerator']))?$propertyData['Refrigerator']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                     <tr>
                                         
                                        <td width="50%">Dishwasher:  {{Form::select("dishwasher", $dishwasher_data, (isset($propertyData['dishwasher']))?$propertyData['dishwasher']:"" ,array('class'=>'form-control-list') )}} </td> 
                                        <td width="50%">Washer: {{Form::select("Washer", $Washer_data, (isset($propertyData['Washer']))?$propertyData['Washer']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                    <tr>
                                        
                                        <td width="50%">Dryer:   {{Form::select("dryer", $dryer_data, (isset($propertyData['dryer']))?$propertyData['dryer']:"" ,array('class'=>'form-control-list') )}}</td>
                                         <td width="50%">sprinkler:  {{Form::select("Sprinkler", $Sprinkler_data, (isset($propertyData['Sprinkler']))?$propertyData['Sprinkler']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                    <tr>
                                       
                                        <td width="50%">Patio: {{Form::select("Patio", $Patio_data, (isset($propertyData['Patio']))?$propertyData['Patio']:"" ,array('class'=>'form-control-list') )}}</td>
                                        <td width="50%">Yard: {{Form::select("Yard", $Yard_data, (isset($propertyData['Yard']))?$propertyData['Yard']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                    
                                  
                                 </table> 
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Status</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%"> Occupied:    {{Form::select("Occupied", $Occupied_data, (isset($propertyData['Occupied']))?$propertyData['Occupied']:"" ,array('class'=>'form-control-list') )}} </td> 
                                        <td width="50%"> Vacant:  {{Form::select("Vacant", $Vacant_data, (isset($propertyData['Vacant']))?$propertyData['Vacant']:"" ,array('class'=>'form-control-list') )}}</td> 
                                    </tr>
                                    <tr>
                                        
                                        <td width="50%">Length:    {{ Form::text('Length', (isset($propertyData['Length']))?$propertyData['Length']:"" , array('placeholder' => 'Length','class'=>'form-control')) }}</td> 
                                        <td width="50%">Rented: {{Form::select("Rented", $Rented_data, (isset($propertyData['Rented']))?$propertyData['Rented']:"" ,array('class'=>'form-control-list') )}}</td>
                                    </tr>
                                     <tr>
                                         
                                        <td width="50%">Rent Price:  {{ Form::text('rentPrice', (isset($propertyData['rentPrice']))?$propertyData['rentPrice']:"" , array('placeholder' => 'Rent Price','class'=>'form-control')) }} </td> 
                                        <td width="50%">Expired: {{ Form::text('Expired', (isset($propertyData['Expired']))?$propertyData['Expired']:"" , array('placeholder' => 'Expired','class'=>'form-control')) }}</td>
                                    </tr>
  
                                 </table>  
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Listing</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%"> Realtor:   {{ Form::text('Realtor', (isset($propertyData['Realtor']))?$propertyData['Realtor']:"" , array('placeholder' => 'Realtor','class'=>'form-control')) }} </td> 
                                        <td width="50%"> Commission Rate:  {{ Form::text('Commission', (isset($propertyData['Commission']))?$propertyData['Commission']:"" , array('placeholder' => 'Commission Rate','class'=>'form-control')) }}</td> 
                                    </tr>
                                    <tr>
                                        
                                        <td width="50%">Expiration:    {{ Form::text('Expiration', (isset($propertyData['Expiration']))?$propertyData['Expiration']:"" , array('placeholder' => 'Expiration','class'=>'form-control')) }}</td> 
                                        <td width="50%">Days On Market: {{ Form::text('DaysOnMarket', (isset($propertyData['DaysOnMarket']))?$propertyData['DaysOnMarket']:"" , array('placeholder' => '','class'=>'form-control')) }}</td>
                                    </tr>
                                  
  
                                 </table> 
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Backdrop</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" calspan="2"> Reason for Selling?:  {{ Form::text('ReasonforSelling', (isset($propertyData['ReasonforSelling']))?$propertyData['ReasonforSelling']:"" , array('placeholder' => 'Reason for Selling?','class'=>'form-control_larg_box')) }} </td> 
                                         
                                    </tr>
                                    <tr>
                                        <td width="100%" calspan="2"> How Did You Arrive at Your price?: {{ Form::text('AtYourprice', (isset($propertyData['AtYourprice']))?$propertyData['AtYourprice']:"" , array('placeholder' => 'How Did You Arrive at Your price?','class'=>'form-control_larg_box')) }} </td> 
                                         
                                    </tr>
                                   
                                  
  
                                 </table> 
                                  <table class='table-responsive ' border='1' width="100%">
                            
                                    <tr>
                                        <td colspan="2">
                                            <div class="heading">
                                             <h3>Relocating</h3>
                                             </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" calspan="2"> Reason:  {{ Form::text('Reason', (isset($propertyData['Reason']))?$propertyData['Reason']:"" , array('placeholder' => 'Reason','class'=>'form-control_larg_box')) }} </td> 
                                         
                                    </tr>
                                    <tr>
                                        <td width="100%" calspan="2"> Where: {{ Form::text('Where', (isset($propertyData['Where']))?$propertyData['Where']:"" , array('placeholder' => 'Where','class'=>'form-control_larg_box')) }} </td> 
                                         
                                    </tr>
                                    <tr>
                                        <td width="50%"> Date: {{ Form::text('BackdropDate', (isset($propertyData['BackdropDate']))?$propertyData['BackdropDate']:"" , array('placeholder' => 'Date','id'=>'relocatingdate','class'=>'form-control datepicker')) }} </td> 
                                        <td width="50%">&nbsp;</td> 
                                    </tr>
                                   
                                  
  
                                 </table>
                                   
                               </td>
                           </tr>
                      </table>
                      
                      
                    </td>
                </tr>
                
                  <tr>
                    <td colspan="5" align="center">
                        <div class="form-group">
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-primary">Update Property</button>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
     
      {{ Form::close() }}
     
     </table> 
</div>  
</table>
        

@stop
