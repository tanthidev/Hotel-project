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
   
   <div class="container-content">
        <div class="grid container-content-forgot">
            <div class="container-form-forgotpass">
                <div class="warning-forgot">
                        <div class="warning-forgot--logo">
                            <a href="/index.php" class="warning-forgot--link-back-home">
                                <img src="/dataweb/img/logo/logo-company.png" alt="" class="warning-forgot--img">
                            </a>
                        </div>

                        <div class="warning-forgot-content">
                            <h1 class="warning-forgot-content--title">Forgot your password?</h1>
                            <p class="warning-forgot-content--text">
                                Follow these simple steps to reset your account:
                            </p>
                            <ol class="warning-forgot-content--list">
                                <li class="warning-forgot-content--item">
                                    Enter your username or email.
                                </li>
                                <li class="warning-forgot-content--item">
                                    Visit your email account, open the email sent by Carlton Hotel.
                                </li>
                                <li class="warning-forgot-content--item">
                                    Follow the instruction in the mail to change password.
                                </li>
                            </ol>
                        </div>
                </div>

                
                <?php
                    if(isset($data['checkcodeinput'])){
                        if($data['checkcodeinput'] == true){
                            echo '
                            <form action="/enrol/resetpass" method="POST" class="form-confirm">
                                <h1 class="form-confirm--title">New password</h1>
                                <input name="newpass" type="password" class="confirm-input-code" placeholder="New password">
                                <h1 class="form-confirm--title">Repeat new password</h1>
                                <input name="re-newpass" type="password" class="confirm-input-code" placeholder="Repeat new password">
                                <button class="btn-submit confirm__btn-confirm">Confirm</button>
                            </form>
                            ';
                        }
                    }
                     else {?>
                        <form action="/enrol/confirmcodeprocessing" method="POST" class="form-confirm">
                            <h1 class="form-confirm--title">Enter code</h1>
                            <input name="code" type="text" class="confirm-input-code" placeholder="Code">
                            <button class="btn-submit confirm__btn-confirm">Confirm</button>
                        </form>
                    <?php } ?>
            </div>
        </div>
    </div>