<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>elFinder 2.0</title>

<!-- jQuery and jQuery UI (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="{{asset('css/elfinder.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/theme.css')}}">

<!-- elFinder JS (REQUIRED) -->
<script src="{{asset('js/elfinder.min.js')}}"></script>

<!-- elFinder translation (OPTIONAL) -->
<script src="{{asset('js/i18n/elfinder.ru.js')}}"></script>

<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript">
var FileBrowserDialogue = {
init: function() {
// Here goes your code for setting your custom things onLoad.
},
mySubmit: function (URL) {
// pass selected file path to TinyMCE
     parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

// force the TinyMCE dialog to refresh and fill in the image dimensions
     var t = parent.tinymce.activeEditor.windowManager.windows[0];
     t.find('#src').fire('change');

// close popup window
parent.tinymce.activeEditor.windowManager.close();
}
}

$().ready(function() {
var elf = $('#elfinder').elfinder({
// set your elFinder options here
     url: '/pizza/public/admin/connector',  // connector URL
     getFileCallback: function(file) { // editor callback
    // file.url - commandsOptions.getfile.onlyURL = false (default)
    // file     - commandsOptions.getfile.onlyURL = true
    url=file.url.replace('../../','/');
FileBrowserDialogue.mySubmit(url); // pass selected file path to TinyMCE
}
}).elfinder('instance');
});
</script>
</head>
<body>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>

</body>
</html>