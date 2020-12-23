$(document).ready(function(){
	var img = document.getElementsByClassName('slide-img');
	var index=0;
	var auto = setInterval(function(){$("#btn-next").click()},3000);
	var x = img.length;
	show(index);
	$("#btn-next").click(function next(){
		index++;
		if(index > x-1){
			index = 0;
		}
		show(index);
	});
	$("#btn-prev").click(function prev(){
		index--;
		if(index < 0){
			index= 0;
		}
		show(index);
	});
	function show(index){
		img[0].style.display = 'none';
		img[1].style.display = 'none';
		img[2].style.display = 'none';
		img[index].style.display = 'block';
	}
	$("#login").click(function LoginForm(){
		$("#FormLogin").css("display","block");
		$("#FormRegister").css("display","none");
	})
	$("#register").click(function LoginForm(){
		$("#form").css("display","none");
		$("#FormRegister").css("display","block");
	})
	/*--------------------------------------------*/
	var listCart = {
		"productName":"",
		"price":"",
		"quantity":""
	}
	$("#add-cart").click(function cart(){
		alert("abc")
		listCart["productName"] = $("#product_name").text();
		listCart["price"] = $("#price").text();
		listCart["quantity"] = $("#quantity").val();
		localStorage.setItem('test', JSON.stringify(listCart));
		console.log(listCart);
	})
	
});


