(function() {


}).call(this);

(function() {
  var $;

  $ = jQuery;

  $.fn.extend({
    deptTree: function(options) {
      var log, settings;
      settings = {
        option1: true,
        option2: false,
        debug: true
      };
      settings = $.extend(settings, options);
      log = function(msg) {
        if (settings.debug) {
          return typeof console !== "undefined" && console !== null ? console.log(msg) : void 0;
        }
      };
      return this.each(function() {
        log("Preparing magic show.");
        return log("Option 1 value: " + settings.option1);
      });
    }
  });

}).call(this);

//# sourceMappingURL=app.js.map
