$(document).ready(function(){
    $('#createproduct').click(function(){
        var valid;
        
        var categeoryid = $('#categeoryid').val();
        var productname=$('#productname').val();
        var pageurl = $('#pageurl').val();
        var monthprice=$('#monthprice').val();
        var annualmonth = $('#annualmonth').val();
        var sku=$('#sku').val();
        var Bandwidth = $('#Bandwidth').val();
        var freedomain=$('#freedomain').val();
        var language_tech = $('#language_tech').val();
        var mailbox=$('#mailbox').val();
        var webspace=$('#webspace').val();
        if(monthprice>annualmonth) {
          alert('month price should be less than annual price');
        }
        else{
          $.ajax({
            method: "POST",
            url: "admin_interface.php",
            data: {
                action: "createproduct",
                categeoryid: categeoryid,
                productname: productname,
                pageurl: pageurl,
                monthprice: monthprice,
                annualmonth:annualmonth,
                sku:sku,
                Bandwidth:Bandwidth,
                freedomain:freedomain,
                language_tech:language_tech,
                mailbox:mailbox,
                webspace:webspace
            },
            success: function(data) {          
              alert('Product added successfully');
            },
            error: function() {
                alert("error");
            }
        });
        }
      
    
      });
    var errorcategoryid=0;
var errorproduct=0;
var errormonthprice=0;
var errorannualmonth=0;
var errorsku=0;
var errorBandwidth=0;
var errorfreedomain=0;
var errorlanguage_tech=0;
var errormailbox=0;
var errorwebspace=0;
$('#categeoryid').focusout(function(){
  var categeoryid=$('#categeoryid').val();
  if(categeoryid=='0'){
    $('#createproduct').prop('disabled',true);
    $('#categeoryid').addClass('is-invalid');
    $('#categeoryidfield').html('<span>select category</span>');
    errorcategoryid=0;
  }
  else{
    $('#categeoryid').removeClass('is-invalid');
    errorcategoryid=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }

});
$('#productname').focusout(function(){
  validateproductname();
});
function validateproductname(){
  var nletters =/(^([a-zA-Z]+\-[0-9]+$))|(^([a-zA-Z])+$)/;
  var productname=($('#productname').val()).trim();
  if(productname==''){
    $('#createproduct').prop('disabled',true);
    $('#productname').addClass('is-invalid');
    $('#enterfield').html('<span>enter product name</span>');
    errorproduct=0;
    
  } 
  else if(!(productname.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#productname').addClass('is-invalid');
    $('#enterfield').html('<span>enter valid name like</span>');
    errorproduct=0;
  }
  else{
    $('#productname').removeClass('is-invalid');
    errorproduct=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }

  }
}
$('#pageurl').focusout(function(){
  validateurl();
});
function validateurl(){
  
  var pageurl=($('#pageurl').val()).trim();
  if(pageurl==''){
    $('#createproduct').prop('disabled',true);
    $('#pageurl').addClass('is-invalid');
    $('#pageurlfield').html('<span>enter page url name</span>');
    
  } 
 
  else{
    $('#pageurl').removeClass('is-invalid');
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}

$('#monthprice').focusout(function(){
  validatemonthprice();
});
function validatemonthprice(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var pageurl=$(('#monthprice').val()).trim();
  if(pageurl==''){
    $('#createproduct').prop('disabled',true);
    $('#monthprice').addClass('is-invalid');
    $('#monthfield').html('<span>enter Monthly price</span>');
    errormonthprice=0;
    
  } 
  else if(!(pageurl.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#monthprice').addClass('is-invalid');
    $('#monthfield').html('<span>only one . is valid</span>');
    errormonthprice=0;
  }
  else{
    $('#monthprice').removeClass('is-invalid');
    errormonthprice=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}
$('#annualmonth').focusout(function(){
  validateannual();
});
function validateannual(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var pageurl=($('#annualmonth').val()).trim();
  if(pageurl==''){
    $('#createproduct').prop('disabled',true);
    $('#annualmonth').addClass('is-invalid');
    $('#annualfield').html('<span>enter Annual price</span>');
    errorannualmonth=0;
    
  } 
  else if(!(pageurl.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#annualmonth').addClass('is-invalid');
    $('#annualfield').html('<span>only one . is valid</span>');
    errorannualmonth=0;
  }
  else{
    $('#annualmonth').removeClass('is-invalid');
    errorannualmonth=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}

$('#sku').focusout(function(){
  validatesku();
});
function validatesku(){
  var nletters =/^(?![!@#$%^&*()_+=-`~?|]*$)[a-zA-Z0-9-#]+$/ ;
  var sku=($('#sku').val()).trim();
  if(sku==''){
    $('#createproduct').prop('disabled',true);
    $('#sku').addClass('is-invalid');
    $('#skufield').html('<span>enter SKU Field</span>');
    errorsku=0;
    
  } 
  else if(!(sku.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#sku').addClass('is-invalid');
    $('#skufield').html('<span>spaecial charecter are not allowed except(#,-) is valid</span>');
    errorsku=0;
  }
  else{
    $('#sku').removeClass('is-invalid');
    errorsku=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}
$('#Bandwidth').focusout(function(){
  validatebandwidth();
});
function validatebandwidth(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var Bandwidth=($('#Bandwidth').val()).trim();
  if(Bandwidth==''){
    $('#createproduct').prop('disabled',true);
    $('#Bandwidth').addClass('is-invalid');
    $('#bandwidthfield').html('<span>enter Bandwidth Field</span>');
    errorBandwidth=0;
    
  } 
  else if(!(Bandwidth.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#Bandwidth').addClass('is-invalid');
    $('#bandwidthfield').html('<span>spaecial charecter are not allowed except(#,-) is valid</span>');
    errorBandwidth=0;
  }
  else{
    $('#Bandwidth').removeClass('is-invalid');
    errorBandwidth=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}
$('#freedomain').focusout(function(){
  validatefreedomain();
});
function validatefreedomain(){
  var nletters =/(^([a-zA-Z])+$)|(([0-9])+$)/;
  var freedomain=($('#freedomain').val()).trim();
  if(freedomain==''){
    $('#createproduct').prop('disabled',true);
    $('#freedomain').addClass('is-invalid');
    $('#freedomainfield').html('<span>enter freedomain Field</span>');
    errorfreedomain=0;
    
  } 
  else if(!(freedomain.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#freedomain').addClass('is-invalid');
    $('#freedomainfield').html('<span>please enter valid freedomain</span>');
    errorfreedomain=0;
  }
  else{
    $('#freedomain').removeClass('is-invalid');
  errorfreedomain=1;
  if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
    $('#createproduct').prop('disabled',false);
  }
  }
}
$('#language_tech').focusout(function(){
  validatelanguage();
}); 
function validatelanguage(){
  var nletters = /(^((?![0-9]+$)[a-zA-Z0-9]+\,?\s?)+$)/;
  var language_tech=($('#language_tech').val()).trim();
  if(language_tech[language_tech.length-1] == ","){
    //alert(', are not allowed at the end');
    $('#language_tech').addClass('is-invalid');
    $('#language_techfield').html('<span>, are not allowed at the end</span>');
    errorlanguage_tech=0;
  }
  else if(language_tech==''){
    $('#createproduct').prop('disabled',true);
    $('#language_tech').addClass('is-invalid');
    $('#language_techfield').html('<span>language/technology Field is required</span>');
    errorlanguage_tech=0;
    
  } 
  else if(!(language_tech.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#language_tech').addClass('is-invalid');
    $('#language_techfield').html('<span>please enter valid freedomain</span>');
    errorlanguage_tech=0;
  }
  else{
    $('#language_tech').removeClass('is-invalid');
    errorlanguage_tech=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}
$('#mailbox').focusout(function(){
  validatemailbox();
});
function validatemailbox(){
  var nletters =/(^([0-9])+$)/;
  
  var mailbox=($('#mailbox').val()).trim();
  if(mailbox==''){
    $('#createproduct').prop('disabled',true);
    $('#mailbox').addClass('is-invalid');
    $('#mailboxfield').html('<span>mailbox Field is required</span>');
    errormailbox=0;
    
  } 
  else if(!(mailbox.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#mailbox').addClass('is-invalid');
    $('#mailboxfield').html('<span>please enter valid mailbox</span>');
    errormailbox=0;
  }
  else{
    
    $('#mailbox').removeClass('is-invalid');
    errormailbox=1;
    console.log(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace);
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}
$('#webspace').focusout(function(){
  validatewebspace();
}); 
function validatewebspace(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var webspace=($('#webspace').val()).trim();
  if(webspace==''){
    $('#createproduct').prop('disabled',true);
    $('#webspace').addClass('is-invalid');
    $('#webspacefield').html('<span>webspace Field is required</span>');
    errorwebspace=0;
    
  } 
  else if(!(webspace.match(nletters))){
    $('#createproduct').prop('disabled',true);
    $('#webspace').addClass('is-invalid');
    $('#webspacefield').html('<span>please enter valid webspace</span>');
    errorwebspace=0;
  }
  else{
    $('#webspace').removeClass('is-invalid');
    errorwebspace=1;
    if(errorcategoryid+errorproduct+errormonthprice+errorannualmonth+errorsku+errorBandwidth+errorfreedomain+errorlanguage_tech+errormailbox+errorwebspace>=10){
      $('#createproduct').prop('disabled',false);
    }
  }
}
})