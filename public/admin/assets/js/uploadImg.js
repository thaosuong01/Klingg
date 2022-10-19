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

window.onload = function() {
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("uploadImage");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files;
      var output = document.getElementById("result");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          var div = document.createElement("div");
          div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
          output.insertBefore(div, null);
        });        
        picReader.readAsDataURL(file);
      }

    });
  }
}
