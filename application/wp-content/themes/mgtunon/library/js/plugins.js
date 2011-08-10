// Slide.to
(function(b){b.fn.slideto=function(a){a=b.extend({slide_duration:"slow",highlight_duration:3E3,highlight:true,highlight_color:"#FFFF99"},a);return this.each(function(){obj=b(this);b("body").animate({scrollTop:obj.offset().top},a.slide_duration,function(){a.highlight&&b.ui.version&&obj.effect("highlight",{color:a.highlight_color},a.highlight_duration)})})}})(jQuery);


// Campaign Monitor
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  function checkEmail(email) { 
    var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var emailVal = $("#" + email).val();
    return pattern.test(emailVal);
  }
  $(function() {
    $('#subForm').submit(function(e) {
      e.preventDefault();
            
      // Grab form action
      var formAction = this.action;
      
      // Hacking together id for email field
      // Replace the xxxxx below:
      // If your form action were http://mysiteaddress.createsend.com/t/r/s/abcde/, then you'd enter "abcde" below
      var id = "qdrzl";
      var emailId = id + "-" + id;
      
      // Validate email address with regex
      if (!checkEmail(emailId)) {
        alert("Please enter a valid email address");
        return;
      }
      
      // Serialize form values to be submitted with POST
      var str = $(this).serialize();
      
      // Add form action to end of serialized data
      // CDATA is used to avoid validation errors
      //<![CDATA[
      var serialized = str + "&action=" + formAction;
      // ]]>

      // Submit the form via ajax
      $.ajax({
        url: "/application/wp-content/themes/mgtunon/library/mdl/cm-form/cm-proxy.php",
        type: "POST",
        data: serialized,
        dataType: 'html',
        success: function(data){
          // Server-side validation
          if (data.search(/invalid/i) != -1) {
            alert('The email address you supplied is invalid and needs to be fixed before you can subscribe to this list.');
          }
          else
          {
            var $confirmation = $('#cm_form_conf');
            $("#cm_form").hide(); // If successfully submitted hides the form
            $confirmation.slideDown("slow");  // Shows "Thanks for subscribing" div
            $confirmation.prop('tabIndex', -1);
            $confirmation.focus(); // For screen reader accessibility
            // Fire off Google Analytics fake pageview
            //var pageTracker = _gat._getTracker("UA-XXXXX-X");
            //pageTracker._trackPageview("/newsletter_signup");
          }
        }
      });
    });
  });
  