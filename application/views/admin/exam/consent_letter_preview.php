<?php //echo '<pre>';print_r($admin);exit;?>
<?php
    // $sub_name =  explode(',',$admin['sub_name']);
    // $exam_name =  explode(',',$admin['exam_name']);
    // $no_candidate =  explode(',',$admin['no_candidate']);
    // $shft_exam =  explode(',',$admin['shft_exam']);
    // $date_exam =  explode(',',$admin['date_exam']);
    // $time_exam =  explode(',',$admin['time_exam']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="form css/dash.css">
    <style>
        .hed {
            text-align: right;
            text-decoration: none;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">Letter List View</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-6">
                        <!-- <p style="margin-left: -30%;"><b><?= $admin['subjectline'] ?></b></p> -->
                        <!-- <p style="margin-left: -20%;"><b>Uttarakhand Combined State Engineering Service Exam-2021</b></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
        
                    </div>
                    <div class="col-6">
                        <p><b>Exam Name:-</b>&nbsp;
                            <?= $admin['subjectline'] ?>
                        </p>
                        <!-- <p style="margin-left: -10%;"><b><?php //echo trans('written_examination') ?></b></p> -->
                        <!-- <p style="margin-left: -10%;"><b>Written Examination (Objective Type)</b></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
        
                    </div>
                    <div class="col-6">
                        <p><b>Speed Post:-</b>&nbsp;
                            <?= $admin['speedpost'] ?>
                        </p>
                        <!-- <p style="margin-left: -10%;"><b><?php //echo trans('written_examination') ?></b></p> -->
                        <!-- <p style="margin-left: -10%;"><b>Written Examination (Objective Type)</b></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-6">
                        <p><b>Start Date:-</b>&nbsp;
                            <?= $admin['startdate'] ?>
                        </p>
                        <!-- <p style="margin-left: 3%;"><b><?php //echo trans('exam_schedule_vew') ?></b></p> -->
                        <!-- <p style="margin-left: 3%;"><b>Exam Schedule</b></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-6">
                        <p><b>End Date:-</b>&nbsp;
                            <?= $admin['enddate'] ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-6">
                        <p><b>Signature:-</b>&nbsp;
                            <?= $admin['name_designation_mobile'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>