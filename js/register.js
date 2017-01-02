$(document).ready(function(){

	var firstname = $("#name");

	firstname.blur(checkName);

	

	/*var lastname = 	$("#lastName");

	lastname.keyup(checkName);*/

	

	var email = $("#email");

	email.blur(checkEmail);

	

	var pwd = $("#password");

	pwd.blur(checkPwd);

	

	
	

	

	var letter = /^[a-zA-Z. ]+$/;

	var number = /^[0-9]+$/;

	var letternumber = /^[a-zA-Z0-9. ]+$/;

	

	function checkName()

	{		

		if(firstname.val()=="")

		{

			$("#msg").html("<font color='red'>please enter your name</font>");

			firstname.addClass("invalid");

			return false;

		}

		else

		{

			if(!firstname.val().match(letter))

			{

				$("#msg").html("<font color='red'>please enter valid name</font>");

				firstname.addClass("invalid");

				return false;

			}

			else

			{

				$("#msg").html("<font color='green'>ok</font>");

				firstname.removeClass("invalid");

				firstname.addClass("valid");

				return true;

			}

		}

	}

	

	function checkEmail()

	{

		if(email.val()=="")

		{

			$("#msg").html("<font color='red'>please enter your email</font>");

			email.addClass("invalid");

			return false;

		}

		else

		{

			var x=email.val();

			var atpos=x.indexOf("@");

			var dotpos=x.lastIndexOf(".");

			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)

			{

				$("#msg").html("<font color='red'>please enter valid email</font>");

				email.addClass("invalid");

			  return false;

			}

			else

			{

				$("#msg").html("<font color='green'>ok</font>");

				email.removeClass("invalid");

				email.addClass("valid");

				return true;

			}

		}	

	}

	var flag=0;

	email.blur(function(){

		var str="email="+email.val();

		

		$.ajax({

			type:"POST",

			url:"ajax/unique-email.php",

			data:str,

			success:function(response)

			{

				if(response==1)

				{

					$("#msg").html("<font color='green'>ok</font>");

					email.addClass("valid");

					flag=1;

				}

				else

				{

					$("#msg").html(response);

					email.removeClass("valid");

					email.addClass("invalid");

					flag=2;

				}

			}

		});

	});

function checkPwd()

	{

		if(pwd.val()=="")

		{

			$("#msg").html("<font color='red'>please enter password</font>");

			pwd.addClass("invalid");

			return false;

		}

		else

		{

			
			if (pwd.val()< 5) 

			{ 

				$("#msg").html("<font color='red'>password must contain atleast 5 characters.</font>");

				pwd.addClass("invalid");

				return false;

			}

			else

			{

				$("#msg").html("<font color='green'>ok</font>");

				pwd.removeClass("invalid");

				pwd.addClass("valid");

				return true;

			}

		}

	

	}
	

	function checkAddress()

	{

		if(address.val()=="")

		{

			$("#msg").html("<font color='red'>please enter address</font>");

			address.addClass("invalid");

			return false;

		}

		else

		{

			if(address.val().length<4)

			{

				$("#msg").html("<font color='red'>please enter address</font>");

				address.addClass("invalid");

				return false;

			}

			else

			{

				$("#msg").html("<font color='green'>ok</font>");

				address.removeClass("invalid");

				address.addClass("valid");

				return true;

			}

		}

	}

	

	

	email.blur(unique);

	function unique()

	{

		if(flag==1)

		{

			$("#msg").html("<font color='green'>ok</font>");

			email.removeClass("invalid");

			email.addclass("valid");

			return true;

		}

		else if(flag==2)

		{

			$("#msg").html("<font color='red'>email already exists</font>");

			email.removeClass("valid");

			email.addClass("invalid");

			return false;

		}

	}

	$("#register").submit(function(){

		if(checkName() && checkEmail() && checkPwd()  && unique())

		{

		}

		else

		{

			return false;

		}

	});

	

});