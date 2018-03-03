var pad;

var products = getJSONData("/sautocomplete/0");

// Custom autocomplete instance.
$.widget( "app.autocomplete", $.ui.autocomplete, {

   // Which class get's applied to matched text in the menu items.
   options: {
       highlightClass: "ui-state-highlight"
   },
   options: {
      suggest: false
  },

   _renderItem: function( ul, item ) {

       // Replace the matched text with a custom span. This
       // span uses the class found in the "highlightClass" option.
       var re = new RegExp( "(" + this.term + ")", "gi" ),
           cls = this.options.highlightClass,
           template = "<span class='" + cls + "'>$1</span>",
           label = item.label.replace( re, template ),
           $li = $( "<li/>" ).appendTo( ul );

       // Create and return the custom menu item content.
       $( "<a/>" ).attr( "href", "#" )
                  .html( label )
                  .appendTo( $li );

       return $li;

   }

});

$('.search-bar-input').autocomplete({
   source: products,
   highlightClass: "bold-text",
   autoFocus:true,
   messages: {
      noResults: function(){
        $('ui-autocomplete').html('no results found');
        $('ui-autocomplete').css('display','block');
      },
      results: function() {}
   },
   select: function(event, ui) {
       $(this).val(ui.item.value);
       $(this).parents("form").submit();  // this will submit the form.
   },
   suggest: function( items ) {
        var $div = $( ".search-dropdown" ).empty();
        $.each( items, function() {
            $( "<a/>" ).attr( "href", this.value )
                       .text( this.label )
                       .appendTo( $div );
        });
    }
}).focus(function () {
    $(this).autocomplete("search");
});

$('.search-bar-input').on( "focus", function( event, ui ) {
    if($(this).val().length == 0){
      //$('.search-dropdown').css('display','block');
      console.log($(this).val().length);
    }
    else{
      console.log($(this).val().length);
      //$('.search-dropdown').css('display','none');
    }
});

$('.search-bar-input').on( "input", function( event, ui ) {
    if($(this).val().length == 0){
      //$('.search-dropdown').css('display','block');
      console.log($(this).val().length);
    }
    else{
      console.log($(this).val().length);
      //$('.search-dropdown').css('display','none');
    }
});

$('.search-bar-input').focus(function(){
    $('.pages-nav-container').css('display','none');
    $('.align-middle ul li').animate({
      'margin-left' : 0,
    }, "slow");
    $('.search-bar').animate({
      'width' : "100%",
    }, "fast");
    $('.search-bar-container').removeClass('col-md-5');
    $('.search-bar-container').addClass('col-md-11');

    pad = $('.header-navigation').width() - (62 * 2);

    $('.search-dropdown').animate({
      'width' : pad,
      'margin-left': 30,
    }, "fast");
});

$('.search-bar-input').focusout(function(){
  $('.search-dropdown').css('display','none');
    $('.align-middle ul li').animate({
      'margin-left' : 25,
    }, "slow");
    $('.search-bar').animate({
      'width' : "240px",
    }, "fast");
    $('.pages-nav-container').css('display','block');
    $('.search-bar-container').removeClass('col-md-11');
    $('.search-bar-container').addClass('col-md-5');

    $('.search-dropdown').animate({
      'width' : w,
    }, "fast");
});

var w = $('.search-bar-input').width();

function getJSONData(myurl){
  var data;
  $.ajax({
      async: false,
      url: myurl,
      dataType: 'json',
      success: function(response){
         data = response;
          }
      });
  return data;
}
