<div id="container__userManager" class="container__userManager">
    <?php 
        $users = json_decode($data['fullUser']);
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
                    <td class="userManager_table-content grid__column-10-1">AAA</td>
                </tr>
                ';
              }
        ?>
    </table>
</div>