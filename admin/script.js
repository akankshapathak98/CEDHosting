$(document).ready(function(){
    $('.cattable').DataTable( {
        "ajax": "admin_interface.php?getProduct=1"
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
    $('#data').on("click",'.back',function(){
        loactionlist();
    })
})