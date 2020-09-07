<?php  
                                                $today = date('Y-m-d', time());
                                                // $today1=Date($today+ ' '+ '00:00:00');
                                                // $today2=Date($today+ ' '+ '59:59:59');
                                                $conn=mysqli_connect("localhost","root","","calendar");
                                                $query=mysqli_query($conn,"select * from events where start_event like '$today%'");
                                                
                                                while($data=mysqli_fetch_assoc($query)){
                                                    ?>

                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                   <?php    echo $data['title']; ?>
                                                    </h5>
                                                     <span class="time"><?php $date = new DateTime($data['start_event']);
                                                                            echo $date->format('H:i');
                                                                             ?></span>
                                                </div>
                                            </div>
                                           <?php
                                                }

                                            ?>