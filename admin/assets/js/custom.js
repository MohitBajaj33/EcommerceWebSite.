$(document).ready(function(){

    $('.delete_product_btn').click(function(e){
      
        var id=$(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
               $.ajax({
                method :"POST",
                url :"code.php",
                data:{
                    'product_id':id,
                    'delete_product_btn':true
                },
                success:function(response){
                  console.log(response);
                    if(response==200){
                      swal("Success!", "Product delete Successfully", "success");
                      $("#products_table").load(location.href + " #products_table");
                    }
                    else if(response==500)
                    {
                      swal("Error!", "Product delete Successfully", "error");
                    }
                }
               });
            } 
          });

    });

    $('.delete_category_btn').click(function(e){
      
      var id=$(this).val();
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
             $.ajax({
              method :"POST",
              url :"code.php",
              data:{
                  'category_id':id,
                  'delete_category_btn':true
              },
              success:function(response){
                console.log(response);
                  if(response==200){
                    swal("Success!", "Product delete Successfully", "success");
                    $("#category_table").load(location.href + " #category_table");
                  }
                  else if(response==500)
                  {
                    swal("Error!", "Product delete Successfully", "error");
                  }
              }
             });
          } 
        });

  });


});