<div id="container__userManager" class="container__userManager">
    <?php 
        $users = json_decode($data['users']);
    ?>
    <table class="userManager__table">
        <tr class="userManager_table-header">
            <th class="userManager_table-header-item userManager_table-header--id grid__column-10-1">ID</th>
            <th class="userManager_table-header-item grid__column-10-2">NAME</th>
            <th class="userManager_table-header-item grid__column-10-1">PHONE</th>
            <th class="userManager_table-header-item grid__column-10-2">EMAIL</th>
            <th class="userManager_table-header-item grid__column-10-1">COUNTRY</th>
            <th class="userManager_table-header-item grid__column-10-1">GENDER</th>
            <th class="userManager_table-header-item grid__column-10-1">PASSPORT</th>
            <th class="userManager_table-header-item grid__column-10-1">ACTION</th>
        </tr>
        
        <?php 
            foreach ($users as $user) {
                echo '
                <tr class="userManager_table-row">
                    <td class="userManager_table-content userManager_table-header--id grid__column-10-1" class="grid__column-10-1">'.$user->userID.'</td>
                    <td class="userManager_table-content grid__column-10-2">'.$user->fullName.'</td>
                    <td class="userManager_table-content grid__column-10-1">'.$user->phoneNumber.'</td>
                    <td class="userManager_table-content grid__column-10-2">'.$user->email.'</td>
                    <td class="userManager_table-content grid__column-10-1">'.$user->country.'</td>
                    <td class="userManager_table-content grid__column-10-1">'.$user->gender.'</td>
                    <td class="userManager_table-content grid__column-10-1">'.$user->passPort.'</td>
                    <td class="userManager_table-content grid__column-10-1">
                        <div class="userManager_table-content--change">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <div class="userManager_table-content--detele">
                            <i class="fa-sharp fa-solid fa-trash"></i>
                        </div>
                    </td>
                </tr>
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