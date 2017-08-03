<?php
// This file is part of a WordPress plugin, `Get Error Message There'.
// version: 0.94
?>

<?php require(dirname(__FILE__) . '/wp-gemt-common.php'); ?>

<?php
  # If you experienced that the other plugins start incorrect behavior due to
  # activating this plagin, please try to comment out the line following this
  # php comment section.
  # [http://docs.jquery.com/Using_jQuery_with_Other_Libraries] for details.
?>

// jQuery.noConflict();

var getErrorMessageThere = {
	      injectHandlers: function() {
		  var form = jQuery('#commentform');
		  if (!form) return;

		  jQuery('head').append('<link type="text/css" rel="stylesheet" href="<?php echo gemt_rel_uri() ?>/wp-gemt.css" />');
		  form.ajaxForm( {
			  before: function() {
			      getErrorMessageThere.removeErrorMessageArea();
			      getErrorMessageThere.showLoadingIndicator();
			      return true;
			  },
			      
			  error: function(data) {
			      getErrorMessageThere.hideLoadingIndicator();
			      try {
				  getErrorMessageThere.insertErrorMessage(data);
			      } catch(e) {
				  alert(e);
			      }
			  },

			  success: function(data) {
			      try {
				  if (getErrorMessageThere.isSubmitSucceeded(data)) {
				      getErrorMessageThere.displaySubmittedComment(data);
				  } else {
				      getErrorMessageThere.hideLoadingIndicator();
				      getErrorMessageThere.insertErrorMessage(data);
				  }
			      } catch(e) {
				  getErrorMessageThere.hideLoadingIndicator();
				  alert(e);
			      }
			  }});
	      },

	      removeErrorMessageArea: function() {
		  jQuery('#gemt_error_text').remove();
	      },

	      showLoadingIndicator: function() {
		  var btn = jQuery('#commentform').find('#submit');
		  btn.after('<span id="gemt_loading_indicator"><img src="<?php echo gemt_rel_uri() ?>/loading.gif" alt="loading" /></span>');
		  btn[0].disabled = true;
	      },

	      hideLoadingIndicator: function() {
		  jQuery('#gemt_loading_indicator').remove();
		  jQuery('#commentform').find('#submit')[0].disabled = false;
	      },

	      isSubmitSucceeded: function(data) {
		  if (typeof(data) != "string") return false;
		  result = jQuery("<div>").html(data);
		  return result.find('#content')[0];
	      },

	      displaySubmittedComment: function(data) {
		  if (false) {
		      jQuery('div#content').empty();
		      jQuery('div#content').append(result.find('div#content'));
		      getErrorMessageThere.hideLoadingIndicator();
		  } else {
		      if (jQuery.browser.msie) {
			  location.reload();
		      } else {
			  getErrorMessageThere.hideLoadingIndicator();
			  location.href = '';
		      }
		  }
	      },

	      insertErrorMessage: function(data) {
		  if ((typeof(data) == "string") || (data.status == 500)) {
		      result = jQuery("<div>").html((typeof(data) == "string") ? data : data.responseText);
		      jQuery('#commentform').find('#submit').after('<span id="gemt_error_text"></span>');
		      jQuery('#gemt_error_text').prepend(result.find('p'));
		  }
	      }
};

jQuery(document).ready(function() { getErrorMessageThere.injectHandlers(); });

<?php
// Local Variables:
// tab-width: 4
// indent-tabs-mode: nil
// End:
?>
