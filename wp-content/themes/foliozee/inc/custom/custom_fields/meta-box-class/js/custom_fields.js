// Radio Box for sidebar selection
jQuery(document).ready(function(){
	'use strict';
	jQuery(".box_radio li input:checked").parent().addClass("selected");
	jQuery(".box_radio li .input-select").click(
		function(event) {
			event.preventDefault();
			jQuery(".box_radio li").removeClass("selected");
			jQuery(this).parent().addClass("selected");
			jQuery(this).parent().find(":radio").attr("checked","checked");			 
		}
	);
});

// On/Off Switch Script on posts/pages STARTS //
jQuery(document).ready(function(){
	'use strict';
	jQuery('.switch_post').bootstrapSwitch();
	jQuery('.switch_post').on('switch-change', function (e, data) {
			//var $el = jQuery(data.el);
			var  value = data.value;
			//console.log(e, $el, value);
			//console.log(value);
			// Setting inout on off value 
			jQuery(this).children('.switch_value').val(value);
	});
	jQuery('.switch_post').bootstrapSwitch('setState', true);
});

//Start of image uploader block
var jQuery;
var targetOfImage;
var fileFrame;
jQuery(document).ready(function(){
	'use strict';
    jQuery(".cf-add-image").on("click", CF_loadCustomImage);
    jQuery(".cf-remove-image").on("click", CF_removeCustomImage);

});

function CF_removeCustomImage(){
    var target = jQuery(this).data("target");

    jQuery("#" + target ).val("");
    jQuery("#image-" + target).empty();
    jQuery(this).hide();
}

function CF_loadCustomImage(){
    targetOfImage = jQuery(this).data("target");
    fileFrame = wp.media.frames.file_frame = wp.media({
            multiple: false
        });
    CF_processUploadedImage();
}

function CF_processUploadedImage(){
	var inputField = jQuery('#'+targetOfImage);
		fileFrame.on('select', function() {
            var url = fileFrame.state().get('selection').first().toJSON();
            inputField.val(url.url);
            
            jQuery("#image-" + targetOfImage).children('img').attr('src', url.url);
        });
        fileFrame.open();
		
		jQuery(".cf-remove-image[data-target=" + targetOfImage + "]").show();
    //};
}
//End of image uploader block

//Taxonomy selector element
jQuery(document).ready(function($){
	'use strict';
    $(".taxonomy-selector").each(function(){
        var id = $(this).data('id');
        var values = $('#' + id).val().split(',');
        $(this).val(values);
    });

    $(".taxonomy-selector").on("change",function(){
        var id = $(this).data('id');
        $('#' + id).val($(this).val());
    });
});
//end taxonomy selector element

//Start of video uploader block
var targetOfVideo;
jQuery(document).ready(function(){
	"use strict";
    jQuery(".cf-add-video").on("click", CF_loadCustomVideo);
    jQuery(".cf-remove-video").on("click", CF_removeCustomVideo);
});

function CF_removeCustomVideo(){
    var target = jQuery(this).data("target");
    jQuery("#" + target ).val("");
    jQuery("#image-" + target).empty();
    jQuery(this).hide();
}

function CF_loadCustomVideo() {
	
    targetOfVideo = jQuery(this).data("target");
	fileFrame = wp.media.frames.file_frame = wp.media({
		multiple: false
	});
    CF_processUploadedVideo();
}

function CF_processUploadedVideo() {
	var inputField = jQuery('#'+targetOfVideo);
	
	fileFrame.on('select', function() {
            var url = fileFrame.state().get('selection').first().toJSON();
            inputField.val(url.url);
            
            jQuery("#image-" + targetOfVideo).html(url.url);
        });
        fileFrame.open();
		
		jQuery(".cf-remove-video[data-target=" + targetOfVideo + "]").show();
		
}
//End of video uploader block

//Show/hide metabox, depending on element value
jQuery(document).ready(function(){
	"use strict";
	
    toggleMetaboxOnFormat("post_video_custom_fields", 'video');
	toggleMetaboxOnFormat("post_audio_custom_fields", 'audio');
	toggleMetaboxOnFormat("post_quote_custom_fields", 'quote');
	toggleMetaboxOnFormat("featuredgallerydiv", 'gallery');
	toggleMetaboxOnFormat("portfolio_video_custom_fields", 'video');
	toggleMetaboxOnFormat("portfolio_image_custom_fields", 'image');
	

	//toggleMetaboxOnTemplate("page_custom_fields", 'default');

    jQuery("input[name=post_format]").on("change",function() {
        toggleMetaboxOnFormat("post_video_custom_fields", 'video');
		toggleMetaboxOnFormat("post_audio_custom_fields", 'audio');
		toggleMetaboxOnFormat("post_quote_custom_fields", 'quote');
		toggleMetaboxOnFormat("featuredgallerydiv", 'gallery');
		toggleMetaboxOnFormat("portfolio_video_custom_fields", 'video');
		toggleMetaboxOnFormat("portfolio_image_custom_fields", 'image');
    });
	
	toggleMetaFieldsOnTemplate('sidebar_active', 'default');
	toggleMetaFieldsOnTemplate('page_layout_option', 'default');
	
	jQuery("select[name=page_template]").on("change",function() {
        toggleMetaFieldsOnTemplate('sidebar_active', 'default');
		toggleMetaFieldsOnTemplate('page_layout_option', 'default');
    });
	

});

function toggleMetaboxOnFormat(metaboxId, value) {
    var format = jQuery("input[name=post_format]:checked").val();
    if(format != value )
        jQuery("#" + metaboxId).slideUp("fast");
    else
        jQuery("#" + metaboxId).slideDown("fast");
}

function toggleMetaboxOnTemplate(metaboxId, value) {
	
    var format = jQuery("select[name=page_template]").val();
    if(format != value )
        jQuery("#" + metaboxId).slideUp("fast");
    else
        jQuery("#" + metaboxId).slideDown("fast");
}

function toggleMetaFieldsOnTemplate(fieldName, value) {
	
    var format = jQuery("select[name=page_template]").val();
	if(format!== undefined){
		if(format != value )
			jQuery("[name=" + fieldName+"]").closest('tr').slideUp("fast");
		else
			jQuery("[name=" + fieldName+"]").closest('tr').slideDown("fast");
	}
}