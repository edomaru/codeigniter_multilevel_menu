'use strict';

$(function() {


  // Dropdown fix
  $('.dropdown > a[tabindex]').keydown(function(event) {
    // 13: Return

    if (event.keyCode == 13) {
      $(this).dropdown('toggle');
    }
  });


  $('.dropdown-submenu > a').submenupicker();
});
