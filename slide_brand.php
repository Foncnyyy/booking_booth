    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <?php
            $i=0;
            $sql ="SELECT * FROM tb_brandner order by b_list";
            $query = mysqli_query($conn,$sql);
            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
            {   
                $actives='';
                if($i==0){
                    $actives='active';
                }     
                ?>  
                <li data-target="#carousel-example-1z" data-slide-to="<?php echo $i;?>" class="<?php echo $actives;?>"></li>                           
            <?php 
            $i++; 
            }
            ?> 
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php 
            $i=0;
            $sql ="SELECT * FROM tb_brandner order by b_list";
            $query = mysqli_query($conn,$sql);
            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
            { 
                $actives='';
                if($i==0){
                    $actives='active';
                }  
            ?> 
                <div class="carousel-item <?php echo $actives;?>">           
                    <img class="d-block w-100" src="Image_Brand/<?php echo $result['b_image']; ?>" alt="">                                          
                </div> 
            <?php 
            $i++;
            }
            ?>            
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->