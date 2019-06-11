function lightbox(lightboxID) {
    $(lightboxID).addClass("show");
    $("body").addClass("fixed");
}
$(".searchback , .close").click(function () {
    $(".lightbox-box, .liuyan-box").removeClass("show");
    $("body").removeClass("fixed");
})
$(".show-btn").click(function(){
  $(this).parent(".con").addClass("show")
})
$(".showmore-btn").click(function(){
    if($(this).parent(".showmore").hasClass("open")){
       $(this).parent(".showmore").removeClass("open")
    }else{
       $(this).parent(".showmore").addClass("open")
    }
})
