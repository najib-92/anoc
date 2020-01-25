//form load
function loadForm(target) {

  $(".modal-header").removeClass("bg-success bg-danger bg-warning").addClass(target.dataset.class)
  $(".modal-body").html('').load(target.dataset.url, {});


}

// spiner js
var opts = {
  lines: 14, // The number of lines to draw
  length: 6, // The length of each line
  width: 13, // The line thickness
  radius: 35, // The radius of the inner circle
  scale: 0.35, // Scales overall size of the spinner
  corners: 1, // Corner roundness (0..1)
  color: "#3d3838", // CSS color or array of colors '#0ab508'
  fadeColor: 'transparent', // CSS color or array of colors
  speed: 1, // Rounds per second
  rotate: 90, // The rotation offset
  animation: 'spinner-line-shrink', // The CSS animation name for the lines
  direction: 1, // 1: clockwise, -1: counterclockwise
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  className: 'spinner', // The CSS class to assign to the spinner
  top: '100%', // Top position relative to parent
  left: '49%', // Left position relative to parent
  shadow: '0 0 1px transparent', // Box-shadow for the lines
  position: 'absolute' // Element positioning
};



var spinner = "";
import {
  Spinner
} from '/assets/spin.js'

// Generic CRUD
function CrudAjax(target) {
  $.ajax({
    method: target.dataset.method,
    url: target.dataset.url,
    data: $("#genericform").serialize(),
    success: _ => (tab1.ajax.reload(), $("#successmodal").modal('toggle'))
  })

}

// IDLE Time out
function idleTimer() {
  var t;
  //window.onload = resetTimer;
  window.onmousemove = resetTimer; // catches mouse movements
  window.onmousedown = resetTimer; // catches mouse movements
  window.onclick = resetTimer; // catches mouse clicks
  window.onscroll = resetTimer; // catches scrolling
  window.onkeypress = resetTimer; //catches keyboard actions




  function resetTimer() {
    clearTimeout(t);
    t = setTimeout(reload, 400000); // time is in milliseconds (1000 is 1 second)
  }
}

function reload() {
  window.location.href = $("#fucklogout").attr("href")
}

$(function () {
  idleTimer();




  //$("#successmodal > div > div > div.modal-header > h5").text($("#wrapper > div.content-wrapper > div > div:nth-child(3) > div > div > div.card-header").text())
  $(document).ajaxStart(function (d, xhr, o) {
    spinner = new Spinner(opts).spin($(".modal-body")[0]);
  });

  $(document).ajaxError((d, xhr, o) => {

    console.log(xhr);

  })
  /*window.addEventListener('beforeunload', function (e) {
      e.preventDefault();
      e.returnValue = '';
  });*/
  /*$(window).bind('beforeunload', function(){
    $.ajax({
      url:$("#wrapper > div.content-wrapper > div > a").attr("href"),
      method: "GET"
    })
  });*//*
  window.onbeforeunload = e => {
    if (performance.navigation.type > 2)
      $.ajax({
        url: $("#fucklogout").attr("href"),
        method: "GET",
        async: false
      })

  }*/
  //datatable  module
   var dt= $('#datatable').DataTable( {
     lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "tous"] ],
     order:[[0, 'asc']],
     language: {
       url: "/assets/js/fr_FR.json"
     },
     "scrollY": 250,
     "scrollCollapse": true,
     "scrollX": true,
     "sScrollXInner": "100%",
     //processing: true,
     serverSide: true,
     ajax: {
       url: 'datatable',
       type: 'POST',
       data :{
         _init: true,
        // keys :(c = $("[data-field]").toArray(),d=new Object(),c.forEach((e,i,a) => d[e.dataset.name]=e.dataset.field),d),
        // datatableName:$("#datatable").attr("name")
       }
      },
     /*columnDefs :[{
       data : null,
       orderable:false,
       targets:[$("#datatable >thead >tr>th").length -1],
       render:(d, t, r, m)=> t == "display"? `<button type="button" data-target="#successmodal" data-toggle="modal" data-class="bg-danger" onclick="loadForm(this)" data-url="${d[0]}" data-method="DELETE" data-prepare="1" class="btn btn-danger btn-round waves-effect waves-light m-1 loadform">Supprimer</button><button data-class="bg-warning" data-url="${d[0]}/edit" onclick="loadForm(this)" data-method="POST" class="btn btn-warning btn-round waves-effect waves-light m-1 loadform" data-target="#successmodal" data-toggle="modal" data-target="#successmodal">Modifier</button>`:null
     }]*/
     /*"initComplete": function(settings, json) {
       $("#datatable_wrapper > div:nth-child(1) > div:nth-child(2)").append('<div id="datatable_filter" class="dataTables_filter"><label>Rechercher&nbsp;:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div>')
     }*/
   });
   /*Methode pour datatable*/
  /*$('input[type=search]').keydown(function(e) {
    console.log( e );
    console.log( $('input[type=search]').val() + e.originalEvent.key) ;
    $('#datatable').DataTable().ajax.reload( null, false );
  });
  $.ajaxPrefilter((options, originalOptions, jqXHR)=> {
    if(options.url =="datatable")
      options.data +=`&name=${$("#typeeleveur").val()}`;
    options.data +=`&groupement=${$("#typegroupements").val()}`;
  });*/
  /*  ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

  //function pour ajouter button modiifier et supprimer
  $(".dataTables_info").after(`<div style="float: right;"><button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button></div>`);
  //function pour select row for edit or delete
  $('table>tbody').on('click', 'tr', function () {
    $("table>tbody>tr").removeClass("selected");
    $(this).toggleClass('selected');
  });
  $(document).ajaxComplete(() => {
    $('.keyboard').keyboard();
    /*$("input.keyboard[type='text']").focus((e)=>{
        $("input.keyboard[type='text']").removeClass("arkey");
        $(e.currentTarget).addClass("arkey");
      
  
    })*/
  })

  //Default data table
  //$('#table').DataTable();

  /*var table = $('#table').DataTable({
    "language":{
      "url":"../assets/plugins/bootstrap-datatable/lang/fr_FR.json"
     },
    lengthChange: true,
    buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],    
    initComplete: function () {
      setTimeout( function () {
        table.buttons().container().appendTo( '#table_wrapper .col-md-6:eq(0)' );
      }, 10 );
    } 
  });*/

  //pour load le model-body pour ajouter
  //$("#add").click(_=>{ Ajouter une nouvelle commune
  $("body").on("click", '#btnModalAdd', _ => {
    //pour modiifer model-content and model-header and model-title 
    $(".modal-body").html("");
    $(".modal-content").removeClass().addClass("modal-content border-success");
    $(".modal-header").removeClass().addClass("modal-header bg-success");
    $(".modal-title").html($(".modal-title").data("titleadd"));
    $(".modal-body").load('new', {}, _ => $('#newform').parsley());
  });
  //pour load le model-body pour modifier
  //$(".edit").click(t=>{
  $("body").on("click", '.btnModalEdit', t => {
    if ($("tr.selected").find("td:eq(0)").html() == undefined) {
      alert("Select une ligne à modifer !!!");
      return false;
    }
    //pour modiifer model-content and model-header and model-title
    $(".modal-body").html("");
    $(".modal-content").removeClass().addClass("modal-content border-warning");
    $(".modal-header").removeClass().addClass("modal-header bg-warning");
    $(".modal-title").html($(".modal-title").data("titleedit"));
    //e =$(t.target).parent().parent();
    //$(".modal-body").load(`${$(e).find('td:eq(0)').html()}/edit`);
    $(".modal-body").load(`${$("tr.selected").find("td:eq(0)").html()}/edit`);
  });
  //pour load le model-body pour Supprimer
  //$(".edit").click(t=>{
  $("body").on("click", '.btnModalDelete', t => {
    if ($("tr.selected").find("td:eq(0)").html() == undefined) {
      alert("Select une ligne à supprimer !!!");
      return false;
    }
    //pour modiifer model-content and model-header and model-title
    $(".modal-body").html("");
    $(".modal-content").removeClass().addClass("modal-content border-danger");
    $(".modal-header").removeClass().addClass("modal-header bg-danger");
    $(".modal-title").html("Vous étes sûr de vouloir supprimer ?");
    //e =$(t.target).parent().parent();
    //$(".modal-body").load(`${$(e).find('td:eq(0)').html()}/delete`);
    $(".modal-body").load(`${$("tr.selected").find("td:eq(0)").html()}/delete`);
  });
  //pour faire le CRUD (delete)
  //$("#btnDelete").click(t=>{
  $("body").on("click", '#btnDelete', t => {
    $('#successmodal').modal('toggle');
    $.ajax({
      method: "DELETE",
      url: $("#deleteForm").attr('action'),
      data: $('#deleteForm').serialize(),
    }).done(function (data, status, xhr) {
      var $data = JSON.parse(data);
      if ($data.code === 1 && status === "success" && xhr.status === 200) {
         $('#datatable').DataTable().ajax.reload( null, false ); 
        afficherAlertsAndColse("alert-success", "Success!", $data.message);
      }
      if ($data.code === 2 && status === "success" && xhr.status === 200) {
        afficherAlertsAndColse("alert-danger", "Danger!", $data.message);
      }
    }).fail(function () {
      alert("error");
    }).always(function () {
      //alert( "complete" );
    });
  });

  //pour faire le CRUD (add and edit)
  $("body").on("click", '#btnAddEdit', _ => {
    $('#newform').parsley().validate();
    if ($('#newform').parsley().isValid()) {

      $('#successmodal').modal('toggle');
      var formData = new FormData($('#newform')[0]);
      $.ajax({
        method: "POST",
        url: $("#newform").attr('nam'),
        //data: $('#newform').serialize(),
        data: formData,
        processData: false,
        contentType: false,
      }).done(function (data, status, xhr) {
        var $data = JSON.parse(data);
        if ($data.code === 1 && status === "success" && xhr.status === 200) {
            $('#datatable').DataTable().ajax.reload( null, false );
            afficherAlertsAndColse("alert-success", "Success!", $data.message);
        }
        if ($data.code === 2 && status === "success" && xhr.status === 200) {
          afficherAlertsAndColse("alert-danger", "Danger!", $data.message);
        }
      }).fail(function () {
        alert("error");
      }).always(function () {
        //alert( "complete" );
      });
    }
  });

  //function pour afficher les aletrs and colse apres 2 seconde si utilisateur il fermé pas
  let afficherAlertsAndColse = (typeAlert, typeMessage, message) => {
    $(".alerts").empty();
    $(".alerts").append(alerts(typeAlert, typeMessage, message));
    setTimeout(() => {
      $(".alerts").empty();
    }, 10000);
  }
  //function pour Créer des alerts
  let alerts = (typeAlert, typeMessage, message) =>
    `<div class="alert ${typeAlert} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon">
                  <i class="fa fa-check"></i>
                </div>
                <div class="alert-message">
                  <span><strong>${typeMessage}</strong> ${message}</span>
                </div>
              </div>`;
  //function pour verifier file extension and size
  var app = app || {};

  // Utils
  (function ($, app) {
    'use strict';

    app.utils = {};

    app.utils.formDataSuppoerted = (function () {
      return !!('FormData' in window);
    }());

  }(jQuery, app));

  // Parsley validators
  (function ($, app) {
    'use strict';

    window.Parsley
      .addValidator('filemaxmegabytes', {
        requirementType: 'string',
        validateString: function (value, requirement, parsleyInstance) {

          if (!app.utils.formDataSuppoerted) {
            return true;
          }

          var file = parsleyInstance.$element[0].files;
          var maxBytes = requirement * 1048576;

          if (file.length == 0) {
            return true;
          }

          return file.length === 1 && file[0].size <= maxBytes;

        },
        messages: {
          en: 'Ce fichier est plus grand que 5 MB'
        }
      })
      .addValidator('filemimetypes', {
        requirementType: 'string',
        validateString: function (value, requirement, parsleyInstance) {

          if (!app.utils.formDataSuppoerted) {
            return true;
          }

          var file = parsleyInstance.$element[0].files;

          if (file.length == 0) {
            return true;
          }

          var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
          return allowedMimeTypes.indexOf(file[0].type) !== -1;

        },
        messages: {
          en: 'L\'extension ne correspond pas au requis'
        }
      });

  }(jQuery, app));




});