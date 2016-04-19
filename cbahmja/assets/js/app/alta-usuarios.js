$(document).ready(function(){


  $("#alta-usuarios").validate({

    rules: {
        // simple rule, converted to {required:true}
        nombre: "required",
        apellido: "required",
        email: {
              required: true,
              email: true,
              remote: {
                  url: "../Controllers/functions.php",
                  type: "post",
                  data: {
                    valor: function() {
                      return $( "#alta-usuarios #email" ).val();
                    },
                    action:"existeUser",
                    table: "tbl_usuario",
                    campo: "email"
                  }
            }
        },
        email_confirm: {
              required: true,
              email: true,
              equalTo: '#email'
        },
        password: {
              required: true,
              remote: {
                  url: "../Controllers/functions.php",
                  type: "post",
                  data: {
                    password: function() {
                      return $( "#alta-usuarios #password" ).val();
                    },
                    action:"validPass"
                  }
              }
        },
        password_confirm: {
              required: true,
              equalTo: '#password'
        }     

      },
      messages: {
            nombre:"Debe introducir su nombre",
            apellido:"Debe introducir su apellido",
            email:{
                    required: 'Debe ingresar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                    remote: "El email ya se encuentra registrado"
            },
            email_confirm:{
                    required: 'Debe confirmar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                    equalTo: 'El correo electrónico debe coincidir'
            },
            password:{
                    required: 'Debe ingresar su contraseña',
                    remote: "Password inseguro. Tiene que ser de 8 caracteres, contener  1 mayúscula y 1 caracter especial."
            },
            password_confirm:{
                    required: 'Debe confirmar su contraseña',
                    equalTo: 'La contraseña debe coincidir'
            }
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


  $("#editar-usuarios").validate({

    rules: {
        // simple rule, converted to {required:true}
        nombre: "required",
        apellido: "required",
        edad: {
          required: true,
          number: true
        },
        id_estado: "required",
        email: {
              required: true,
              email: true,
              remote: {
                  url: "../../Controllers/functions.php",
                  type: "post",
                  data: {
                    email: function() {
                      return $( "#editar-usuarios #email" ).val();
                    },
                    id: function() {
                      return $( "#editar-usuarios #id" ).val();
                    },
                    action:"existeUser",
                    table: "tbl_usuarios",
                    campo: "email"
                  }
              }
        },
        email_confirm: {
              required: true,
              email: true,
              equalTo: '#email'
        },
        password:{
              remote: {
                  url: "../../Controllers/functions.php",
                  type: "post",
                  data: {
                    password: function() {
                      return $( "#editar-usuarios #password" ).val();
                    },
                    action:"validPass"
                  }
              }
        },
        password_confirm: {
              required: {
                depends: function(element) {
                    return ($("#password").val() != '');
                }
              },
              equalTo: '#password'
        }     
      },
      messages: {
            nombre:"Debe introducir su nombre",
            apellido:"Debe introducir su apellido",
            edad:{
              required: "Debe introducir su edad",
              number: "Debe ingresar solo números"
            },
            id_estado:"Debe selccionar su estado",
            email:{
                    required: 'Debe ingresar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                    remote: 'El email ya se encuentra registrado'
            },
            email_confirm:{
                    required: 'Debe confirmar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                    equalTo: 'El correo electrónico debe coincidir'
            },
            password:{
                     remote: "Password inseguro. Tiene que ser de 8 caracteres, contener  1 mayúscula y 1 caracter especial."
            },
            password_confirm:{
                    required: 'Debe confirmar su contraseña',
                    equalTo: 'La contraseña debe coincidir'
            }
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


$('#alta-usuarios, #editar-usuarios').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }
      
  });



})