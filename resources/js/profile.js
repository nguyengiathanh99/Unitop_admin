$(document).ready(function () {
  $('#myFile').change( function() {
    if (myFile.files && myFile.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#image').attr('src', e.target.result);
        console.log(e.target.result);
      }
      reader.readAsDataURL(myFile.files[0]);
    }
  });
})
