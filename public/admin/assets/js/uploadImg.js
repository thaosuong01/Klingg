function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $("#img-preview").remove();

            const showImg = `
                <img src="${e.target.result}" alt="IMG UPLOAD" style="width: 50px; height: 50px; margin-top: 5px; max-width: 100%; object-fit: cover; object-position: center;" id="img-preview"/>
            `

            $('#image-upload').css("height", "100px");
            $('#upload-img').append(showImg);

        };

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function () {
  $('#images').change(function () {
    $(".imgs").remove();
      $("#frames").html('');
      for (var i = 0; i < $(this)[0].files.length; i++) {
          $("#frames").append('<img src="' + window.URL.createObjectURL(this.files[i]) + '" width="50px" height="50px" style="width: 50px; height: 50px; margin-top: 5px; max-width: 100%; object-fit: cover; object-position: center" />' );
      }
      $('#images-upload').css("height", "100px");
      $('#images-upload.edit_pro').css("height", "70px");

  });
})
