jQuery.placeholder = function() {
  $('[placeholder]').focus(function() {
    var input = $(this);
    if (input.hasClass('placeholder')) {
      input.val((input.attr('placeholder')==input.val())?'':input.val());
      input.removeClass('placeholder');
    }
  }).blur(function() {
    var input = $(this);
    if (input.val() === '') {
      input.addClass('placeholder');
      input.val(input.attr('placeholder'));
    }
  }).blur().parents('form').submit(function() {
    $(this).find('[placeholder]').each(function() {
      var input = $(this);
      if (input.hasClass('placeholder')) {
        input.val('');
      }
    });
  });
  
  // Clear input on refresh so that the placeholder class gets added back
  $(window).unload(function() {
    $('[placeholder]').val('');
  });
};

// If using AJAX, call this on all placeholders after submitting to 
// return placeholder
jQuery.fn.addPlaceholder = function() {
  return this.each(function() {
    var input = $(this);
    input.addClass('placeholder');
    input.val(input.attr('placeholder'));
  });
};
