(function($) {

  /**
   * Special fixes for file upload.
   */
  Drupal.behaviors.fileFieldSourcesStrip = {
    attach: function(context, settings) {
      //$('#edit-field-attached-file input.form-file, #edit-field-attached-file input.form-submit', context).hide();
      //$('#edit-field-attached-file .filefield-sources-list').remove();
      //$('#edit-field-attached-file .filefield-source-imce').css('display', '');
    }
  }

})(jQuery);