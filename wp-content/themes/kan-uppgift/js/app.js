jQuery(function($) {
    var timeoutID = null;

    if ($("#bookSearch").length) {
        var jSearchInput = $("#bookSearch");

        // Timeout soultion found here on stackoverflow: https://stackoverflow.com/a/10318661
        jSearchInput.keyup(function(e) {
            clearTimeout(timeoutID);
            //timeoutID = setTimeout(findMember.bind(undefined, e.target.value), 500);
            timeoutID = setTimeout(() => ajaxSearch(e.target.value, jSearchInput), 500);
        });
    }
    
    function ajaxSearch(query = "", jSearchInput) {
        var jSearchResult = $("#searchResult");
        if (query == "") {
            jSearchResult.css({'display': 'none'});
            return false;
        }

        var inputHeight = jSearchInput.outerHeight();
        var inputWidth = jSearchInput.outerWidth();
        var inputPositionTop = jSearchInput.offset().top;
        var inputPositionLeft = jSearchInput.offset().left;
        
        jSearchResult.css({
            'display': 'block',
            'position': 'absolute',
            'z-index': 10,
            'width': inputWidth,
            'top': inputPositionTop + inputHeight,
            'left': inputPositionLeft
         });

        $.post(AjaxSearch.ajaxurl, { action: "load_search_results", query: query })
        .done(function(data) {
            if (data == "") {
                jSearchResult.css({'display': 'none'});
            } else {
                jSearchResult.html(data);
            }
        })
        .fail(function() {
            jSearchResult.css({'display': 'none'});
        });
    }
});