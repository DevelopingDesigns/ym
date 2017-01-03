/* Icon Picker */

(function ($, iconFonts) {

    $.fn.iconPicker = function (options) {
        var icons = iconFonts.icons,
            $list;

        function buildList($popup, $button, iconFont) {
            var icons = iconFonts[iconFont] && iconFonts[iconFont].icons,
                prefix = iconFonts[iconFont] && iconFonts[iconFont].prefix;
            $list = $popup.find('.icon-picker-list');
            $list.empty();

            for (var i = 0, l = icons.length; i < l; i++) {
                var name = icons[i].replace(/\-/g, ' ');
                $list.append(
                    '<li data-icon="' + icons[i] + '">' +
                    '<a href="#" title="' + name + '">' +
                    '<span class="' + iconFont + ' ' + prefix + ' ' + prefix + '-' + icons[i] + '"></span>' +
                    '</a>' +
                    '</li>'
                );
            }

            $('a', $list).click(function (e) {
                e.preventDefault();
                var title = $(this).attr("title");
                $target.val(prefix + "|" + prefix + "-" + title);
                $button.removeClass().addClass("button icon-picker " + prefix + " " + prefix + "-" + title);
                removePopup();
            });
        }

        function removePopup() {
            $(".icon-picker-container").remove();
        }

        this.each(function () {
            createPopup(this);
        });

        function createPopup(button) {
            var $button = $(button);
            $target = $($button.data('target'));
            $popup = $('<div class="icon-picker-container"> \
						<div class="icon-picker-control"></div> \
						<ul class="icon-picker-list"></ul> \
					</div>')
                .css({
                    'top': $button.offset().top,
                    'left': $button.offset().left
                });

            buildList($popup, $button, 0);
            var $control = $popup.find('.icon-picker-control'),
                html = '<p><select>';

            $.each(iconFonts, function(index, value) {
                html += '<option value="dashicons">' + value.name + '</option>'
            });
            html += '</select></p>';

            $control.html(html +
                '<a data-direction="back" href="#"><span class="dashicons dashicons-arrow-left-alt2"></span></a> ' +
                '<input type="text" class="" placeholder="Search" />' +
                '<a data-direction="forward" href="#"><span class="dashicons dashicons-arrow-right-alt2"></span></a>');

            $('select', $control).on('change', function (e) {
                e.preventDefault();
                buildList($popup, $button, this.value);
            });

            $('a', $control).click(function (e) {
                e.preventDefault();
                if ($(this).data('direction') === 'back') {
                    //move last 25 elements to front
                    $('li:gt(' + (icons.length - 26) + ')', $list).each(function () {
                        $(this).prependTo($list);
                    });
                } else {
                    //move first 25 elements to the end
                    $('li:lt(25)', $list).each(function () {
                        $(this).appendTo($list);
                    });
                }
            });

            $popup.appendTo('body').show();

            $('input', $control).on('keyup', function (e) {
                var search = $(this).val();
                if (search === '') {
                    //show all again
                    $('li:lt(25)', $list).show();
                } else {
                    $('li', $list).each(function () {
                        if ($(this).data('icon').toString().toLowerCase().indexOf(search.toLowerCase()) !== -1) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }
            });


            $(document).mouseup(function (e) {
                if (!$popup.is(e.target) && $popup.has(e.target).length === 0) {
                    removePopup();
                }
            });
        }
    };

    $(document).ready(function() {
        debugger;
        $('.icon-picker').iconPicker();
    });

}(jQuery, iconPicker));
