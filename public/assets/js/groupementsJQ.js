$(function () {
  //function pour choise le type paye taux fonctionnement
  $(document).on('change','input[type=radio][name="groupements[typetauxfonctionnement]"]', function(e) {
    e.stopImmediatePropagation();
    switch($(this).val()) {
        case 'paye par groupement' :
          $(".Typetauxfonctionnement").after(`<div class="droitFonctionement"><label for="groupements_droitfonctionement" class="required">Droit de fonctionement :</label><input type="text" id="groupements_droitfonctionement" name="groupements[droitfonctionement]" required="required" class="form-control" placeholder="Droit de fonctionement" data-parsley-pattern="^[0-9,]+$" data-parsley-trigger="focusin" data-parsley-required-message="Droit de fonctionement du groupement est obligatoire !!!" data-parsley-pattern-message="Vous devez saisir que des numéros"></div>`);
          break;
        case 'paye par race' :
            $(".droitFonctionement").remove();
          break;
    } 
  })
  //function pour remove input droit de fonctionnement si
  $("#successmodal").on('shown.bs.modal', function(){
    setTimeout(function(){
      if($('input[name="groupements[typetauxfonctionnement]"]:checked', '#newform').val()=="paye par race") $(".droitFonctionement").remove();
    }, 1000);

  });
 
});