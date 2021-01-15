/*
  JavaScript code to add video URL to input on file upload
*/
console.log('test');

jQuery(document).ready(function() {
  const videoUrlElement = document.querySelector('.acf-field-url[data-name="funeral_video_url"');
  const thumbnailUrlElement = document.querySelector('.acf-field-url[data-name="thumbnail_url"');
  thumbnailUrlElement.style.display = "none";

  jQuery('body').on('DOMSubtreeModified', '.show-if-value.file-wrap', function() {
      var videoFileUrl = document.querySelector('.file-info a').href;
      var target = videoUrlElement.querySelector('input');

      if( videoFileUrl ) {
        target.value = videoFileUrl;
      }
  });

  document.querySelector('body').addEventListener("click", function() {
    var imageFileUrl = document.querySelector('.show-if-value.image-wrap img').src;
    var target = thumbnailUrlElement.querySelector('input');

    if( imageFileUrl.startsWith("https://olivewebserver")  ) {
      target.value = imageFileUrl;
    } else {
      target.value = '';
    }
  })
  

  const cancelFile = document.querySelector('.show-if-value .-cancel')

  cancelFile.addEventListener("click", function() {
    var target = videoUrlElement.querySelector('input');
    
    // For whatever reason, this needs to be delayed
    setTimeout(function() {
      target.value = '';
    }, 10);
  });
});
