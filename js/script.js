$(document).ready(function() {

	$('#create').click((e) => {

		e.preventDefault();

	 	var nom = $("#nom").val();
	 	var prenom = $("#prenom").val();
	 	var date = $("#date").val();
	 	var email = $("#email").val();
	 	var telephone = $("#telephone").val();
	 	var societe = $("#societe").val();
	 	var password = $("#password").val();
	 	var password_confirm = $("#password_confirm").val();



	 	jQuery.ajax({
	 		url : 'bdd/ajax_create.php',
	 		method: 'POST',
	 		data : {
	 			nom: nom,
	 			prenom: prenom,
	 			date: date,
	 			email: email,
	 			telephone: telephone,
	 			societe: societe,
	 			password: password,
	 			password_confirm: password_confirm
	 		},
	 		success: function(data, text, jqxhr)
	 		{
	 			if(data != "")
	 			{
	 				$('#alert').addClass("alert alert-danger alert-dismissible fade show")
	 				$('#alert').html(jqxhr.responseText);
	 			}
	 			else
	 			{
	 				nom = $("#nom").val("");
				 	prenom = $("#prenom").val("");
				 	date = $("#date").val("");
				 	email = $("#email").val("");
				 	telephone = $("#telephone").val("");
				 	societe = $("#societe").val("");
				 	password = $("#password").val("");
				 	password_confirm = $("#password_confirm").val("");
	 				toastr.success("Compte créé avec succès")
	 			}
	 		},
	 		error: function(jqxhr)
	 		{
	 			alert(jqxhr.responseText);
	 		}
		})
	 })

})