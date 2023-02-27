<?php
                    mysql_query ("set character_set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
                    //get coachwork options
                    $q3 = mysql_query ("select * from cat order by 1 ");
                    echo "<td colspan='6'>";
                    $cond = str_replace(",", ", ", "$coach_work_cond");
                    $vc_id = 1;
                    while ($r3 = mysql_fetch_row($q3)) {
                        echo "<div style='float:left;width=:30%;padding:0px;'>";
                        echo "<h2>$r3[1].</h2>";
                        $c_id = $r3[0];
                        //get all questions under this section
                        $q4 = mysql_query("SELECT b.condition_name,b.id,detail_ans,c.report_id FROM cat a, conditions b,details c
where a.id = b.cat_id and b.id = c.detail_id
and c.detail_id = '$reg_no' and a.id =  '$c_id' GROUP BY b.id");
                       
                        $float = 1;$x='i';$checked='';
                        while ($r4 = mysql_fetch_row($q4)) {
                            echo "<div  style='background-color:#e5e5e5;float:left;margin:5px;width:300px;color:#000;padding:5px;border-radius:5px;'>";
                            echo "<b>".$r4[0]."?</b><br/>";
                            if ($r4[2] === 'y') {
                                echo "<input type='radio' name='$r4[1]'  value='y'  ";   
                                echo "checked = 'checked' >Yes </input>";
                                echo "<input type='radio' name='$r4[1]'  value='n'  ";   
                                echo " >No </input>";
                               
                            } else {
                                echo "<input type='radio' name='$r4[1]'  value='y'  ";   
                                echo ">Yes </input>";
                                echo "<input type='radio' name='$r4[1]'  value='n'  ";   
                                echo "checked = 'checked'  >No </input>";
                            }
                           
                            echo "$r4[1].$r4[2]</br class='clear_float'>";
                            $float++;$vc_id++;
                            echo "</div>";
                        }
                        echo "</br class='clear_float'>";
                    }
                    echo "</td>";
                ?>
