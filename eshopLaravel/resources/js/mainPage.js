$(document).on('click', '.sort', function(event) {
  console.log("here")
  event.preventDefault();
  var $link = $(this);
  var href = $link.attr('href');
  var filterParams = $('form.filter-form').serialize();
  var url = '/products?' + filterParams + '&' + href.slice(href.indexOf('?')+1);
  console.log(url)
  //window.location.href = url;
});