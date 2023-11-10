


$(document).ready(function(){


//for increment 

	// $('.increment-btn').click(function(e){

	$(document).on("click", ".increment-btn",function(e){
		e.preventDefault();

		// var qty = $('.input-qty').val();
		var qty = $(this).closest('.product_data').find('.input-qty').val();

		var value = parseInt(qty, 10);
		value = isNaN(value) ? 0 : value;

		if(value  < 10){

			value++;
			// $('.input-qty').val(value);
			$(this).closest('.product_data').find('.input-qty').val(value);

		}

	});


//for decrement 
	// $('.decrement-btn').click(function(e){

	 $(document).on("click", ".decrement-btn",function(e){
		e.preventDefault();

		// var qty = $('.input-qty').val();
		var qty = $(this).closest('.product_data').find('.input-qty').val();

		var value = parseInt(qty, 10);
		value = isNaN(value) ? 0 : value;

		if(value > 1){

			value--;
			// $('.input-qty').val(value);
			$(this).closest('.product_data').find('.input-qty').val(value);

		}

	});

	// $('.addToCartBtn').click(function(e){
	 
	 $(document).on("click", ".addToCartBtn",function(e){

		e.preventDefault();

		var qty = $(this).closest('.product_data').find('.input-qty').val();

		var prod_id = $(this).val();

		$.ajax({

			method: "POST",
			url: "functions/handleCart.php", 
			data: {
				"prod_id" : prod_id,
				"prod_qty" : qty,
				"scope": "add"

			},
			
			success: function(response){
				if(response==201){
					alertify.success("Product added to cart!");

				}

				else if(response=="existing"){
					alertify.success("product already in cart");
				}

				else if(response==401){
					alertify.success("Login to continue");
				}

				else if(response==500){
					alertify.success("something went wrong!");
				}
		    
		     }


		});

	});

//update Product Quantity
	$(document).on("click", ".updateQty",function(){

		var qty = $(this).closest('.product_data').find('.input-qty').val();
		var prod_id = $(this).closest('.product_data').find('.prodId').val();

		$.ajax({
			method: "POST",
			url: "functions/handleCart.php", 
			data: {
				"prod_id" : prod_id,
				"prod_qty" : qty,
				"scope": "update"
			},

			success: function(response){
				
			}
		});
	});

//Remove Product From Cart
	$(document).on("click", ".deleteItem",function(){
		var cart_id = $(this).val();
		

		$.ajax({
			method: "POST",
			url: "functions/handleCart.php", 
			data: {
				"cart_id" : cart_id,
				"scope": "delete"
			},

			success: function(response){
				if(response==200){
					alertify.success("Product Deleted Successfully!");
					$("#mycart").load(location.href + " #mycart");
				}else{
					alertify.success(response);
				}
			}
		});

	})
});