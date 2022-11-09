<div class="content-wrapper">
	

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="consentTable">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Exam Name</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key=>$row){ ?> 
                                        <tr>
                                           <td><?php echo $key+1?></td>
                                           <td><a href="<?php echo site_url("admin/allocation_admin/downreportbutton/".urlencrypt($row['id'])); ?>" class="btn btn-sec" ><?php echo get_exam_name($row['exam_name']);?></a></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
</div>
