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
            <div class="card mt-4">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="card-title fw-bold">Letter List View</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Exam Name</th>
                                            <td><?= $admin['subjectline'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Speed Post</th>
                                            <td><?= $admin['speedpost'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Start Date</th>
                                            <td><?= $admin['startdate'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td><?= $admin['enddate'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Signature</th>
                                            <td><?= $admin['name_designation_mobile'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>