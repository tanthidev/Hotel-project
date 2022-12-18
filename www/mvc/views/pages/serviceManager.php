
<div id="container__serviceManager" class="container__serviceManager">
<?php 
        $services = json_decode($data['services']);
    ?>
    <!--  -->
    <table class="projects-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME SERVICE</th>
                <th>PRICE</th>
                <th>DESCRIBE</th>
                <th>UNIT</th>
                <th></th>
            </tr>
        </thead>
        
        <?php 
            foreach($services as $service){
                echo '
                <tr>
                        <td>
                            <p>'.$service->serviceID.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p>'.$service->nameService.'</p>
                            <p></p>
                        </td>
                        <td class="member">
                            <div class="member-info">
                                <p>'.$service->price.'</p>
                                <p></p>
                            </div>
                        </td>
                        <td>
                            <p>'.$service->describe.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p>'.$service->unit.'</p>
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