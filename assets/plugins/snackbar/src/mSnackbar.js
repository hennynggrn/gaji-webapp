(function ($)
{
    var dataid = 5;
    jQuery.mSnackbar = function (text)
    {
        var el = $('#mSnackbarContainer');
        if(text)
        {
            if(!el.length)
            {
                $('body').append('<div id="mSnackbarContainer"></div>');
                var el = $('#mSnackbarContainer');
                timeout();
            }
            close();
            dataid = dataid+1;
            if(el.find('.mSnackbar').length>0)
            {
                setTimeout(function()
                {
                    el.append('<div class="mSnackbar slideIn" data-id="'+dataid+'">'+text+'</div>');
                }, 300);
            }else{
                el.append('<div class="mSnackbar slideIn" data-id="'+dataid+'">'+text+'</div>');
            }
            dataid = 5;
            el.find('.mSnackbar').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e)
            {
                $(e.currentTarget).remove();
            });
        }

        function timeout()
        {
            if(dataid==0){
                close();
            }
            dataid = dataid-1;
            setTimeout(timeout, 1000);
        }

        function close()
        {
            el.find('.mSnackbar').not('.slideOut').addClass('slideOut');
            setTimeout(function()
            {
                el.find('.mSnackbar.slideOut').remove();
            }, 300);
        }
        return{
            close: close
        }
    }
}(jQuery));