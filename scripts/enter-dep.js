
document.addEventListener("DOMContentLoaded", function(){
    let form = document.querySelector("#select-dep-form");
    let popup = document.querySelectorAll('.pop-content')
    // document.getElementById("select_dep").addEventListener('change', (event) => {
    //     console.log('event.target.value')
    //   });
      function start(){
        document.getElementById("select_dep").addEventListener("change", addActivityItem, false);
        }
  
  function addActivityItem(){
        //option is selected
        alert("yeah");
  }
    form.addEventListener('submit', formSend);

    async function formSend(e){
        e.preventDefault();

        let error = formValidate(form);
        
        let formData = new FormData(form);
        console.log(formData);
        if(error === 0){
            for(let p = 0; p < popup.length; p++){
                popup[p].classList.add('_sending');
            };
            
            let response = await fetch('/php/check-reg.php', {
                method: 'POST',
                body: formData
            });
            if(response.ok){
                
                console.log("Send");
                let result = await response.text();
                console.log(result);
                for(let p = 0; p < popup.length; p++){
                    popup[p].classList.remove('_sending');
                }
                if(result == 'none'){
                    document.getElementById('login').classList.add('_error');
                    document.getElementById('loginspan').innerHTML='Логин занят';
                }else{
                    form.reset();
                    window.location.reload();
                }
            }else{
                alert("Произошла ошибка при регистрации(");
                for(let p = 0; p < popup.length; p++){
                    popup[p].classList.remove('_sending');
                }
            }
            
        }else{
            
        }
    }



    function formValidate(form){
        let error = 0;
        let formReq = document.querySelectorAll("._req");

        for(let i = 0; i < formReq.length; i++){
            const input = formReq[i];
            formRemoveError(input);

            if(input.classList.contains('email')){
                if(emailTest(input)){
                    formAddError(input);
                    error++;
                    document.getElementById('emailspan').innerHTML='Введите корректный E-mail';
                }
            
            }else if(input.classList.contains('secondname')){
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('secondnamespan').innerHTML='Введите фамилию';
                }
            
            }else if(input.classList.contains('firstname')){
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('firstnamespan').innerHTML='Введите Имя';
                }
            
            }else if(input.classList.contains('login')){
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('loginspan').innerHTML='Введите логин';
                }else if(input.value.length < 4 && input.value.length > 0){
                    formAddError(input);
                    error++;
                    document.getElementById('loginspan').innerHTML='Логин должен содержать не менее 4 символов';
                }
            
            }else if(input.classList.contains('password')){
             
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('passwordspan').innerHTML='Введите пароль';
                }else if(input.value.length < 8 && input.value.length > 0){
                    formAddError(input);
                    error++;
                    document.getElementById('passwordspan').innerHTML='Пароль должен содержать не менее 8 символов';
                }
            
            }else if(input.classList.contains('repeat-password')){
                let pas = document.getElementById('password').value;
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('repeat-passwordspan').innerHTML='Повторите пароль';
                }else if(input.value != pas){
                    formAddError(input);
                    error++;
                    document.getElementById('repeat-passwordspan').innerHTML='Пароль не совпадают';
                }
            
            }else if(input.getAttribute("type") === "checkbox" && input.checked === false){
                formAddError(input);
                    error++;
            }else{
                if(input.value == ""){
                    formAddError(input);
                    error++;
                }
            }
        }
        return error;
    }
    



    let formAuth = document.querySelector(".form-auth");
    // let popup = document.querySelectorAll('.pop-content');
    formAuth.addEventListener('submit', formAuthSend);

    async function formAuthSend(e){
        e.preventDefault();
        console.log('ghdfds');
        let error = formAuthValidate(formAuth);
        
        let formData = new FormData(formAuth);

        if(error === 0){
            for(let p = 0; p < popup.length; p++){
                popup[p].classList.add('_sending');
            };

            let response = await fetch('/php/check-auth.php', {
                method: 'POST',
                body: formData
            });
            if(response.ok){
                form.reset();
                console.log("Send");
                let result = await response.text();
                console.log(result);
                for(let p = 0; p < popup.length; p++){
                    popup[p].classList.remove('_sending');
                }
                if(result == 'none'){
                    document.getElementById('loginAuthspan').innerHTML='';
                    document.getElementById('passwordAuthspan').innerHTML='';
                    document.querySelectorAll("._auth").forEach(el => {
                        el.classList.add('_error');
                    });
                  
                    document.getElementById('Authspan').innerHTML='Неверный логин или пароль';
                }else{
                    window.location.reload();
                }
                
            }else{
                console.log("Произошла ошибка при регистрации(");
                popup[p].classList.remove('_sending');
            }
            
        }else{
            
        }
    }



    function formAuthValidate(formAuth){
        let error = 0;
        let formAuthReq = document.querySelectorAll("._auth");

        for(let i = 0; i < formAuthReq.length; i++){
            const input = formAuthReq[i];
            formRemoveError(input);

             if(input.classList.contains('login')){
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('loginAuthspan').innerHTML='Введите логин';
                }
            
            }else if(input.classList.contains('password')){
             
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('passwordAuthspan').innerHTML='Введите пароль';
                }
            
            }
        }        
        return error;
    }

    let formApp = document.querySelector(".send-form");
    // let popup = document.querySelectorAll('.pop-content');
    formApp.addEventListener('submit', formAppSend);

    async function formAppSend(e){
        e.preventDefault();
        console.log('ghdfds');
        let error = formSendValidate(formApp);
        
        let formData = new FormData(formApp);

        if(error === 0){
            for(let p = 0; p < popup.length; p++){
                popup[p].classList.add('_sending');
            };

            let response = await fetch('/php/check-send.php', {
                method: 'POST',
                body: formData
            });
            if(response.ok){
                form.reset();
                console.log("Send");
                let result = await response.text();
                console.log(result);
                for(let p = 0; p < popup.length; p++){
                    popup[p].classList.remove('_sending');
                }
                
                    window.location.reload();
                
                
            }else{
                console.log("Произошла ошибка при регистрации(");
                popup[p].classList.remove('_sending');
            }
            
        }else{
            
        }
    }



    function formSendValidate(formApp){
        let error = 0;
        let formAppReq = document.querySelectorAll("._app");

        for(let i = 0; i < formAppReq.length; i++){
            const input = formAppReq[i];
            formRemoveError(input);

             if(input.classList.contains('title')){
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('titlespan').innerHTML='Введите Название';
                }else if(input.value.length < 6){
                    formAddError(input);
                    error++;
                    document.getElementById('titlespan').innerHTML='Название должно содержать не менее 6 символов';
                }
            
            }else if(input.classList.contains('textarea')){
             
                if(input.value.length == 0){
                    formAddError(input);
                    error++;
                    document.getElementById('textareaspan').innerHTML='Введите Описание';
                }else if(input.value.length < 16){
                    formAddError(input);
                    error++;
                    document.getElementById('textareaspan').innerHTML='Описание должно содержать не менее 16 символов';
                }
            
            }
        }        
        return error;
    }

    function formAddError(input){
        input.parentElement.classList.add('_error');
        input.classList.add('_error');
    }
    function formRemoveError(input){
        input.parentElement.classList.remove('_error');
        input.classList.remove('_error');
    }
    function emailTest(input){
        return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
    }

})



