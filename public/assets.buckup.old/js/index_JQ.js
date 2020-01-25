//form load
function loadForm(target) {

  $(".modal-header").removeClass("bg-success bg-danger bg-warning").addClass(target.dataset.class)
  $(".modal-body").html('').load(target.dataset.url,{});


}

function CrudAjax(target){
  $.ajax(
      {
        method : target.dataset.method,
        url:target.dataset.url,
        data :$("#genericform").serialize(),
        success : _=> (  tab1.ajax.reload() ,$("#successmodal").modal('toggle'))
      }
  )

}


$(function () {

  $("#successmodal > div > div > div.modal-header > h5").text($("#wrapper > div.content-wrapper > div > div:nth-child(3) > div > div > div.card-header").text())

  //datatable  module
  tab1= $('#datatable').DataTable( {
    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "tous"] ],
    order:[[0, 'asc']],
    language: {
      url: "/assets/js/fr_FR.json"
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: '/datatable',
      type: 'POST',
      data :{
        _init: true,
        keys :(c = $("[data-field]").toArray(),d=new Object(),c.forEach((e,i,a) => d[e.dataset.name]=e.dataset.field),d),
        datatableName:$("#datatable").attr("name")
      }},
    columnDefs :[{
      data : null,
      orderable:false,
      targets:[$("#datatable >thead >tr>th").length -1],
      render:(d, t, r, m)=> t == "display"? `<button type="button" data-target="#successmodal" data-toggle="modal" data-class="bg-danger" onclick="loadForm(this)" data-url="${d[0]}" data-method="DELETE" data-prepare="1" class="btn btn-danger btn-round waves-effect waves-light m-1 loadform">Supprimer</button><button data-class="bg-warning" data-url="${d[0]}/edit" onclick="loadForm(this)" data-method="POST" class="btn btn-warning btn-round waves-effect waves-light m-1 loadform" data-target="#successmodal" data-toggle="modal" data-target="#successmodal">Modifier</button>`:null
    }]
  });





});