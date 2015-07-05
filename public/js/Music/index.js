$(window).load(function(){
    $('.tumbvr')._fw({tumbvr:{
        duration:2000,
        easing:'easeOutQuart'
    }})
        //.bind('click',function(){
        //    location="index-3.html"
        //})
    $('a[rel=prettyPhoto]').each(function(){
        var th=$(this),pb
        th.append(pb=$('<span class="playbutt"></span>').css({opacity:.7}))
        pb.bind('mouseenter',function(){
            $(this)
                .stop()
                .animate({opacity:.9})
        }).bind('mouseleave',function(){
            $(this)
                .stop()
                .animate({opacity:.7})
        })
    })

    $('#langSelect').change(function() {
        window.location.href = '?lang='+$(this).val();
    })
});