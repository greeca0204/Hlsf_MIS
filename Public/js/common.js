$(function() {
    $("[data-href]").on("click", function() {
        var url = $(this).data("href");
        window.location.href = url;
    });
});

function open_kcfinder(pattern, callback) {
    window.KCFinder = {};
    if(pattern === "single") {
        window.KCFinder.callBack = callback;
        console.log(window.KCFinder);
        window.open('/Public/3rd/kcfinder/browse.php?lang=zh-cn', 'kcfinder_single', "scrollbars=yes,resizable=1,modal=false,alwaysRaised=yes");
    } else if(pattern === "multi") {
        window.KCFinder.callBackMultiple = callback;
        window.open('/Public/3rd/kcfinder/browse.php?lang=zh-cn', 'kcfinder_multiple', "scrollbars=yes,resizable=1,modal=false,alwaysRaised=yes");
    }

}