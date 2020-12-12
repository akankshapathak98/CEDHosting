$(document).ready(function(){
  $('#createproduct').prop('disabled',true);
    $('.cattable').DataTable( {
        "ajax": "admin_interface.php?getProduct=1"
    } );
    $('.prodtable').DataTable( {
      "ajax": "admin_interface.php?getProducts=1"
  } );
    $('#createcategory').click(function(){
        var categoryname=$('#categoryname').val();
        var link=$('#link').val();
        $.ajax({
            method: "POST",
            url: "admin_interface.php",
            data: {
                action: "insertCategory",
                categoryname: categoryname,
                link:link
            },
            success: function(data) {
                window.location.reload();   
            },
            error: function() {
                alert("error");
            }
        });
    });
    $('.cattable').on('click','.actioncategory',function(){
        var id = $(this).data('id');
        var action=$(this).data('action');
        if(action=='edit'){
            $.ajax({
                method: "POST",
                url: "admin_interface.php",
                data: {
                    action: "edit",
                    id: id,
                },
                dataType: 'json',
                success: function(data) {
                   var html='';
                   for (var i = 0; i < data.length; i++) {
                      html+='<div class="form-group">\
                      <div class="input-group input-group-merge input-group-alternative">\
                        <div class="input-group-prepend">\
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>\
                        </div>\
                        <input class="form-control" disabled type="Text" value="Hosting">\
                      </div>\
                    </div>\
                    <div class="form-group">\
                      <div class="input-group input-group-merge input-group-alternative mb-3">\
                        <div class="input-group-prepend">\
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>\
                        </div>\
                        <input class="form-control" id="categoryname" placeholder="Category Name" type="text"  value="'+data[i]['prod_name']+'">\
                      </div>\
                    </div>\
                    <div class="form-group">\
                      <div class="input-group input-group-merge input-group-alternative mb-3">\
                        <div class="input-group-prepend">\
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>\
                        </div>\
                        <input class="form-control" id="link" placeholder="link" type="text"  value="'+ data[i]['link']+'">\
                      </div>\
                    </div>\
                    <div class="form-group">\
                      <div class="input-group input-group-merge input-group-alternative mb-3">\
                        <select class="custom-select" id="selectcate">';
                                if ( data[i]['prod_available']==1) {
                                    html+='<option selected value="1">Available</option>\
                                <option value="0">Unavailable</option>';
                                } else {
                                    html+='<option value="1">Available</option>\
                                <option value="0" selected>Unavailable</option>';
                                }
                        html+='</select>\
                      </div>\
                    </div>\
                    <div class="text-center">\
                      <button type="button" id="updateCategory" data-id="'+data[i]['id']+'" class="btn btn-primary mt-4">Update Category</button>\
                      <button type="button" class="btn btn-danger mt-4 ml-auto" data-dismiss="modal">Close</button>\
                    </div>'; 
                            }
                    $('#editform').html(html);
                },
                error: function() {
                    alert("error");
                }
            });
        }
      else{
        if (confirm("Are you sure to delete the Sub Category")) {
            $.ajax({
                method: "POST",
                url: "admin_interface.php",
                data: {
                    action: "delete",
                    id: id,
                },
                success: function(data) {
                   
                        window.location.reload(); 
                    
                    
                },
                error: function() {
                    alert("error");
                }
            });
        }
      }
    });
    $('.cattable ,#editform').on("click", '#updateCategory', function() {
        var categoryname = $('#editform #categoryname').val();
        var link = $('#editform #link').val();
        var isavail = $('#selectcate').val();
        var id = $(this).data('id');
       
            $.ajax({
                method: "POST",
                url: "admin_interface.php",
                data: {
                    action: "updateCategory",
                    id: id,
                    categoryname: categoryname,
                    link: link,
                    isavail: isavail
                },
                success: function(data) {
                   
                    window.location.reload(); 
                    

                    
                },
                error: function() {
                    alert("error");
                }
            });

        
    });
    $('#createproduct').click(function(){
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
    });
    //edit Product
    $('.prodtable').on("click", '.actionproduct', function() {
      var id = $(this).data('id');
        
        $.ajax({
          method: "POST",
          url: "admin_interface.php",
          data: {
              action: "editproduct",
              id: id,
          },
          dataType: 'json',
          success: function(data) {
             console.log(data);
            var html='';
            for (var i = 0; i < data.length; i++) {
              var obj = JSON.parse(data[i]['description']);
              
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
      
            
            }
              
              $('#produteditform').html(html);
          },
          error: function() {
              alert("error");
          }
      });
    })
    // function trimvalue(data){
    //   data=trim(data);
    //   return data;
    // }
    function validateform(){
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
      
    }
    $('#categeoryid').focusout(function(){
      var categeoryid=$('#categeoryid').val();
      if(categeoryid=='0'){
        $('#createproduct').prop('disabled',true);
        $('#categeoryid').addClass('is-invalid');
        $('#categeoryidfield').html('<span>select category</span>');
      }
      else{
        $('#categeoryid').removeClass('is-invalid');
      }

    });
    $('#productname').focusout(function(){
      var nletters =/^([a-zA-Z]+\s?)*$/;
      var productname=$('#productname').val();
      if(productname==''){
        $('#createproduct').prop('disabled',true);
        $('#productname').addClass('is-invalid');
        $('#enterfield').html('<span>enter product name</span>');
        
      } 
      else if(!(productname.match(nletters))){
        $('#enterfield').html('<span>enter valid name</span>');
      }
      else{
        $('#productname').removeClass('is-invalid');
      }
    });
    $('#pageurl').focusout(function(){
      var nletters =/^([a-zA-Z]+\s?)*$/;
      var pageurl=$('#pageurl').val();
      if(pageurl==''){
        $('#createproduct').prop('disabled',true);
        $('#pageurl').addClass('is-invalid');
        $('#pageurlfield').html('<span>enter page url name</span>');
        
      } 
      else if(!(pageurl.match(nletters))){
        $('#pageurlfield').html('<span>enter valid page url</span>');
      }
      else{
        $('#pageurl').removeClass('is-invalid');
      }
    });

    $('#monthprice').focusout(function(){
      var nletters =/^([1-9.]+(\.[0-9]+)?)/;
      var pageurl=$('#monthprice').val();
      if(pageurl==''){
        $('#createproduct').prop('disabled',true);
        $('#monthprice').addClass('is-invalid');
        $('#monthfield').html('<span>enter Monthly price</span>');
        
      } 
      else if(!(pageurl.match(nletters))){
        $('#monthfield').html('<span>only one . is valid</span>');
      }
      else{
        $('#monthprice').removeClass('is-invalid');
      }
    });
    $('#annualmonth').focusout(function(){
      var nletters =/^([0-9.]+(\.[0-9]+)?)/;
      var pageurl=$('#annualmonth').val();
      if(pageurl==''){
        $('#createproduct').prop('disabled',true);
        $('#annualmonth').addClass('is-invalid');
        $('#annualfield').html('<span>enter Annual price</span>');
        
      } 
      else if(!(pageurl.match(nletters))){
        $('#annualfield').html('<span>only one . is valid</span>');
      }
      else{
        $('#annualmonth').removeClass('is-invalid');
      }
    });

    $('#sku').focusout(function(){
      var nletters =/^[a-zA-Z0-9_#]*$/;
      var sku=$('#sku').val();
      if(sku==''){
        $('#createproduct').prop('disabled',true);
        $('#sku').addClass('is-invalid');
        $('#skufield').html('<span>enter SKU Field</span>');
        
      } 
      else if(!(sku.match(nletters))){
        $('#skufield').html('<span>spaecial charecter are not allowed except(#,-) is valid</span>');
      }
      else{
        $('#sku').removeClass('is-invalid');
      }
    });
    $('#Bandwidth').focusout(function(){
      var nletters =/^([0-9.]+(\.[0-9]+)?)/;
      var Bandwidth=$('#Bandwidth').val();
      if(Bandwidth==''){
        $('#createproduct').prop('disabled',true);
        $('#Bandwidth').addClass('is-invalid');
        $('#bandwidthfield').html('<span>enter Bandwidth Field</span>');
        
      } 
      else if(!(Bandwidth.match(nletters))){
        $('#bandwidthfield').html('<span>spaecial charecter are not allowed except(#,-) is valid</span>');
      }
      else{
        $('#Bandwidth').removeClass('is-invalid');
      }
    });
    $('#freedomain').focusout(function(){
      var nletters =/^[A-Za-z]+$/;
      var lletters=/^[0-9]+$/;
      var freedomain=$('#freedomain').val();
      if(freedomain==''){
        $('#createproduct').prop('disabled',true);
        $('#freedomain').addClass('is-invalid');
        $('#freedomainfield').html('<span>enter freedomain Field</span>');
        
      } 
      else if(!(freedomain.match(nletters)) && !(freedomain.match(lletters))){
        $('#freedomainfield').html('<span>please enter valid freedomain</span>');
      }
      else{
        $('#freedomain').removeClass('is-invalid');
      }
    });
    $('#language_tech').focusout(function(){
      var nletters =/^[A-Za-z]+$/;
      var lletters=/^[0-9]+$/;
      var language_tech=$('#language_tech').val();
      if(language_tech==''){
        $('#createproduct').prop('disabled',true);
        $('#language_tech').addClass('is-invalid');
        $('#language_techfield').html('<span>language/technology Field is required</span>');
        
      } 
      else if(!(language_tech.match(nletters)) && !(language_tech.match(lletters))){
        $('#language_techfield').html('<span>please enter valid freedomain</span>');
      }
      else{
        $('#language_tech').removeClass('is-invalid');
      }
    }); 
    $('#mailbox').focusout(function(){
      var nletters =/^[A-Za-z]+$/;
      var lletters=/^[0-9]+$/;
      var mailbox=$('#mailbox').val();
      if(mailbox==''){
        $('#createproduct').prop('disabled',true);
        $('#mailbox').addClass('is-invalid');
        $('#mailboxfield').html('<span>mailbox Field is required</span>');
        
      } 
      else if(!(mailbox.match(nletters)) && !(mailbox.match(lletters))){
        $('#mailboxfield').html('<span>please enter valid mailbox</span>');
      }
      else{
        $('#createproduct').prop('disabled',false);
        $('#mailbox').removeClass('is-invalid');
      }
    });
    $('#webspace').focusout(function(){
      var nletters =/^[A-Za-z]+$/;
      var lletters=/^[0-9]+$/;
      var webspace=$('#webspace').val();
      if(webspace==''){
        $('#createproduct').prop('disabled',true);
        $('#webspace').addClass('is-invalid');
        $('#webspacefield').html('<span>webspace Field is required</span>');
        
      } 
      else if(!(webspace.match(nletters)) && !(webspace.match(lletters))){
        $('#webspacefield').html('<span>please enter valid webspace</span>');
      }
      else{
        $('#webspace').removeClass('is-invalid');
      }
    }); 
})