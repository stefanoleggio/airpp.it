$(document).ready(function(){
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page){
        $.ajax({
            url: window.location.pathname + "/fetch_data?page="+page,
            success:function(data){
                $('#content').html(data);
                $('html, body').animate({
                    scrollTop: $("#content").offset().top
                    },500, function(){
                        hide();
                    });
            }
        });
    }
})