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
                        <input class="form-control" id="link" placeholder="link" type="text"  value="'+ data[i]['html']+'">\
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
   
    //edit Product
    $('.prodtable').on('click','#editproduct',function(){
      var id = $(this).data('id');
      //var action=$(this).data('action');
      $.ajax({
        method: "POST",
        url: "admin_interface.php",
        data: {
            action: "editproduct",
            id: id,
        },
        dataType: 'json',
        success: function(data) {
                   
          for (var i = 0; i < data.length; i++) {
            var obj = JSON.parse(data[i]['description']);
            $('#categeoryid').val(data[i]['prod_parent_id']);
            $('#productname').val(data[i]['prod_name']);
           $('#pageurl').val(data[i]['html']);
            $('#monthprice').val(data[i]['mon_price']);
            $('#annualmonth').val(data[i]['annual_price']);
           $('#sku').val(data[i]['sku']);
           $('#Bandwidth').val(obj.Bandwidth);
           $('#freedomain').val(obj.freedomain);
            $('#language_tech').val(obj.language_tech);
            $('#mailbox').val(obj.mailbox);
           $('#webspace').val(obj.webspace);
           $('#updateProduct').data('id',data[i]['prod_id']);
          }
      
      
  },
  error: function() {
      alert("error");
  }
});
    });
    $('.prodtable').on('click','#deleteproduct',function(){
      var id = $(this).data('id');
      //var action=$(this).data('action');
      $.ajax({
        method: "POST",
        url: "admin_interface.php",
        data: {
            action: "deleteproduct",
            id: id,
        },
        dataType: 'json',
        success: function(data) {
          window.location.reload();    
         
          },
  error: function() {
      alert("error");
  }
});
    });
   
    $('.prodtable ,#updateproducts').on("click", '#updateProduct', function() {
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
      var id = $(this).data('id');
     
          $.ajax({
              method: "POST",
              url: "admin_interface.php",
              data: {
                  action: "updateProduct",
                  id: id,
                  categeoryid: categeoryid,
                  productname: productname,
                  pageurl: pageurl,
                  productname: productname,
                  monthprice: monthprice,
                  annualmonth: annualmonth,
                  sku: sku,
                  Bandwidth: Bandwidth,
                  freedomain: freedomain,
                  language_tech: language_tech,
                  mailbox: mailbox,
                  
                  webspace: webspace
              },
              success: function(data) {
                window.location.reload(); 
              },
              error: function() {
                  alert("error");
              }
          });

      
  });
    // function validateform(){
    //   var categeoryid = $('#categeoryid').val();
    //   var productname=$('#productname').val();
    //   var pageurl = $('#pageurl').val();
    //   var monthprice=$('#monthprice').val();
    //   var annualmonth = $('#annualmonth').val();
    //   var sku=$('#sku').val();
    //   var Bandwidth = $('#Bandwidth').val();
    //   var freedomain=$('#freedomain').val();
    //   var language_tech = $('#language_tech').val();
    //   var mailbox=$('#mailbox').val();
    //   var webspace=$('#webspace').val();
    //   if(categeoryid==''||productname==''||pageurl==''||monthprice==''||annualmonth==''||sku==''||Bandwidth==''||freedomain==''||language_tech==''||mailbox=='',webspace==''){
    //     alert('enter all field');
    //   }
    //   else {
    //     alert('product created successfully');
    //   }
    // }
   
  
})