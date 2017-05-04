/* ETFormValidation - (c) 2013 Fabio Poloni */
(function($) {		
	$.extend($.fn, {
		etformvalidation: function(options) {
			
			var settings = $.extend( {
				'bootstrap': false,
				'dateFormat': "mm/dd/yy",
				'error': "Please fill in the whole form."
			}, options);

			
			if (!this.length) {
				console.warn("[ETFormValidation] Nothing selected");
				return;
			}
			
			var forms = $(this);
			
			forms.each(function() {
				
				var form = $(this);
				
				if (!form.is("form")) {
					console.warn("[ETFormValidation] No form selected.");
					return;
				}
				
				var validateField = function(field, key) {
					
					var special = new Array(8,9,27,13,35,36,37,38,39,45,46,48,110,190);
				
					if (field.is("input")) {
						switch (field.attr("type")) {
							case "text":
								{
									switch (field.attr("data-etfv")) {
										case "": case "simple":
											if (!key) {
												return field.val().length > 0;
											}
										break;
										case "number":
											if (!key) {
												return (/^[0-9\.]+$/).test(field.val());
											}
											if (key.ctrlKey) {
												return true;
											}
											if (key.shiftKey && special.indexOf(key.which) < 0) {
												return false;
											}
											return (key.keyCode >= 48 && key.keyCode <= 57) || (key.keyCode >= 96 && key.keyCode <= 105) || special.indexOf(key.which) >= 0;
										break;
										case "date":
											if (!key) {
												if (field.val().length == 0) {
													return false;
												}
												try {
													$.datepicker.parseDate(settings.dateFormat, field.val())
												}
												catch (e) {
													return false;
												}
											}
										break;
										default: // "[0-9]+"
											if (parseInt(field.attr("data-etfv"))) {
												if (!key) {
													if (field.val().length == 0) {
														return false;
													} else if (field.val().length <= parseInt(field.attr("data-etfv"))) {
														return true;
													}
												}
												if (special.indexOf(key.which) >= 0) {
													return true;
												}
												if (field.val().length >= parseInt(field.attr("data-etfv"))) {
													return false;
												}
											}
										break;
									}
								}
							break;
							case "password":
								{
									if (!key) {
										return field.val().length > 0;
									}
								}
							break;
							case "radio": case "checkbox":
								{
									if (!key) {
										return $("input[type=" + field.attr("type") + "][name=" + field.attr("name") + "]:checked").size() > 0;
									}
								}
							break;
							default:
							break;
						}
					} else if (field.is("textarea") || field.is("select")) {
						if (!key) {
							if (field.val().length == 0) {
								return false;
							}
						}
					}
					return true;
				}
				
				form.find("input[data-etfv],select[data-etfv],textarea[data-etfv]").each(function() {
					var updateUI = function() {
						var field = $(this);
						var valid = validateField(field, null);
						if (settings.bootstrap) {
							if (field.parents(".control-group").hasClass("success")) {
								field.parents(".control-group").removeClass("success");
							}
							if (field.parents(".control-group").hasClass("error")) {
								field.parents(".control-group").removeClass("error");
							}
							if (valid) {
								field.parents(".control-group").addClass("success");
							} else {
								field.parents(".control-group").addClass("error");
							}
						} else {
							field.parents(".controls").find("span.etfv-result").remove();
							if (valid) {
								field.parents(".controls").append("<span class=\"etfv-result\"> &#x2714;</span>");
							} else {
								field.parents(".controls").append("<span class=\"etfv-result\"> &#x2718;</span>");
							}
						}
					};
					
					$(this).keydown(function(key) {
						return validateField($(this), key);
					}).keyup(updateUI).change(updateUI);
				});
				
				form.submit(function() {
					var submit = true;
					form.find("input[data-etfv],select[data-etfv],textarea[data-etfv]").each(function() {
						if (!validateField($(this), null)) {
							submit = false;
						}
					});
					if (!submit) {
						if (settings.bootstrap) {
							form.prepend('<div class="alert alert-error">' + settings.error + '</div>');
						} else {
							alert(settings.error);
						}
					}
					return submit;
				});
			});
			
			return forms;
		}
	});
})(jQuery);