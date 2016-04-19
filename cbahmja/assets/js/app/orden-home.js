$(document).ready(function(){

  $("#orden-home").validate({

    rules: {
        // simple rule, converted to {required:true}
        tipo_orden: "required",
        tipo: "required",
        blog:  {
          required: true,
          depends: function(element){

              if ($('#tipo_orden').val() == 3 && $('#blog').val() == '')
                return true;
          } 
        },
        "blog[0]":  {
          required: true,
          depends: function(element){

              if ($('#tipo_orden').val() == 4 && $('#blog_1').val() == '' )
                return true;
          } 
        },
        "blog[1]":  {
          required: true,
          depends: function(element){

              if ($('#tipo_orden').val() == 4 && $('#blog_2').val() == '' )
                return true;
          } 
        },
        "blog[2]":  {
          required: true,
          depends: function(element){

              if ($('#tipo_orden').val() == 4 && $('#blog_3').val() == '' )
                return true;
          } 
        },
        "blog[3]":  {
          required: true,
          depends: function(element){

              if ($('#tipo_orden').val() == 4 && $('#blog_4').val() == '' )
                return true;
          } 
        },
        "blog[4]":  {
          required: true,
          depends: function(element){

              if ($('#tipo_orden').val() == 4 && $('#blog_5').val() == '' )
                return true;
          } 
        },
        "blog[5]":  {
          required: true,
          depends: function(element){

              if ($('#tipo_orden').val() == 4 && $('#blog_6').val() == '' )
                return true;
          } 
        }


      },
      groups: {
        blogs: "blog[0] blog[1] blog[2] blog[3] blog[4] blog[5]"
      },
      messages: {
            tipo_orden:"Debe seleccionar un tipo de ordenamiento",
            tipo:"Debe especificar un orden",
            blog: {
              required: "Debe especificar un blog"
            },
            "blog[0]": {
              required: "Debe especificar los 6 blogs"
            },
            "blog[1]": {
              required: "Debe especificar los 6 blogs"
            },
            "blog[2]": {
              required: "Debe especificar los 6 blogs"
            },
            "blog[3]": {
              required: "Debe especificar los 6 blogs"
            },
            "blog[4]": {
              required: "Debe especificar los 6 blogs"
            },
            "blog[5]": {
              required: "Debe especificar los 6 blogs"
            }
      },
      errorPlacement: function(error, element) {
        if (element.attr('name')=='tipo_orden' || element.attr('name')=='tipo')
          error.appendTo(element.parent().parent());
        else
          error.appendTo(element.parent());
      }
      


});

$('#orden-home').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }
  });



})