<?php //echo '<pre>';print_r($admin);exit;?>
<?php


            $sub_name =  explode(',',$admin['sub_name']);
            $exam_name =  explode(',',$admin['exam_name']);
            $no_candidate =  explode(',',$admin['no_candidate']);
            $shft_exam =  explode(',',$admin['shft_exam']);
            $date_exam =  explode(',',$admin['date_exam']);
            $time_exam =  explode(',',$admin['time_exam']);

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form css/dash.css">
    <style>
        .hed{
            text-align: right;
            text-decoration: none;
            font-weight: normal;
        }
    </style>
    
    
</head>
<body>
    <div class="content-wrapper" style="">
        
            <div class="row">
                <div class="col-12 mt-5">   
                    <p style="text-align: center;"><b><?= $admin['subjectline'] ?></b></p>
                </div>
            </div>
            <div class="row"> 
                <div class="col-12">   
                    <p style="text-align: center;"><b><?= trans('written_examination') ?></b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">   
                    <p style="text-align: center;"><b><?= trans('exam_schedule_vew') ?></b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table style="width:90%; margin-left: 5rem; border: 1px solid black; font-weight: normal !important; text-decoration:none;">
                            <tbody>
                                <tr>
                                    <th style="width:8%; padding:5px;  border: 1px solid black; ">S.No:</th>
                                    <th style="width:20%; padding:5px;  border: 1px solid black;">Subject Name</th>
                                    <!-- <th style="width:20%; padding:10px;  border: 1px solid black;">No. of Candidates</th> -->
                                    <th style="width:8%; padding:5px;  border: 1px solid black;">Exam Date</th>
                                    <th style="width:20%; padding:5px;  border: 1px solid black;">Exam Shift</th>
                                    <th style="width:20%; padding:5px;  border: 1px solid black;">Exam Time</th>
                                </tr>
                                <?php for($i=0; $i<count($sub_name);$i++) {  $a= $i+1 ;  ?>
                                <tr>
                                    <th style="width:8%; padding:5px; font-weight: normal !important; border: 1px solid black;"> <?php echo $a; ?> </th>
                                    <th style="width:20%; padding:5px;  font-weight: normal !important; border: 1px solid black;"><?php echo get_subject_name($sub_name[$i]) ?></th>
                                    <!-- <th style="width:20%; padding:10px;  border: 1px solid black;"><?php //echo $no_candidate[$i] ?></th> -->
                                    <th style="width:20%; padding:5px;  font-weight: normal !important; border: 1px solid black;"><?php echo $date_exam[$i] ?></th>
                                    <th style="width:8%; padding:5px;  font-weight: normal !important; border: 1px solid black;"><?php echo $shft_exam[$i] ?></th>
                                    <th style="width:20%; padding:5px;  font-weight: normal !important; border: 1px solid black;"><?php echo $time_exam[$i] ?></th>
            
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>


