      $('document').ready(function(){
        $('#form').validate(
        { 
          //Правила
          rules:{
            "name":{ required:true, maxlength:40, minlength:2 },
            "email":{ required:true, email:true }
          },
          //Текста предупреждений
          messages:{
            "name":{ required:"Обязательное поле!", 
            maxlength: "Максимальное количество символов 40 единиц!", minlength: "Минимальное количество символов 2" },
            "email":{ required:"Обязательное поле!", email: "Введите действительный e-mail" }
          },
          //Обработчик и отправка данных
          submitHandler: function(form){
            $(form).ajaxSubmit({
              target: '#result', 
              success: function() { 
                $('#FormBox').slideUp('fast'); 
              } 
            }); 
          }
        })
      $('#form-contact').validate(
        { 
          //Правила
          rules:{
            "name":{ required:true, maxlength:40, minlength:2 },
            "email":{ required:true, email:true }
          },
          //Текста предупреждений
          messages:{
            "name":{ required:"Обязательное поле!", 
            maxlength: "Максимальное количество символов 40 единиц!", minlength: "Минимальное количество символов 2" },
            "email":{ required:"Обязательное поле!", email: "Введите действительный e-mail" }
          },
          //Обработчик и отправка данных
          submitHandler: function(form){
            $(form).ajaxSubmit({
              target: '#result2', 
              success: function() { 
                $('#FormBox2').slideUp('fast'); 
              } 
            }); 
          }
        })
      });