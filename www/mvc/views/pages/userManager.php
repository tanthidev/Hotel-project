<div id="container__userManager" class="container__userManager">
    <?php 
        $users = json_decode($data['users']);
    ?>
        <!--  -->
    <table class="projects-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>COUNTRY</th>
                <th>GENDER</th>
                <th>PASSPORT</th>
                <th></th>
            </tr>
        </thead>
        
        <?php 
            foreach($users as $user){
                echo '
                <tr>
                        <td>
                            <p>'.$user -> userID.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p>'.$user -> fullName.'</p>
                            <p></p>
                        </td>
                        <td class="member">
                            <div class="member-info">
                                <p>'.$user -> phoneNumber.'</p>
                                <p></p>
                            </div>
                        </td>
                        <td>
                            <p>'.$user -> email.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p>'.$user -> country.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p>'.$user -> gender.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p>'.$user -> passPort.'</p>
                            <p></p>
                        </td>

                        <td class="detail-booking">
                            <a href="">Details</a>
                        </td>
                ';
            }
        ?>
    </table>

    <div class="container-pagination">
            <!-- Btn pre-page -->
            <span class="btn__controller-page">
                <i class="fa-solid fa-angle-left"></i>
            </span>
            <!-- controller page -->
            
            <?php 
                for($i=1;$i<=$data['totalPage'];$i++){
                    echo '
                    <a href="/admin/userManager/?page='.$i.'" class="btn__controller-page">
                        <span>'.$i.'</span>
                    </a> 
                    ';
                }
            ?>  
            <!-- Btn next-page -->
            <span href="" class="btn__controller-page">
                <i class="fa-solid fa-angle-right"></i>
            </span>
    </div>
</div>