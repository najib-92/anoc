$(function(){
    $('.model_ajouter_etudiant').on('click',function () {
        $("form")[0].reset();
        $('#exampleModalLabel').html('Ajouter un Etudiant');
        $('div.modal-footer > button[type=submit]').html('Ajouter');
        $('#fromModel > div > div > div.modal-body > form').attr('action','http://localhost:8080/Cours_TP_3_MVC/public/Etudiant/ajouter');

    });
    $('.model_modifier_etudiant').on('click',function () {
        $("form")[0].reset();
        $('#exampleModalLabel').html('Modifier un Etudiant');
        $('div.modal-footer > button[type=submit]').html('Modifier');
        $('#fromModel > div > div > div.modal-body > form').attr('action','http://localhost:8080/Cours_TP_3_MVC/public/Etudiant/modifier');
        const id_Etu=$(this).data('id');
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/Cours_TP_3_MVC/public/Etudiant/get_modifier",
            data: {id_Etu:id_Etu},
            dataType: "json",
		}).done(function(data) {
            $('#id').val(data[0]);
            $('#nom').val(data[1]);
            $('#tel').val(data[2]);
            $('#email').val(data[3]);
            $('#emploi').val(data[4]);
		}).fail(function() {
			console.log("error");
		});
    });
    
});