
// jQuery(function ($) {

//   $.ajax({
//     type: "POST",
//     url: reqUrl,
//     data: reqBody,
//     dataType: "json",
//     success: function (data, textStatus) {
//       if (data.redirect) {

//         window.location.replace(data.redirect);
//       } else {
  
//         $("#registration-form").replaceWith(data.form);
//       }
//     }
//   });

// });


// $('body').ajaxComplete(function (e, xhr, settings) {
//   if (xhr.status == 200) {
//       var redirect = null;
//       try {
//           redirect = $.parseJSON(xhr.responseText).redirect;
//           if (redirect) {
//               window.location.href = redirect.replace(/\?.*$/, "?next=" + window.location.pathname);
//           }
//       } catch (e) {
//           return;
//       }
//   }
// }



// document.addEventListener('DOMContentLoaded', function() {
//   const form = document.querySelector('#-form');

//   form.addEventListener('submit', function(event) {
//     event.preventDefault();
//     const formData = new FormData(form);

//     fetch('/my-ajax-url/', {
//       method: 'POST',
//       body: formData
//     })
//     .then(response => response.json())
//     .then(response => {
//       if (response.success && response.data.hasOwnProperty('url') && response.data.url !== null) {
//         window.location.replace(response.data.url);
//       } else {
//         console.log('AJAX response error');
//       }
//     })
//     .catch(error => console.log(error));
//   });
// });


// let responseObj = JSON.parse(feedback);
// let url = responseObj.data.url;
// console.log


// document.addEventListener( 'wpcf7mailsent', function( event ) {
//   var responseObj = JSON.parse(event.detail.apiResponse);
//   let test = responseObj.data.url;
//   console.log(test)
// }, false );



// document.addEventListener( 'wpcf7mailsent', function( event ) {
//   location = 'http://whitelabel.local/wordpress/sample-page/';
// }, false );





document.addEventListener('wpcf7mailsent', function(event) {

  let input = document.getElementById('new-site-slug');
  let slug = input.value;
  let currentUrl = window.location.href;
  let newUrl = currentUrl+slug+'/wp-admin/';

  location = newUrl;

}, false);
