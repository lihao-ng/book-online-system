 $(function () {
  let icons = {
    time: "fa fa-clock-o",
    date: "fa fa-calendar",
    up: "fa fa-chevron-up",
    down: "fa fa-chevron-down",
    previous: 'fa fa-chevron-left',
    next: 'fa fa-chevron-right',
    today: 'fa fa-screenshot',
    clear: 'fa fa-trash',
    close: 'fa fa-remove'
  }

  $('.datetimepicker').datetimepicker({
    // for debug
    // inline: true,
    // sideBySide: true,
    // keepOpen: true,
    format: 'YYYY-MM-DD hh:mm A',
    // debug:true,
    icons: icons
  });

  $('.timepicker').datetimepicker({
    icons: icons,
    format: 'LT'
  });

  $('.datepicker').datetimepicker({
    icons: icons,
    format: 'YYYY-MM-DD'
  });
});