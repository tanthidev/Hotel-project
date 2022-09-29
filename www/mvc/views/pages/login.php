<?php 
    if(isset($data['notice'])){
        if($data['check']){
            $text= "notice-text--success";
            $task= "notice-task--success";
        }
        else{
            $text= "notice-text";
            $task= "notice-task";
        }

        echo '
        <div class="'.$task.' notice-task">
            <span class="'.$text.' notice-text">
            '.$data['notice'].'
            </span>
        </div>
        ';      
    }
?>


<div class="container-login">
    <div id="wrap-login" class="wrap-login">

        <form action="/enrol/loginprocessing" method="POST" class="login-form validate-form">
            <span class="login-form-title">
                Member Login
            </span>

            <div class="wrap-input validate-input">
                <input class="login-form--input" type="tel" name="tel" placeholder="Phone Number">
                <span class="focus-input"></span>
                <span class="symbol-input">
                    <i class="fa-sharp fa-solid fa-phone" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input validate-input">
                <input class="login-form--input" type="password" name="pass" placeholder="Password">
                <span class="focus-input"></span>
                <span class="symbol-input">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            
            <div class="container-login-form-btn">
                <input type="submit" name="btnLogin" class="login-form-btn" value="LOG IN">
            </div>

            <div class="text-center login-form__forgot">
                <span class="login-form__forgot--text">
                    Forgot
                </span>
                <a href="/enrol/forgot" id="login-form__to-forgot" class="txt2 login-form__forgot--link">
                    Username / Password?
                </a>
            </div>

            <div class="text-center login-form__to-register">
                <a id="login-form__to-register--text"  class="txt2  login-form__to-register--text" href="/enrol/register">
                    Create your Account
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>
    </div>
</div>