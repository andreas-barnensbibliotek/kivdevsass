(function($) {

  Drupal.behaviors.kivKulturkatalogenExternalLinks = {
    attach: function(context, settings) {
      $('.pane-kulturkatalog-panel-pane-4 .view-content .print a').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'),'popup', 'menubar=1,resizable=1,scrollbars=1,width=800,height=640');
      });
      $('.pane-kulturkatalog-panel-pane-4 .view-content .signup a').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'),'popup', 'menubar=1,resizable=1,scrollbars=1,width=650,height=800');
      });
    }
  }

  Drupal.behaviors.kivKulturkatalogenFormLabels = {
    attach: function(context, settings) {

      hideShowTitle($('#views-exposed-form-2015-kulturkatalogen-annons-kulturkatalogen-annons-block  .views-widget-filter-title label'), $('#views-exposed-form-2015-kulturkatalogen-annons-kulturkatalogen-annons-block  .views-widget-filter-title input'));
      hideShowTitle($('#views-exposed-form-2015-kulturkatalogen-annons-kulturkatalogen-annons-block  .views-widget-filter-field_presentationstext_value label'), $('#views-exposed-form-2015-kulturkatalogen-annons-kulturkatalogen-annons-block  .views-widget-filter-field_presentationstext_value input'));
      hideShowTitle($('#views-exposed-form-2015-kulturkatalogen-annons-kulturkatalogen-annons-block  .views-widget-filter-field_max_publik_value label'), $('#views-exposed-form-2015-kulturkatalogen-annons-kulturkatalogen-annons-block  .views-widget-filter-field_max_publik_value input'));

      function hideShowTitle(label, inputField) {

        label.css('position', 'absolute');
        label.css('top', '12px');
        label.css('left', '8px');

        if (inputField.val()) {
          label.hide();
        }

        inputField.focus(function(){
            label.hide();
        });

        inputField.blur(function(){
          if (!inputField.val()) {
            label.show();
          }
        });
      }
    }
  }

})(jQuery);