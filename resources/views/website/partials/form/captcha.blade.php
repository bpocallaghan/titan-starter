<script type="text/javascript">
    /**
     * Helper to submit the forms via ajax
     * @param form
     * @returns {boolean}
     */
    function submitForm($form)
    {
        var inputs = [];
        if (!FORM.validateForm($form, inputs)) {
            return false;
        }

        var form = $form[0]; // You need to use standard javascript object here
        var formData = new FormData(form);

        FORM.sendFormToServer($form, formData);
        return false;
    }

    /**
     * onloadCallback
     */
    var onloadCallback = function () {
        $(".g-recaptcha").each(function () {

            var el = $(this);
            var widgetId = grecaptcha.render($(el).attr("id"), {
                "sitekey": "{{ config('app.recaptcha_public_key') }}",
                "badge": "bottomleft",
                "callback": function (token) {

                    var valid = true;
                    $('.form-control').each(function () {
                        if (this.checkValidity() === false) {
                            $('.needs-validation').addClass('was-validated');
                            valid = false;
                        }
                    });

                    if (valid === false) {
                        BUTTON.reset($('.btn-submit[type="submit"]'));
                        return valid;
                    }

                    $(el).parents('form').find(".g-recaptcha-response").val(token);
                    return submitForm($(el).parents('form'));
                }
            });
            jQuery(this).attr('data-widget-id', widgetId);
        });
    };
</script>

<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"></script>
