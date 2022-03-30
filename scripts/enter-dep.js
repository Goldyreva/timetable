
// var btn = document.getElementById('nextAddTable');
// var select = document.getElementById('select_dep');
// var hidden_id = document.getElementById('dep_id_add_table');
// var getValue;
// btn.addEventListener('click', function(){  
//     getValue = select.value;
//     console.log( getValue );
//     console.log("gfdusi" );
//     hidden_id.value = getValue;

// });
// document.addEventListener("DOMContentLoaded", function(){
//     let form = document.querySelector("#addTableForm");
//     form.addEventListener('submit', formSend);
//     async function formSend(e){
//         e.preventDefault();
//         let formData = new FormData(form);
//         formData.append('excel', formFile.files[0]);
//         let response = await fetch('/php/excel-add.php',{
//             method: 'POST',
//             body: formData
//         });
//         if(response.ok){
//             let result = await response.json();
//             console.log(result.message);
//         }else{
//             console.log('ERROR');
//         }
//     }

//     const formFile = document.getElementById('excelFile');
//     formFile.addEventListener('change', function(){
//         uploadFile(formFile.files[0]);
//     })
// });
