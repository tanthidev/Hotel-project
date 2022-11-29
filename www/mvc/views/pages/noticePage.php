<style>
    body{
        background-color: #FBFBFB;
    }
</style>
<div class="grid">
    <div class="notice-page__container-img">
        <!-- Error 404 -->
        <!-- <img class="notice-page__img" src="./mvc/data/images/notice/404.gif" alt="">
        <a style="font-size: 30px; " href="/home"><span style="color: #63C3EB;">Click here</span> To go home</a> -->
        
        <!-- Success -->
        <img class="notice-page__img" src="./mvc/data/images/notice/success.png" alt="">
        <span class="notice-page__title--success">Booking Success</span>
        <p>You will be redirected to the home in <span id="counter">10</span> second(s).</p>
    
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
setInterval(function(){ countdown(); },1000);
</script>