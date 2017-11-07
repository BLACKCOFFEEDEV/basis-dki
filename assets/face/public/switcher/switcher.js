jQuery(document).ready(function($) {

  var colors = '';
  var server_url = '';
  var folder_url = 'css/';

  // Style switcher
  $('#custumize-style').animate({
    left: '-134px'
  });

  $('#custumize-style .switcher').click(function(e) {
    e.preventDefault();
    var div = $('#custumize-style');
    if (div.css('left') === '-134px') {
      $('#custumize-style').animate({
        left: '0px'
      });

      // open switcher and add class open
      $(this).addClass('open');
      $(this).removeClass('closed');

    } else {
      $('#custumize-style').animate({
        left: '-134px'
      });

      // close switcher and add closed
      $(this).addClass('closed');
      $(this).removeClass('open');

    }
  });


  //Text Color change:
  $("#custom-color li a").click(function() {
    if($("#colors-style").length == 0) {
      $('<link href="" rel="stylesheet" type="text/css" id="colors-style">').appendTo('body');
    }
    var color_code = $(this).attr('class');
    $(this).parent().parent().find('li').removeClass('active');
    $("#colors-style").attr("href", folder_url + color_code +".css");
    $(this).parent().addClass('active');
    //$.cookie("layout_color", server_url + color_code +".css");
    return false;
  });
});