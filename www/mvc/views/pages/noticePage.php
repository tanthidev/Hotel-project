<style>
    body{
        background-color: #FBFBFB;
    }
</style>
<div class="grid">
    <div class="notice-page__container-img">
        
        
        <?php 
            if(isset($_GET['result'])){
                if($_GET['result']=='success'){
                    echo '
                        <!-- Success -->
                        <img class="notice-page__img" src="./mvc/data/images/notice/success.png" alt="">
                        <span class="notice-page__title--success">Booking Success</span>
                        <p>You will be redirected to the home in <span id="counter">10</span> second(s).</p>
                    ';
                } else if($_GET['result']=='fail'){
                    echo '
                    <div class="notice-page__container-fail">
                        <h1 class="notice-page__fail-title">We are sorry.</h1>
                        <p class="notice-page__fail-content">
                            There has been a problem with your booking.
                        </p>
                        <p class="notice-page__fail-content">
                            Please contact us at <span style="font-weight: 700; color: blue;">0123456789</span>
                            so we can help you resolve this issue.
                        </p>
                    </div>
                    ';
                }
            } else{
                echo '
                    <!-- Error 404 -->
                    <img class="notice-page__img" src="./mvc/data/images/notice/404.gif" alt="">
                    <a style="font-size: 30px; " href="/home"><span style="color: #63C3EB;">Click here</span> To go home</a>
                ';
            }
        ?>

    </div>
</div>


<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = '/home';
    }
    if (parseInt(i.innerHTML)!=0) {
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
}

if(document.getElementById('counter')){
    setInterval(function(){ countdown(); },1000);
}
</script>