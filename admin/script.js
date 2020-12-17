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
          var link=$(".editor").text();
        $.ajax({
            method: "POST",
            url: "admin_interface.php",
            data: {
                action: "insertCategory",
                categoryname: categoryname,
                link:link
            },
            success: function(data) {
              if(data=='error')
              {
                alert('category name alreday exist');
              }
              else{
                window.location.reload();   
              }
                
            },
            error: function() {
                alert("error");
            }
        });
    });
    $('.cattable').on('click','#editcategory',function(){
      var id = $(this).data('id');
          $.ajax({
              method: "POST",
              url: "admin_interface.php",
              data: {
                  action: "edit",
                  id: id,
              },
              dataType: 'json',
              success: function(data) {
                for (var i = 0; i < data.length; i++) {
                  $('#editcategoryname').val(data[i]['prod_name']);
                  $('.editor').text(data[i]['html']);
                  $('#updateCategory').data('id',data[i]['id']);
                  $('#selectcate').val(data[i]['prod_available']);
                }
              },
              error: function() {
                  alert("error");
              }
          });
    });
    // $('.cattable').on('click','#editcategory',function(){
    //     var id = $(this).data('id');
    //     var action=$(this).data('action');
    //     if(action=='edit'){
    //         $.ajax({
    //             method: "POST",
    //             url: "admin_interface.php",
    //             data: {
    //                 action: "edit",
    //                 id: id,
    //             },
    //             dataType: 'json',
    //             success: function(data) {
    //               for (var i = 0; i < data.length; i++) {
    //                 alert(data[i]['id']);
    //                 $('#categoryname').val(data[i]['prod_name']);
    //                 $('.editor').text(data[i]['html']);
    //                 $('#updateCategory').data('id',data[i]['id']);
    //               }
    //             },
    //             error: function() {
    //                 alert("error");
    //             }
    //         });
    //     }
    //   else{
    //     if (confirm("Are you sure to delete the Sub Category")) {
    //         $.ajax({
    //             method: "POST",
    //             url: "admin_interface.php",
    //             data: {
    //                 action: "delete",
    //                 id: id,
    //             },
    //             success: function(data) {
                   
    //                     window.location.reload(); 
                    
                    
    //             },
    //             error: function() {
    //                 alert("error");
    //             }
    //         });
    //     }
    //   }
    // });
$('#categoryname').focusout(function(){
  

  var categoryname=$('#categoryname').val();
  var regcategory=/^([a-zA-Z]+\s?)*([0-9]+\.?)*$/;
  if(categoryname==''){
    $('#createcategory').prop('disabled',true);
    $('#categoryname').addClass('is-invalid');
    $('#categoryfield').html('<span>enter category name</span>');
  } else if(!(categoryname.match(regcategory))) {
    $('#createcategory').prop('disabled',true);
    $('#categoryname').addClass('is-invalid');
    $('#categoryfield').html('<span>enter valid category name</span>');
  }
  else{
    $('#categoryname').removeClass('is-invalid');
    $('#createcategory').prop('disabled',false);
  }

})
    
    $('.cattable , #editform').on("click", '#updateCategory', function() {
        var categoryname = $('#editcategoryname').val();
        var link = $('.editor').val();
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