<?php
    ## Main JS
    $mainJS = array(
        // Main JavaScript =========================================================
        array(BE_PLUGIN_PATH . "jquery/dist/jquery.min.js"),
        array(BE_PLUGIN_PATH . "bootstrap/dist/js/bootstrap.bundle.min.js"),
        array(BE_PLUGIN_PATH . 'bootstrap-notify/bootstrap-notify.min.js'),
        array(BE_PLUGIN_PATH . "js-cookie/js.cookie.js"),
        array(BE_PLUGIN_PATH . "jquery.scrollbar/jquery.scrollbar.min.js"),
        array(BE_PLUGIN_PATH . "jquery-scroll-lock/dist/jquery-scrollLock.min.js"),
        array(BE_PLUGIN_PATH . "bootbox/bootbox.min.js"),

        // Mandatory JavaScript =========================================================
        array(BE_PLUGIN_PATH . "jquery-idletimeout/store.min.js"),
        array(BE_PLUGIN_PATH . "jquery-idletimeout/jquery-idleTimeout.min.js"),
        array(ASSET_PATH     . "auth/plugins/waitMe/waitMe.js"),
        // array(BE_PLUGIN_PATH . "bootstrap")
    );

    $carabinerConfig = array('minify_js' => FALSE);
    $this->carabiner->config($carabinerConfig);
    $this->carabiner->group('main_js', array('js' => $mainJS));
    echo $this->carabiner->display('main_js');

    // Plugins JavaScript ======================================================
    if ( $carabiner = config_item('cfg_carabiner') ) {
        // Theme App JS
        $scripts[] = array(BE_JS_PATH .'app.js?ver='.JS_VER_MAIN);
        $scripts[] = array(BE_JS_PATH .'api.js?ver='.JS_VER_MAIN);
        $this->carabiner->group('app_js', array('js' => $scripts));
        echo $this->carabiner->display('app_js');
    } else {
        echo $scripts; 
        // Theme App JS
        echo '<script src="'. BE_JS_PATH .'app.js?ver='.JS_VER_MAIN.'"></script>';
        echo '<script src="'. BE_JS_PATH .'api.js?ver='.JS_VER_MAIN.'"></script>';
    }
?>

<!-- Customs Script ========================================================== -->
<script type="text/javascript">
    var IdleTimeout = function() {
        return {
            init: function( url, idleTimeout ) {
                $(document).idleTimeout({
                    redirectUrl: url,               // redirect to this url on logout. Set to "redirectUrl: false" to disable redirect
                    // idle settings
                    idleTimeLimit: idleTimeout,     // 'No activity' time limit in seconds. 1200 = 20 Minutes
                    idleCheckHeartbeat: 2,          // Frequency to check for idle timeouts in seconds
                    enableDialog: false,            // set to false for logout without warning dialog
                });
            }
        };
    }();

    $(document).ready(function() {
        IdleTimeout.init( "<?php echo base_url('logout'); ?>", <?php echo config_item('idle_timeout'); ?> );

        $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
            if (originalOptions.type === 'POST' || options.type === 'POST') {
                if (options.processData && options.contentType === 'application/x-www-form-urlencoded; charset=UTF-8') {
                    var token_params = { [App.kdName()] : App.kdToken() };
                    options.data = (options.data ? options.data + '&' : '') + $.param(token_params);
                }
            }
        });
        
        // Switch Languang
        // -----------------------------------------------
        $('a.switchlang').click(function(e) {
            e.preventDefault();
            var lang = $(this).data('lang');
            var url = $(location).attr('href');

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    'lang-select': lang
                },
                success: function(response) {
                    $(location).attr('href', url);
                }
            });
        });

        $("body").delegate(".term_condition", "click", function(e) {
            e.preventDefault();
            $('#term_condition_modal').modal('show');
        });
    });

    $( document ).ajaxSuccess(function (event, request, settings) {
        if ( request.responseText ) {
            if ( request.responseText ) {
                var response = $.parseJSON(request.responseText);
                if( typeof response =='object' ) { if ( response.token ) { App.kdToken(response.token); } }
            }
        }
    });
</script>

<!-- Init Js -->
<?php 
    echo $scripts_init; 
    echo $scripts_add;
?>