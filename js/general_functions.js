//functions for footer arrow effect
$('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

$('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
});

$('h4#plus').click(function(e){
  const oldText = $('h4#plus').text();
  if(oldText == '+'){
    $('h4#plus').text('-');
  } else{
    $('h4#plus').text('+');
  }
});
