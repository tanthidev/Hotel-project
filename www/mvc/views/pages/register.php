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



<div class="container-register">
    <div id="wrap-register" class="wrap-register">

        <form action="/enrol/registerprocessing" method="POST" class="register-form validate-form">
            <span class="register-form-title">
                Member Register
            </span>
            <div class="wrap-input validate-input">
                <input class="register-form--input" type="text" name="fullName" placeholder="Full Name">
                <span class="focus-input"></span>
                <span class="symbol-input">
                    <i class="fa-solid fa-user"aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input validate-input">
                <input class="register-form--input" type="tel" name="tel" placeholder="Phone Number">
                <span class="focus-input"></span>
                <span class="symbol-input">
                    <i class="fa-sharp fa-solid fa-phone" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input validate-input">
                <input class="register-form--input" type="email" name="email" placeholder="Email">
                <span class="focus-input"></span>
                <span class="symbol-input">
                    <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input validate-input">
                <input class="register-form--input" type="password" name="pass" placeholder="Password">
                <span class="focus-input"></span>
                <span class="symbol-input">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input validate-input">
                <input class="register-form--input" type="password" name="repeat-pass" placeholder="Repeat Password">
                <span class="focus-input"></span>
                <span class="symbol-input">
                    <i class="fa-solid fa-repeat" aria-hidden="true"></i>
                </span>
            </div>
            
            <div class="container-register-form-btn">
                <input name="btnRegister" type="submit" class="register-form-btn" value="Register">
            </div>


            <div class="text-center register-form__login">
                <a id="register-form__to-login--text" class="txt2 register-form__to-login--text" href="/enrol/login">                   
                        Do you already have an account? Log in
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </form>
    </div> 
</div>