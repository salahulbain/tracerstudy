$.extend(window.Parsley.options,{focus:"first",excluded:"input[type=button], input[type=submit], input[type=reset], .search, .ignore",triggerAfterFailure:"change blur",errorsContainer:function(e){},trigger:"change",successClass:"is-valid",errorClass:"is-invalid",classHandler:function(e){return e.$element.closest(".form-group")},errorsContainer:function(e){return e.$element.closest(".form-group")},errorsWrapper:'<div class="parsley-error"></div>',errorTemplate:"<span></span>"}),Parsley.on("field:validated",(function(e){var r=$(e)[0];if(r&&!r.isValid()&&r.validationResult.filter((function(e){return"required"===e.assert.name})).length>0){var t=$(r.element).closest(".form-group"),a=t.find(".form-label:first");if(a.length>0){var s=t.find("div.parsley-error span[class*=parsley-]");if(s.length>0){var i=a.text();i&&s.html(i+" is required.")}}}})),Parsley.addValidator("restrictedCity",{requirementType:"string",validateString:function(e,r){return""===(e=(e||"").trim())||e.toLowerCase()===r.toLowerCase()},messages:{en:'You have to live in <a href="https://www.google.com/maps/place/Jakarta">Jakarta</a>.'}});