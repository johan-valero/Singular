// function imagePreview(fileInput) {
//     if (fileInput.files && fileInput.files[0]) {
//         if(fileInput.name == 'image'){
//             var fileReader = new FileReader();
//             fileReader.onload = function (event) {
//                 $('#preview').html('<img src="'+event.target.result+'" width="150px" height="150px"/>');
//                 $('#btn-preview').html('<a class="btn-custom btn-primary-custom" onclick="reset_img(event)">Supprimer</a>');
//                 if(resetFile()){

//                 }
//             };
//             fileReader.readAsDataURL(fileInput.files[0]);
//         }
//         if(fileInput.name == 'image2'){
//             var fileReader = new FileReader();
//             fileReader.onload = function (event) {
//                 $('#preview2').html('<img src="'+event.target.result+'" width="150px" height="150px"/>');
//                 $('#btn-preview2').html('<a class="btn-custom btn-primary-custom" onclick="reset_img(event)">Supprimer</a>');
//             };
//             fileReader.readAsDataURL(fileInput.files[0]);
//         }
//         if(fileInput.name == 'image3'){
//             var fileReader = new FileReader();
//             fileReader.onload = function (event) {
//                 $('#preview3').html('<img src="'+event.target.result+'" width="150px" height="150px"/>');
//                 $('#btn-preview3').html('<a class="btn-custom btn-primary-custom" onclick="resetFile()">Supprimer</a>');
//             };
//             fileReader.readAsDataURL(fileInput.files[0]);
//         }
//     }
// }

// function resetFile() {
//     var file = document.querySelector("#preview3");
//     var file_input = document.querySelector("#image3");
//     file.value = '';
//     file_input.value = '';
// }

// $("#image").change(function () {
//     imagePreview(this);
// });
// $("#image2").change(function () {
//     imagePreview(this);
// });
// $("#image3").change(function () {
//     imagePreview(this);
// });