
(function ($) {
    $.fn.extend({
        cookieList: function (cookieName) {

            return {
                add: function (val) {
                    var items = this.items();

                    var index = items.indexOf(val);

                    // Note: Add only unique values.
                    if (index == -1) {
                        items.push(val);
                        $.cookie(cookieName, items.join(','), { expires: 1, path: '/' });
                    }
                },
                remove: function (val) {
                    var items = this.items();

                    var index = items.indexOf(val);

                    if (index != -1) {
                        items.splice(index, 1);
                        $.cookie(cookieName, items.join(','), { expires: 1, path: '/' });
                    }
                },
                indexOf: function (val) {
                    return this.items().indexOf(val);
                },
                clear: function () {
                    $.cookie(cookieName, "", { expires: 1, path: '/' });
                },
                items: function () {
                    var cookie = $.cookie(cookieName);
                    if (cookie == "") {
                        return [];
                    }

                    return cookie ? eval("([" + cookie + "])") : [];;
                },
                length: function () {
                    return this.items().length;
                },
                join: function (separator) {
                    return this.items().join(separator);
                }
            };
        }
    });
})(jQuery);