const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close= document.getElementById('close');

if(bar){
    bar.addEventListener("click",()=>{
        nav.classList.add('active');
    })
}
if(close){
    close.addEventListener("click",()=>{
        nav.classList.remove('active');
    })
}

$(document).ready(function(e){
    $('.decrement-btn').click(function(e){
        e.preventDefault();
        var qty= $(this).closest('.product_data').find('.input-qty').val();
        var value=parseInt(qty,10);
        value =isNaN(value)? 0:value;
        if(value<10){
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.increment-btn').click(function(e){
        e.preventDefault();
        var qty= $(this).closest('.product_data').find('.input-qty').val();
        var value=parseInt(qty,10);
        value =isNaN(value)? 0:value;
        if(value<10){
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var qty= $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        
        $.ajax({
            method:"POST",
            url:"function/handlecart.php",
            data:{
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"add"
            },
            
            success:function(response){
                if(response==201){
                    alertify.success('Product added to cart');
                }
                else if(response==='existing'){
                    alertify.success('Product already in cart');
                }
                
                else if(response==401){
                    alertify.success('Login to continue');

                }
                else if(response==500){
                    alertify.success('Something went wrong');

                }
                else if(response==400){
                    alertify.success('Already added');

                }
               
               
            }

        });
       
    });

    $(document).on("click",'.updateqty',function(){
        var qty= $(this).closest('.product_data').find('.input-qty').val();
      
        var prod_id= $(this).closest('.product_data').find('.prodId').val();
       

        $.ajax({
            method:"POST",
            url:"function/handlecart.php",
            data:{
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"update"
            },
            success:function(response){
                // if(response==201){
                //     alertify.success('Product added to cart');
                // }
                

            }

        });
        
    });

    
    $(document).on("click",'.delete_cart_item',function(){
        var cart_id= $(this).val();
        
        
        $.ajax({
            method:"POST",
            url:"function/handlecart.php",
            data:{
                "cart_id":cart_id,
                "scope":"delete"
            },
            success:function(response){
                if(response==200){
                    alertify.success('Item deleted successfully');
                    $('#mycart').load(location.href + ' #mycart');
                }
                else{
                    alertify.success(response);
                }
                

            }
        });
    });

    $(document).on("click",'.delete_add_user_item',function(){
        var id= $(this).val();
        
        $.ajax({
            method:"POST",
            url:"function/handle_add_user.php",
            data:{
                "id":id,
                "scope":"delete"
            },
            success:function(response){
                if(response==200){
                    alertify.success('Item deleted successfully');
                    $('#addBox').load(location.href + ' #addBox');
                }
                else{
                    alertify.success(response);
                }
                

            }
        });
    });

});



// let uploadButton = document.querySelector(".upload_image");
// let chosenImage = document.querySelector(".choose_image");

// let filename = document.querySelector("#file-name");

// uploadButton.onchange = () => {
//     let reader = new FileReader();
//     reader.readAsDataURL(uploadButton.files[0]);
//     console.log(uploadButton.files[0]);
//     console.log("hii");
//     reader.onload = () => {
//         chosenImage.setAttribute("src", reader.result);
//     }
//     filename.textContent = uploadButton.files[0].name;
// }