$(document).ready(function(){
    $('#updateProduct').prop('disabled',true);
$('#categeoryid').focusout(function(){
  var categeoryid=$('#categeoryid').val();
  if(categeoryid=='0'){
    $('#updateProduct').prop('disabled',true);
    $('#categeoryid').addClass('is-invalid');
    $('#categeoryidfield').html('<span>select category</span>');
    
  }
  else{
    $('#categeoryid').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
  }

});
$('#productname').focusout(function(){
  validateproductname();
});
function validateproductname(){
  var nletters =/(^([a-zA-Z]+\-[0-9]+$))|(^([a-zA-Z])+$)/;
  var productname=($('#productname').val()).trim();
  if(productname==''){
    $('#updateProduct').prop('disabled',true);
    $('#productname').addClass('is-invalid');
    $('#enterfield').html('<span>enter product name</span>');
   
    
  } 
  else if(!(productname.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#productname').addClass('is-invalid');
    $('#enterfield').html('<span>enter valid name like</span>');
    
  }
  else{
    $('#productname').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
    

  }
}
$('#pageurl').focusout(function(){
  validateurl();
});
function validateurl(){
  var pageurl=($('#pageurl').val()).trim();
  if(pageurl==''){
    $('#updateProduct').prop('disabled',true);
    $('#pageurl').addClass('is-invalid');
    $('#pageurlfield').html('<span>enter page url name</span>');
    
  }
  else{
    $('#pageurl').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
  }
}

$('#monthprice').focusout(function(){
  validatemonthprice();
});
function validatemonthprice(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var pageurl=($('#monthprice').val()).trim();
  if(pageurl==''){
    $('#updateProduct').prop('disabled',true);
    $('#monthprice').addClass('is-invalid');
    $('#monthfield').html('<span>enter Monthly price</span>');
    
    
  } 
  else if(!(pageurl.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#monthprice').addClass('is-invalid');
    $('#monthfield').html('<span>only one . is valid</span>');
    
  }
  else{
    $('#monthprice').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
    
  }
}
$('#annualmonth').focusout(function(){
  validateannual();
});
function validateannual(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var pageurl=($('#annualmonth').val()).trim();
  if(pageurl==''){
    $('#updateProduct').prop('disabled',true);
    $('#annualmonth').addClass('is-invalid');
    $('#annualfield').html('<span>enter Annual price</span>');
    
    
  } 
  else if(!(pageurl.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#annualmonth').addClass('is-invalid');
    $('#annualfield').html('<span>only one . is valid</span>');
    
  }
  else{
    $('#annualmonth').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
   
  }
}

$('#sku').focusout(function(){
  validatesku();
});
function validatesku(){
  var nletters =/^(?![!@#$%^&*()_+=-`~?|]*$)[a-zA-Z0-9-#]+$/ ;
  var sku=($('#sku').val()).trim();
  if(sku==''){
    $('#updateProduct').prop('disabled',true);
    $('#sku').addClass('is-invalid');
    $('#skufield').html('<span>enter SKU Field</span>');
    
  } 
  else if(!(sku.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#sku').addClass('is-invalid');
    $('#skufield').html('<span>spaecial charecter are not allowed except(#,-) is valid</span>');
    
  }
  else{
    $('#sku').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
  
    
  }
}
$('#Bandwidth').focusout(function(){
  validatebandwidth();
});
function validatebandwidth(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var Bandwidth=($('#Bandwidth').val()).trim();
  if(Bandwidth==''){
    $('#updateProduct').prop('disabled',true);
    $('#Bandwidth').addClass('is-invalid');
    $('#bandwidthfield').html('<span>enter Bandwidth Field</span>');
    
    
  } 
  else if(!(Bandwidth.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#Bandwidth').addClass('is-invalid');
    $('#bandwidthfield').html('<span>spaecial charecter are not allowed except(#,-) is valid</span>');
   
  }
  else{
    $('#Bandwidth').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
    
    
  }
}
$('#freedomain').focusout(function(){
  validatefreedomain();
});
function validatefreedomain(){
  var nletters =/(^([a-zA-Z])+$)|(([0-9])+$)/;
  var freedomain=($('#freedomain').val()).trim();
  if(freedomain==''){
    $('#updateProduct').prop('disabled',true);
    $('#freedomain').addClass('is-invalid');
    $('#freedomainfield').html('<span>enter freedomain Field</span>');
    
    
  } 
  else if(!(freedomain.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#freedomain').addClass('is-invalid');
    $('#freedomainfield').html('<span>please enter valid freedomain</span>');
    
  }
  else{
    $('#freedomain').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
  
  }
}
$('#language_tech').focusout(function(){
  validatelanguage();
}); 
function validatelanguage(){
  var nletters = /^((?![0-9]+$)[a-zA-Z0-9]+\,?\s?)+$/;
  var language_tech=($('#language_tech').val()).trim();
  if(language_tech==''){
    $('#updateProduct').prop('disabled',true);
    $('#language_tech').addClass('is-invalid');
    $('#language_techfield').html('<span>language/technology Field is required</span>');
  } 
  else if(!(language_tech.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#language_tech').addClass('is-invalid');
    $('#language_techfield').html('<span>please enter valid freedomain</span>');
   
  }
  else{
    $('#language_tech').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
    
  }
}
$('#mailbox').focusout(function(){
  validatemailbox();
});
function validatemailbox(){
  var nletters =/(^([0-9])+$)/;
  
  var mailbox=($('#mailbox').val()).trim();
  if(mailbox==''){
    $('#updateProduct').prop('disabled',true);
    $('#mailbox').addClass('is-invalid');
    $('#mailboxfield').html('<span>mailbox Field is required</span>');
    
  } 
  else if(!(mailbox.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#mailbox').addClass('is-invalid');
    $('#mailboxfield').html('<span>please enter valid mailbox</span>');
    errormailbox=0;
  }
  else{
    
    $('#mailbox').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
    
  }
}
$('#webspace').focusout(function(){
  validatewebspace();
}); 
function validatewebspace(){
  var nletters =/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
  var webspace=($('#webspace').val()).trim();
  if(webspace==''){
    $('#updateProduct').prop('disabled',true);
    $('#webspace').addClass('is-invalid');
    $('#webspacefield').html('<span>webspace Field is required</span>');
    
    
  } 
  else if(!(webspace.match(nletters))){
    $('#updateProduct').prop('disabled',true);
    $('#webspace').addClass('is-invalid');
    $('#webspacefield').html('<span>please enter valid webspace</span>');
    
  }
  else{
    $('#webspace').removeClass('is-invalid');
    $('#updateProduct').prop('disabled',false);
    
  }
}
})