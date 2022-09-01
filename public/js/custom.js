function tinymce_setup_callback(editor) {
    tinymce.init({
      menubar: false,
      selector: "textarea.richTextBox",
      skin_url:
        $('meta[name="assets-path"]').attr("content") + "?path=js/skins/voyager",
      min_height: 100,
      height: 200,
      resize: "vertical",
      plugins: "link, image, code, table, textcolor, lists",
      extended_valid_elements:
        "input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",
      file_browser_callback: function (field_name, url, type, win) {
        if (type == "image") {
          $("#upload_file").trigger("click")
        }
      },
      toolbar:
        "styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code",
      convert_urls: false,
      image_caption: true,
      image_title: true,
    })
  }