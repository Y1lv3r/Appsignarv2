<link rel="shortcut icon" href="./imagenes/logos/icono.ico" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

<style>
    #scroll {
        position: fixed;
        right: 20px;
        bottom: 20px;
        cursor: pointer;
        width: 50px;
        height: 50px;
        z-index: 88;
        background-color: #115585;
        text-indent: -9999px;
        display: none;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
    }

    #scroll span {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -8px;
        margin-top: -12px;
        height: 0;
        width: 0;
        border: 8px solid transparent;
        border-bottom-color: #ffffff;
    }

    #scroll:hover {
        opacity: 60%;
        filter: "alpha(opacity=100)";
        -ms-filter: "alpha(opacity=100)";
    }
</style>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type='text/javascript'>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });
        $('#scroll').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>