<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_username')){
    
     

    function get_username($id){
        $CI =& get_instance();
        $CI->db->select('first_name, last_name');
        $CI->db->from('users');
        $CI->db->where('id',$id);   
        $query = $CI->db->get();
        $user = $query->result();
        return $user['0']->first_name." ".$user['0']->last_name;
    }

}

    function get_useremail($id){
        $CI =& get_instance();
        $CI->db->select('email');
        $CI->db->from('users');
        $CI->db->where('id',$id);   
        $query = $CI->db->get();
        $user = $query->result();
        return $user['0']->email;
    }

    function get_form_name($id){
        $CI =& get_instance();
        $CI->db->select('name');
        $CI->db->from('from');
        $CI->db->where('id',$id);   
        $query = $CI->db->get();
        $form = $query->result();
        return $form['0']->name;
    }


    function get_all_user() {
        
        $CI =& get_instance();
        $CI->db->select("u.*, g.group_id");
        $where = "g.group_id = 1";
        $CI->db->where($where);
        $CI->db->where("active = 1");
        $CI->db->join('users_groups as g', "g.user_id = u.id", 'left');
        $data = $CI->db->get( 'users as u')->result();
        return $data;
    }

    function get_all_client() {
        
        $CI =& get_instance();
        $CI->db->select("u.*, g.group_id");
        $where = "g.group_id = 3";
        $CI->db->where($where);
        $CI->db->where("active = 1");
        $CI->db->join('users_groups as g', "g.user_id = u.id", 'left');
        $data = $CI->db->get( 'users as u')->result();
        return $data;
    }

    function get_all_inspector() {
        
        $CI =& get_instance();
        $CI->db->select("u.*, g.group_id");
        $where = "g.group_id = 2";
        $CI->db->where($where);
        $CI->db->where("active = 1");
        $CI->db->join('users_groups as g', "g.user_id = u.id", 'left');
        $data = $CI->db->get( 'users as u')->result();
        return $data;
    }

    function get_total_inspection($id){
        
        $CI =& get_instance();
        $CI->db->select("count(*) as total_inspections");
        $CI->db->from('inspection');
        
        $CI->db->where('inspector_id', $id);
        $CI->db->where("deleted","0");
        $CI->db->order_by("id","asc");
        $query = $CI->db->get();
        $result =  $query->result();

        return $result[0]->total_inspections;

    }

    function get_pending_inspection($id){
        
        $CI =& get_instance();
        $CI->db->select("count(*) as pending_inspections");
        $CI->db->from('inspection');
        
        $CI->db->where('inspector_id', $id);
        $CI->db->where('status', '0');
        $CI->db->where("deleted","0");
        $CI->db->order_by("id","asc");
        $query = $CI->db->get();
        $result =  $query->result();

        return $result[0]->pending_inspections;

    }
    

    function uk_date($mysql_date) {
        $mysql_date = strtotime($mysql_date);
        $us_date  = date("d M, Y", $mysql_date);
        return $us_date;
    }

    function uk_datetime($mysql_date) {
        $mysql_date = strtotime($mysql_date);
        $us_date  = date("d M, Y - h:i:s A", $mysql_date);
        return $us_date;
    }

    function mysqldate($date){
        $date = $date/1000;
        //$mysqldate =  strtotime($date);
        $mysqldate = date("Y-m-d", $date );
        return $mysqldate;
    }

    function add7days($date){
        $date = $date/1000;
        $date = strtotime("+7 day", $date);
        //$mysqldate =  strtotime($date);
        $mysqldate = date("Y-m-d", $date );
        return $mysqldate;
    }

    function update_inspection_status($eform_id) {
        
        /************* First Get Inspection ID of this eform with this eform id ******************/
        $CI =& get_instance();
        $CI->db->select("inspection_id");
        $where = "id = ".$eform_id;
        $CI->db->where($where);

        $data = $CI->db->get( 'eform')->result();
        $inspection_id = $data[0]->inspection_id;

        echo "<br>Inspection Id ".$inspection_id;

        /************* Now Get total eform with this isnpection Id ******************/ 

        $CI1 =& get_instance();
        
        $where = "inspection_id = ".$inspection_id;
        $CI1->db->where($where);
        $CI1->db->from('eform');

        echo "<BR> Total Count with this Eform ";
        $total_count  = $CI1->db->count_all_results();
        echo $total_count;


    /************* Now Get total client signedt eform with this isnpection Id ******************/ 

        $CI2 =& get_instance();
        
        $where = "inspection_id = ".$inspection_id;
        

        $CI2->db->where($where);
        $CI2->db->where("client_status = '1' ");
        $CI2->db->from('eform');

        echo "<BR> Total Count Signed Document ";
        $signed_count  = $CI2->db->count_all_results();
        echo $signed_count;

    /***************  Now Update Inspection Status ***************************/
        /*** Check if all form are signed Update Inspection Status  ******/ 
        if($signed_count == $total_count) {
            $CI2 =& get_instance();
            $CI3 =& get_instance();
            $table_data = array('status' => '1'  );
            $CI3->db->where('id', $inspection_id);
            $CI3->db->update('inspection', $table_data);
        

        }



    }



/**
* this function will be used to Convert the USA date formate to MYSQL date formate
* @param string     ($datestring) 
* @param boolean    ($on_empty_current) 
* @return date in MYSQL formate
*/ 
if(! function_exists("convert_date_usa_to_mysql"))
{
    function convert_date_usa_to_mysql($datestring,$on_empty_current=false)
    {
        
        if(trim($datestring)=='' && $on_empty_current==true)
            return date('Y-m-d');
        else if(trim($datestring)=='' && $on_empty_current==false)
            return "";
        else
            return date("Y-m-d", strtotime(str_replace('/', '-', $datestring)));
        
    }
}


/**
* this function will be used to fetch the project information
* @param string     ($datestring)
* @return date in USA formate
*/ 
if(! function_exists("convert_date_mysql_to_usa"))
{
    function convert_date_mysql_to_usa($datestring)
    {
        if($datestring=='')
        return '';
        else
        return date("d M, Y", strtotime(str_replace('/', '-', $datestring)));
        
    }
}


function show_status($status){
        if($status == 0 ){
            return '<i class="glyphicon glyphicon-remove-circle  red"></i>';
        } elseif($status == 2){
            return '<i class="glyphicon glyphicon-warning-sign  yellow"></i>';
        }else {
            return '<i class="glyphicon glyphicon-ok green"></i>';
        }
    }


function make_detail($id){
        return get_username($id)." / ID : ".$id."";
    }


function get_form_list($ids){
        $ids_array = explode(",", $ids);
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('form');
        $CI->db->where_in('id',$ids_array);   
        $query = $CI->db->get();
        $form_list = $query->result();
        return $form_list;
    }


function count_inspections($user_id){

        $CI =& get_instance();
        $CI->db->select("count(*) as inspections");
        $CI->db->from('inspection');
        
        $CI->db->where('client_id', $user_id);
        $CI->db->where("deleted","0");
        $CI->db->order_by("id","asc");
        $query = $CI->db->get();
        $result =  $query->result();

        return $result[0]->inspections;
    }


    function markable_image($sr, $eform_data) {  ?>

            <div class="markable_image_container">
                <div class="markable_image" sr="<?php echo $sr; ?>" style='background-image: url("<?php echo base_url(); ?>assets/themes/default/img/form_image/<?php echo $sr; ?>.png");'>

                

                
                <?php if(isset($eform_data)) { ?>   
                <?php if(array_key_exists('x',$eform_data)) { ?>
                        
                    <?php if(array_key_exists($sr,$eform_data['x'])) {
                        //echo "x <br>";
                        //print_r($eform_data['x'][$sr]);
                        //echo "x <br>";
                        //print_r($eform_data['x'][$sr]); 

                        //echo "SIze : ";
                        //echo sizeof($eform_data['x'][$sr]);

                        for($i=0; $i<sizeof($eform_data['x'][$sr]); $i++) {
                            //form_hidden("x[".$sr."][".$i."]",$eform_data['x'][$sr][$i]); ?>
                            <input type='hidden' class="name_x" name='x[<?php echo $sr; ?>][<?php echo $i; ?>]' value='<?php echo $eform_data['x'][$sr][$i];  ?>'>
                            <input type='hidden' class="name_y" name='y[<?php echo $sr; ?>][<?php echo $i; ?>]' value='<?php echo $eform_data['y'][$sr][$i];  ?>'>
                            
                            <img src="<?php echo base_url(); ?>assets/themes/default/img/marker.png" class="marker"
                            style="position: absolute; top:<?php echo $eform_data['y'][$sr][$i]; ?>px; left:<?php echo $eform_data['x'][$sr][$i];  ?>px;">


                        <?php } ?>



                         
                    <?php } ?>


                     
                <?php }} ?>
                
                </div>

                
                <a href="#" class="btn btn-info remover_marker">Clear</a>
            </div>
    <?php }  function markable_image_pdf($sr, $eform_data) {  ?>

            <div class="markable_image_container">
                <div class="markable_image" sr="<?php echo $sr; ?>" style='background-image: url("<?php echo base_url(); ?>assets/themes/default/img/form_image/<?php echo $sr; ?>.png");'>

                

                

                <?php if(array_key_exists('x',$eform_data)) { ?>
                        
                    <?php if(array_key_exists($sr,$eform_data['x'])) {
                        //echo "x <br>";
                        //print_r($eform_data['x'][$sr]);
                        //echo "x <br>";
                        //print_r($eform_data['x'][$sr]); 

                        //echo "SIze : ";
                        //echo sizeof($eform_data['x'][$sr]);

                        for($i=0; $i<sizeof($eform_data['x'][$sr]); $i++) {
                            //form_hidden("x[".$sr."][".$i."]",$eform_data['x'][$sr][$i]); ?>
                            <input type='hidden' class="name_x" name='x[<?php echo $sr; ?>][<?php echo $i; ?>]' value='<?php echo $eform_data['x'][$sr][$i];  ?>'>
                            <input type='hidden' class="name_y" name='y[<?php echo $sr; ?>][<?php echo $i; ?>]' value='<?php echo $eform_data['y'][$sr][$i];  ?>'>
                            
                            <img src="<?php echo base_url(); ?>assets/themes/default/img/marker.png" class="marker"
                            style="position: absolute; top:<?php echo $eform_data['y'][$sr][$i]; ?>px; left:<?php echo $eform_data['x'][$sr][$i];  ?>px;">

                            
                        <?php } ?>



                         
                    <?php } ?>


                     
                <?php } ?>
                
                </div>

                
               
            </div>

    <?php } 

     function create_row_pdf($sr,$rows, $description,$eform_data) {  ?>


            <?php if($rows == 1 ) { ?> 



                <tr>
                    <td rowspan="2">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][0].'</div>';
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][1].'</div>';

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo @$eform_data['description'][$sr];

                            }
                        ?>
                    </td>
                    <td rowspan="2"><?php echo $sr; ?>A</td>
                    <td rowspan="2"><?php  echo @$eform_data['mpi'][$sr]; ?></td>
                    <td rowspan="2"><?php  echo @$eform_data['visual'][$sr]; ?></td>
                    <td rowspan="2"><?php  echo @$eform_data['inspector_profile'][$sr]; ?></td>
                    <td rowspan="2"><?php  echo @$eform_data['inspector_comment'][$sr]; ?></td>
                    <td rowspan="2" width="370px"><?php echo markable_image_pdf($sr, $eform_data); ?></td>
                    <td rowspan="2"><?php echo $sr; ?>A</td>
                    <td rowspan="2"><?php  echo @$eform_data['sdi_qc_profile'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['qc_pass'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['qc_fail'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['initials'][$sr]; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <br><hr>
                        <?php  echo @$eform_data['comments'][$sr]; ?>
                    </td>
                </tr>
            <?php  } else if($rows == 2 ) { ?> 

                <tr>
                    <td rowspan="2">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][0].'</div>';
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][1].'</div>';

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo @$eform_data['description'][$sr];

                            }
                        ?>
                    </td>
                    <td><?php echo $sr; ?>A</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][0]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][0]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][0]; ?></td>
                    <td rowspan="2"><?php  echo @$eform_data['inspector_comment'][$sr]; ?></td>
                    <td rowspan="2" width="370px"><?php echo markable_image_pdf($sr, $eform_data); ?></td>
                    <td><?php echo $sr; ?>A</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][0]; ?>
                    </td>
                    <td><?php  echo @$eform_data['qc_pass'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['qc_fail'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['initials'][$sr]; ?></td>

                </tr>
                <tr>
                    <td><?php echo $sr; ?>B</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][1]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][1]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][1]; ?></td>
                    <td><?php echo $sr; ?>B</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][1]; ?>
                    </td>

                    <td colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <br><hr>
                        <?php  echo @$eform_data['comments'][$sr]; ?>
                    </td>
                </tr>

            <?php } else if($rows == 3 ) { ?> 

                <tr>
                    <td rowspan="3">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][0].'</div>';
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][1].'</div>';

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo @$eform_data['description'][$sr];

                            }
                        ?>
                    </td>
                    <td><?php echo $sr; ?>A</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][0]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][0]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][0]; ?></td>
                    <td rowspan="3"><?php  echo @$eform_data['inspector_comment'][$sr]; ?></td>
                    <td rowspan="3" width="370px"><?php echo markable_image_pdf($sr, $eform_data); ?></td>
                    <td><?php echo $sr; ?>A</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][0]; ?>
                    </td>
                    <td><?php  echo @$eform_data['qc_pass'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['qc_fail'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['initials'][$sr]; ?></td>

                </tr>
                <tr>
                    <td><?php echo $sr; ?>B</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][1]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][1]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][1]; ?></td>
                    <td><?php echo $sr; ?>B</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][1]; ?>
                    </td>

                    <td rowspan="2" colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <br><hr>
                        <?php  echo @$eform_data['comments'][$sr]; ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo $sr; ?>C</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][2]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][2]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][2]; ?></td>
                    <td><?php echo $sr; ?>C</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][2]; ?>
                    </td>

                    
                </tr>

            <?php } else if($rows == 4 ) { ?> 

                <tr>
                    <tr>
                    <td rowspan="4">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][0].'</div>';
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo '<div class="value_box" >'.@$eform_data['description'][$sr][1].'</div>';

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo @$eform_data['description'][$sr];

                            }
                        ?>
                    </td>
                    <td><?php echo $sr; ?>A</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][0]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][0]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][0]; ?></td>
                    <td rowspan="4"><?php  echo @$eform_data['inspector_comment'][$sr]; ?></td>
                    <td rowspan="4" width="370px"><?php echo markable_image_pdf($sr, $eform_data); ?></td>
                    <td><?php echo $sr; ?>A</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][0]; ?>
                    </td>
                    <td><?php  echo @$eform_data['qc_pass'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['qc_fail'][$sr]; ?></td>
                    <td><?php  echo @$eform_data['initials'][$sr]; ?></td>

                </tr>
                <tr>
                    <td><?php echo $sr; ?>B</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][1]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][1]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][1]; ?></td>
                    <td><?php echo $sr; ?>B</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][1]; ?>
                    </td>

                    <td rowspan="3" colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <br><hr>
                        <?php  echo @$eform_data['comments'][$sr]; ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo $sr; ?>C</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][2]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][2]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][2]; ?></td>
                    <td><?php echo $sr; ?>C</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][2]; ?>
                    </td>

                    
                </tr>

                <tr>
                    <td><?php echo $sr; ?>D</td>
                    <td><?php  echo @$eform_data['mpi'][$sr][3]; ?></td>
                    <td><?php  echo @$eform_data['visual'][$sr][3]; ?></td>
                    <td><?php  echo @$eform_data['inspectr_profile'][$sr][3]; ?></td>
                    <td><?php echo $sr; ?>D</td>
                    <td>
                        <?php  echo @$eform_data['sdi_qc_profile'][$sr][3]; ?>
                    </td>

                    
                </tr>
            <?php } ?>





    <?php } 



     function create_row($sr,$rows, $description,$eform_data) {  ?>


            <?php if($rows == 1 ) { ?> 



                <tr>
                    <td rowspan="2">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.'][0]',set_value('description', @$eform_data['description'][$sr][0]),'class="eform-control3" style="height: 62px;"');
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo form_input('description['.$sr.'][1]',set_value('description', @$eform_data['description'][$sr][1]),'class="eform-control3" style="height: 62px;"');

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.']',set_value('description', @$eform_data['description'][$sr]),'class="eform-control3" style="height: 62px;"');

                            }
                        ?>
                    </td>
                    <td rowspan="2"><?php echo $sr; ?>A</td>
                    <td rowspan="2"><?php  echo form_input('mpi['.$sr.']',set_value('mpi', @$eform_data['mpi'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td rowspan="2"><?php  echo form_input('visual['.$sr.']',set_value('visual', @$eform_data['visual'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td rowspan="2"><?php  echo form_input('inspector_profile['.$sr.']',set_value('inspector_profile', @$eform_data['inspector_profile'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td rowspan="2"><?php  echo form_input('inspector_comment['.$sr.']',set_value('inspector_comment', @$eform_data['inspector_comment'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td rowspan="2" width="370px"><?php echo markable_image($sr, $eform_data); ?></td>
                    <td rowspan="2"><?php echo $sr; ?>A</td>
                    <td rowspan="2"><?php  echo form_input('sdi_qc_profile['.$sr.']',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td><?php  echo form_input('qc_pass['.$sr.']',set_value('qc_pass', @$eform_data['qc_pass'][$sr]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('qc_fail['.$sr.']',set_value('qc_fail', @$eform_data['qc_fail'][$sr]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('initials['.$sr.']',set_value('initials', @$eform_data['initials'][$sr]),'class="eform-control2" style="height: 100px;"'); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <?php  echo form_input('comments['.$sr.']',set_value('comments', @$eform_data['comments'][$sr]),'class="eform-control3" style="height: 62px;"'); ?>
                    </td>
                </tr>
            <?php  } else if($rows == 2 ) { ?> 

                <tr>
                    <td rowspan="2">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.'][0]',set_value('description', @$eform_data['description'][$sr][0]),'class="eform-control3" style="height: 62px;"');
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo form_input('description['.$sr.'][1]',set_value('description', @$eform_data['description'][$sr][1]),'class="eform-control3" style="height: 62px;"');

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.']',set_value('description', @$eform_data['description'][$sr]),'class="eform-control3" style="height: 62px;"');

                            }
                        ?>
                    </td>
                    <td><?php echo $sr; ?>A</td>
                    <td><?php  echo form_input('mpi['.$sr.'][0]',set_value('mpi', @$eform_data['mpi'][$sr][0]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][0]',set_value('visual', @$eform_data['visual'][$sr][0]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][0]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][0]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td rowspan="2"><?php  echo form_input('inspector_comment['.$sr.']',set_value('inspector_comment', @$eform_data['inspector_comment'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td rowspan="2" width="370px"><?php echo markable_image($sr, $eform_data); ?></td>
                    <td><?php echo $sr; ?>A</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][0]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][0]),'class="eform-control2" style="height: 100px;"'); ?>
                    </td>
                    <td><?php  echo form_input('qc_pass['.$sr.']',set_value('qc_pass', @$eform_data['qc_pass'][$sr]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('qc_fail['.$sr.']',set_value('qc_fail', @$eform_data['qc_fail'][$sr]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('initials['.$sr.']',set_value('initials', @$eform_data['initials'][$sr]),'class="eform-control2" style="height: 100px;"'); ?></td>

                </tr>
                <tr>
                    <td><?php echo $sr; ?>B</td>
                    <td><?php  echo form_input('mpi['.$sr.'][1]',set_value('mpi', @$eform_data['mpi'][$sr][1]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][1]',set_value('visual', @$eform_data['visual'][$sr][1]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][1]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][1]),'class="eform-control2" style="height: 100px;"'); ?></td>
                    <td><?php echo $sr; ?>B</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][1]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][1]),'class="eform-control2" style="height: 100px;"'); ?>
                    </td>

                    <td colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <?php  echo form_input('comments['.$sr.']',set_value('comments', @$eform_data['comments'][$sr]),'class="eform-control3" style="height: 62px;"'); ?>
                    </td>
                </tr>

            <?php } else if($rows == 3 ) { ?> 

                <tr>
                    <td rowspan="3">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.'][0]',set_value('description', @$eform_data['description'][$sr][0]),'class="eform-control3" style="height: 62px;"');
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo form_input('description['.$sr.'][1]',set_value('description', @$eform_data['description'][$sr][1]),'class="eform-control3" style="height: 62px;"');

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.']',set_value('description', @$eform_data['description'][$sr]),'class="eform-control3" style="height: 62px;"');

                            }
                        ?>
                    </td>
                    <td><?php echo $sr; ?>A</td>
                    <td><?php  echo form_input('mpi['.$sr.'][0]',set_value('mpi', @$eform_data['mpi'][$sr][0]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][0]',set_value('visual', @$eform_data['visual'][$sr][0]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][0]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][0]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td rowspan="3"><?php  echo form_input('inspector_comment['.$sr.']',set_value('inspector_comment', @$eform_data['inspector_comment'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td rowspan="3" width="370px"><?php echo markable_image($sr, $eform_data); ?></td>
                    <td><?php echo $sr; ?>A</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][0]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][0]),'class="eform-control2" style="height: 70px;"'); ?>
                    </td>
                    <td><?php  echo form_input('qc_pass['.$sr.']',set_value('qc_pass', @$eform_data['qc_pass'][$sr]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('qc_fail['.$sr.']',set_value('qc_fail', @$eform_data['qc_fail'][$sr]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('initials['.$sr.']',set_value('initials', @$eform_data['initials'][$sr]),'class="eform-control2" style="height: 70px;"'); ?></td>

                </tr>
                <tr>
                    <td><?php echo $sr; ?>B</td>
                    <td><?php  echo form_input('mpi['.$sr.'][1]',set_value('mpi', @$eform_data['mpi'][$sr][1]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][1]',set_value('visual', @$eform_data['visual'][$sr][1]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][1]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][1]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php echo $sr; ?>B</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][1]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][1]),'class="eform-control2" style="height: 70px;"'); ?>
                    </td>

                    <td rowspan="2" colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <?php  echo form_input('comments['.$sr.']',set_value('comments', @$eform_data['comments'][$sr]),'class="eform-control3" style="height: 100px;"'); ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo $sr; ?>C</td>
                    <td><?php  echo form_input('mpi['.$sr.'][2]',set_value('mpi', @$eform_data['mpi'][$sr][2]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][2]',set_value('visual', @$eform_data['visual'][$sr][2]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][2]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][2]),'class="eform-control2" style="height: 70px;"'); ?></td>
                    <td><?php echo $sr; ?>C</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][2]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][2]),'class="eform-control2" style="height: 70px;"'); ?>
                    </td>

                    
                </tr>

            <?php } else if($rows == 4 ) { ?> 

                <tr>
                    <tr>
                    <td rowspan="4">
                        <?php 
                            $desc = explode(",", $description);
                            if(sizeof($desc) == 2){
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.'][0]',set_value('description', @$eform_data['description'][$sr][0]),'class="eform-control3" style="height: 62px;"');
                                echo '<label class = "eform-label">'.$desc['1']."</label>";
                                echo form_input('description['.$sr.'][1]',set_value('description', @$eform_data['description'][$sr][1]),'class="eform-control3" style="height: 62px;"');

                            }
                            else{
                                echo '<label class = "eform-label">'.$desc['0']."</label>";
                                echo form_input('description['.$sr.']',set_value('description', @$eform_data['description'][$sr]),'class="eform-control3" style="height: 62px;"');

                            }
                        ?>
                    </td>
                    <td><?php echo $sr; ?>A</td>
                    <td><?php  echo form_input('mpi['.$sr.'][0]',set_value('mpi', @$eform_data['mpi'][$sr][0]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][0]',set_value('visual', @$eform_data['visual'][$sr][0]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][0]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][0]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td rowspan="4"><?php  echo form_input('inspector_comment['.$sr.']',set_value('inspector_comment', @$eform_data['inspector_comment'][$sr]),'class="eform-control2" style="height: 200px;"'); ?></td>
                    <td rowspan="4" width="370px"><?php echo markable_image($sr, $eform_data); ?></td>
                    <td><?php echo $sr; ?>A</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][0]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][0]),'class="eform-control2" style="height: 50px;"'); ?>
                    </td>
                    <td><?php  echo form_input('qc_pass['.$sr.']',set_value('qc_pass', @$eform_data['qc_pass'][$sr]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('qc_fail['.$sr.']',set_value('qc_fail', @$eform_data['qc_fail'][$sr]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('initials['.$sr.']',set_value('initials', @$eform_data['initials'][$sr]),'class="eform-control2" style="height: 50px;"'); ?></td>

                </tr>
                <tr>
                    <td><?php echo $sr; ?>B</td>
                    <td><?php  echo form_input('mpi['.$sr.'][1]',set_value('mpi', @$eform_data['mpi'][$sr][1]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][1]',set_value('visual', @$eform_data['visual'][$sr][1]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][1]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][1]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php echo $sr; ?>B</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][1]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][1]),'class="eform-control2" style="height: 50px;"'); ?>
                    </td>

                    <td rowspan="3" colspan="3">
                        <label class = "eform-label">Comments.: </label>
                        <?php  echo form_input('comments['.$sr.']',set_value('comments', @$eform_data['comments'][$sr]),'class="eform-control3" style="height: 100px;"'); ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo $sr; ?>C</td>
                    <td><?php  echo form_input('mpi['.$sr.'][2]',set_value('mpi', @$eform_data['mpi'][$sr][2]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][2]',set_value('visual', @$eform_data['visual'][$sr][2]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][2]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][2]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php echo $sr; ?>C</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][2]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][2]),'class="eform-control2" style="height: 50px;"'); ?>
                    </td>

                    
                </tr>

                <tr>
                    <td><?php echo $sr; ?>D</td>
                    <td><?php  echo form_input('mpi['.$sr.'][3]',set_value('mpi', @$eform_data['mpi'][$sr][3]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('visual['.$sr.'][3]',set_value('visual', @$eform_data['visual'][$sr][3]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php  echo form_input('inspectr_profile['.$sr.'][3]',set_value('inspectr_profile', @$eform_data['inspectr_profile'][$sr][3]),'class="eform-control2" style="height: 50px;"'); ?></td>
                    <td><?php echo $sr; ?>D</td>
                    <td>
                        <?php  echo form_input('sdi_qc_profile['.$sr.'][3]',set_value('sdi_qc_profile', @$eform_data['sdi_qc_profile'][$sr][3]),'class="eform-control2" style="height: 50px;"'); ?>
                    </td>

                    
                </tr>
            <?php } ?>





    <?php } ?>