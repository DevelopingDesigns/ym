(function($){	

	$('a[data-name="acf-fc-collapse"]').live('click', function() {
		var $el = $(this).closest('.acf-field[data-name="fc_layout"]');
		$el.toggleClass('-collapsed').next('.acf-input').toggleClass('-collapsed');
		$el.find('.acf-field-list-wrap').slideToggle();
	});

	var $acf_fl_actions = '<a class="acf-icon -arrow-combo flex" data-name="acf-fc-reorder" title="'+(acf_flex_collapse.reorder)+'"></a><a class="acf-icon -minus flex" data-name="acf-fc-delete" title="'+(acf_flex_collapse.delete)+'" href="#"></a><a class="acf-icon -duplicate flex" data-name="acf-fc-duplicate" title="'+(acf_flex_collapse.duplicate)+'" href="#"></a><a class="acf-icon -plus flex" data-name="acf-fc-add" title="'+(acf_flex_collapse.addnew)+'" href="#"></a><a class="acf-icon -collapse flex" data-name="acf-fc-collapse" title="'+(acf_flex_collapse.toggle)+'" href="#"></a>';

	$('.description.acf-fl-actions').html($acf_fl_actions);

})(jQuery);