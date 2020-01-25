$(function () {
  //function pour choise le type eleveurs
  $.ajaxPrefilter((options, originalOptions, jqXHR)=> {
    if(options.url =="datatable")
      options.data +=`&name=${$("#typeeleveur").val()}`;
      options.data +=`&groupement=${$("#typegroupements").val()}`;
  });
  //reload datatable pour voir une autre type eleveurs
  $( "#typeeleveur, #typegroupements" ).change( _=> {
    $('#datatable').DataTable().ajax.reload( null, false );
  });
})