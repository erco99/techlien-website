$('.collapse').on('show.bs.collapse', function (e) {
    $('.collapse').not(e.target).removeClass('in');
});
