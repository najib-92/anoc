
var db;
var request;
if (window.indexedDB){
	request = indexedDB.open("login");
	request.onsuccess = function(event) {
		db = event.target.result;
	};
}


$(document).ready(function(){
	Cookies.set("attempt", $("#attempt").val() );
	$( "form" ).submit(function( event ) {
		let seesion;
		let local;
		var indexdb =true;
		let e;
		if(e =!$("#mac").val() && (!Cookies.get("mac") || !Cookies.get("buckup"))){
			if((seesion = window.sessionStorage.getItem("mac")))
				return Cookies.set("buckup",seesion,{sameSite:"lax"});
			if((local = window.localStorage.getItem("mac")  ))
				return Cookies.set("buckup",local,{sameSite:"lax"});
			if(window.indexedDB) {
				indexdb = false;
				try{
					db.transaction("Adress").objectStore("Adress").getAll().onsuccess = function (event) {
						  if(event.target.result[0].mac !="")
						     return Cookies.set("buckup", event.target.result[0].mac,{sameSite:"lax"});
						indexdb=true;
					};

				} catch (exception) {
					Cookies.set("tmp",event.currentTarget[2].value,{sameSite: "lax"})
				}
			}
		}
         Cookies.set("tmp",event.currentTarget[2].value,{sameSite: "lax"});
	});

	//db.transaction("Adress").objectStore("Adress").getAll().onsuccess=function(event){alert(event.target.result[0].mac)};
	//sessionStorage.clear();
	//document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });

		/*Animation loading */		
	/*	const loader = document.querySelector('#L7');
		const main = document.querySelector('.limiter');
		let init = _ => {
			setTimeout(() => {
				loader.style.opacity = 0;
				loader.style.display = 'none';
				main.style.display = 'block';
				setTimeout(() => (main.style.opacity = 1), 50);
			}, 2000);
		}
		init();*/

    /*[ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            showPass = 0;
        }
        
		});
		/*Animation logo */
		$('.js-tilt').tilt({
			scale: 1.1
		})
	/*$(".btn").click(function() {

	if($("input[name='email']").val()=='' || $("input[name='password']").val()==''){
		alert("Il Faut Remplire les Champs !!!");
		return false;
	}
		$.ajax({
			url: "login_register.php",
			type: "POST",
			dataType: "text",
			data: { email: $("input[name='email']").val(), password : $("input[name='password']").val() },
		})
		.done(function(data) {
			if(data==1)
     				window.location="../index.php";
     		else{
     			$('body > div > div > div > form > div.alert.alert-danger.alert-dismissible').remove();
     			$('body > div > div > div > form > div.container-login100-form-btn')
     			.after('<div class="alert alert-danger alert-dismissible" style="margin-top: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Avertissement! </strong> Email ou mot de passe est faux. </div></div>');
     		}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});		
	});*/
});