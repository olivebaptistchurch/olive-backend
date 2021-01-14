/*
  JavaScript code to add video URL to input on file upload
*/

jQuery(document).ready(function() {
  jQuery('body').on('DOMSubtreeModified', '.show-if-value', function() {
      var videoFileUrl = document.querySelector('.file-info a').href;
      var target = document.querySelector('.acf-field-url input');

      if( videoFileUrl ) {
        target.value = videoFileUrl;
      }
  });

  const cancelFile = document.querySelector('.show-if-value .-cancel')

  cancelFile.addEventListener("click", function() {
    var videoFileUrl = document.querySelector('.file-info a').href;
    var target = document.querySelector('.acf-field-url input');
    
    // For whatever reason, this needs to be delayed
    setTimeout(function() {
      target.value = '';
    }, 10);
  });
});
