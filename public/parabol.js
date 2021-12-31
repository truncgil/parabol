
$(function(){
    
    $("table").addClass("table-striped");
    $("table").removeClass("table-flush");
    $("table tr").attr("class","");
    $("table th").attr("class","");
    $("table td").attr("class","");
    $(window).on('beforeunload', function() {
        // alert("beforeunload");
        console.log("beforeunload");
        $(".preloader").removeClass("d-none");
     });
     $( window ).on("load", function() {
             // Handler for .load() called.
             $(".preloader").addClass("d-none");
     });
    $("[name='search']").on("keyup",function(){
            
            var deger = $(this).val();
            deger = deger.replaceAll(".","");
            deger = deger.replaceAll(",",".");
            
            console.log(deger);
        try {
            window.setTimeout(function(){
                $(".dropdown-menu-xl").removeClass("show");
            },300);
            $(".dropdown-menu-xl").removeClass("show");
            var deger = eval(deger);
            deger = deger.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
            //deger = deger.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
           
            $(".calculate-result").html(deger);
        } catch (error) {
            $(".dropdown-menu-xl").addClass("show");
        }
        
        
    });
 
    
    
});