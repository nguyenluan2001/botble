!function(e){var t={};function o(r){if(t[r])return t[r].exports;var n=t[r]={i:r,l:!1,exports:{}};return e[r].call(n.exports,n,n.exports,o),n.l=!0,n.exports}o.m=e,o.c=t,o.d=function(e,t,r){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)o.d(r,n,function(t){return e[t]}.bind(null,n));return r},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="/",o(o.s=204)}({204:function(e,t,o){e.exports=o(205)},205:function(e,t){$(document).ready((function(){var e=this,t=$(".table-language");t.on("click",".delete-locale-button",(function(e){e.preventDefault(),$(".delete-crud-entry").data("url",$(e.currentTarget).data("url")),$(".modal-confirm-delete").modal("show")})),$(document).on("click",".delete-crud-entry",(function(o){o.preventDefault(),$(".modal-confirm-delete").modal("hide");var r=$(o.currentTarget).data("url");$(e).prop("disabled",!0).addClass("button-loading"),$.ajax({url:r,type:"DELETE",success:function(o){o.error?Botble.showError(o.message):(o.data&&(t.find("i[data-locale="+o.data+"]").unwrap(),$(".tooltip").remove()),t.find('a[data-url="'+r+'"]').closest("tr").remove(),Botble.showSuccess(o.message)),$(e).prop("disabled",!1).removeClass("button-loading")},error:function(t){$(e).prop("disabled",!1).removeClass("button-loading"),Botble.handleError(t)}})})),$(document).on("click",".add-locale-form button[type=submit]",(function(e){var o=this;e.preventDefault(),e.stopPropagation(),$(this).prop("disabled",!0).addClass("button-loading"),$.ajax({type:"POST",cache:!1,url:$(this).closest("form").prop("action"),data:new FormData($(this).closest("form")[0]),contentType:!1,processData:!1,success:function(e){e.error?Botble.showError(e.message):(Botble.showSuccess(e.message),t.load(window.location.href+" .table-language > *")),$(o).prop("disabled",!1).removeClass("button-loading")},error:function(e){$(o).prop("disabled",!1).removeClass("button-loading"),Botble.handleError(e)}})}))}))}});