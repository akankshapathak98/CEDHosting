if(window.history.replaceState){
   window.history.replaceState(null,null,window.location.href);
}
function validateform(){
   var mletters =/^(0)?[4-9]{1}[0-9]{9}$/;
var pletters =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-])\S{8,16}$/;
var nletters =/^([a-zA-Z]+\s?)*$/;
var aletters =/^([a-zA-Z0-9])i*$/;
//var eletters=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
var eletters=/^[a-zA-Z0-9.-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/

var name=$('#name').val();
var mobile=$('#mobile').val();
var password=$('#password').val();
var confirmPassword=$('#cpassword').val();
var email=$('#email').val();
var securityAns=$('#security').val();
var ans=$('#answer').val();
if(name=='' || mobile==''|| password==''|| confirmPassword==''|| email==''||securityAns==''){
   alert('Enter all field');
   return false;
}
else if(name==' ' || mobile==' '|| password==' '|| confirmPassword==' '||securityAns==' ')
{
   alert('only spaces are not allowed');
   return false;
}
else if(ans==''||ans==' ' || securityAns=='Select Security question'){
   alert('please select the question');
   return false;
}
else if(password!=confirmPassword){
   alert('password and confirm password should be same');
   return false;
}
else if(!(mobile.match(mletters))){
   alert('enter valid mobile number');
   return false;
}
else if(!(password.match(pletters))){
   alert('password must be in 8 to 16 charecter contain at least one numeric digit,one uppercase and one lowercase letter,one special charecter');
   return false;
}
else if(!(name.match(nletters))){
  alert('only letters are allowed in name field only one space are allowed between first and last name');
  return false;
}
else if(!(email.match(eletters))){
   alert('follow email format a@abc.com');
   return false;

}
else{
   return true;
}
}

$(document).ready(function(){
    
    $('#security').change(function(){

var select=$('#security').val();
console.log(select);
if(select=='Select Security question'){
   $('#answer').hide();
}
else{
   $('#answer').show();
}
})
$('#password').focus(function(){
   $('#passwordvalidation').show().fadeOut(7000);
})
   
})
