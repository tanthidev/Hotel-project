
<div id="container__serviceManager" class="container__serviceManager">
<?php 
        $services = json_decode($data['services']);
    ?>
    <table class="serviceManager__table">
        <tr class="serviceManager_table-header">
            <th class="serviceManager_table-header-item serviceManager_table-header--id grid__column-10-1">ID</th>
            <th class="serviceManager_table-header-item grid__column-10-2">NAME SERVICE</th>
            <th class="serviceManager_table-header-item grid__column-10-1">PRICE</th>
            <th class="serviceManager_table-header-item grid__column-10-2">DESCRIBE</th>
            <th class="serviceManager_table-header-item grid__column-10-1">UNIT</th>
            <th class="serviceManager_table-header-item grid__column-10-1">ACTION</th>
        </tr>
        
        <?php 
            foreach ($services as $service) {
                echo '
                <tr class="serviceManager_table-row">
                    <td class="serviceManager_table-content serviceManager_table-header--id grid__column-10-1" class="grid__column-10-1">'.$service->serviceID.'</td>
                    <td class="serviceManager_table-content grid__column-10-2">'.$service->nameService.'</td>
                    <td class="serviceManager_table-content grid__column-10-1">'.$service->price.'</td>
                    <td class="serviceManager_table-content grid__column-10-2">'.$service->describe.'</td>
                    <td class="serviceManager_table-content grid__column-10-1">'.$service->unit.'</td>
                    <td class="serviceManager_table-content grid__column-10-1">
                        <div class="serviceManager_table-content--change">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <div class="serviceManager_table-content--detele">
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
                    <a href="/admin/serviceManager/?page='.$i.'" class="btn__controller-page">
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