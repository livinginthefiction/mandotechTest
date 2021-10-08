<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5>User List</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">user</a></li>
							<li class="breadcrumb-item"><a href="#!">User list</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card user-profile-list">
					<div class="card-body">
						<form action="<?= base_url('deductions/addDeductions/'.$id) ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group fill">
                    <label for="amount">Deduction Amount</label>
                    <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required>
                </div>
							</div>
							<div class="col-md-6">
								<div class="form-group fill">
                    <label for="salary">Deduction from Salary</label>
                    <select name="salaryId" class="form-control" id="salary">
                        <?php foreach ($salarylog as $key => $value) {echo "<option value='".$value['id']."'>".$value['salaryDate']."</option>";} ?>
                    </select>
                </div>
							</div>
							<div class="col-lg-12">
							<div class="form-group">
                <label for="exampleFormControlTextarea1">Deduction Type</label>
                  <textarea name="deductions" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	              </div>
	              </div>
	              <div class="col-lg-12">
	              <center>
        	<button type="submit" class="btn btn-primary">Submit</button>
	    </center></div>
						</div>
					</form>
						<div class="dt-responsive table-responsive">
							<table id="user-list-table" class="table nowrap">
								<thead>
									<tr>
										<th>Id</th>
										<th>Deductions</th>
										<th>Amount</th>
										<th>Created On</th>
										<th>From Salary</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($deductionsList)) {
												foreach ($deductionsList as $key => $value) { ?>
									<tr>
										<td><?= $key+1 ?></td>
										<td>
											<div class="d-inline-block align-middle">
												<div class="d-inline-block">
													<h6 class="m-b-0"><?= $value['deductions'] ?></h6>
												</div>
											</div>
										</td>
										<td><?= $value['amount'] ?></td>
										<td><?= $value['creationTime'] ?></td>
										<td><?= $value['salaryDate'] ?></td>
										<td>
											<span class="badge <?= ($value['status']==1) ? 'badge-light-success' : 'badge-light-danger' ; ?> "><?= ($value['status']==1) ? 'Active' : 'Disabled' ; ?></span>
											<div class="overlay-edit">
												<a href="<?= base_url('deductions/toggleStatus?id='.$value['id']) ?>">
													<button type="button" class="btn btn-icon <?= ($value['status']==1) ? 'btn-danger' : 'btn-success' ; ?>">
														<i class="feather <?= ($value['status']==1) ? 'icon-trash-2' : 'icon-check-circle' ; ?> "></i>
													</button>
												</a>
												<!-- <a href="<?= base_url('deductions?id='.$value['id']) ?>">
													<button type="button" class="btn btn-icon btn-info">
														<i class="feather icon-check-square "></i>
													</button>
												</a> -->
											</div>
										</td>
									</tr>
									<?php } } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>Job Title</th>
										<th>Salary</th>
										<th>Date of Birth</th>
										<th>Joining Date</th>
										<th>Status</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
<!-- [ Main Content ] end -->


<!-- [ Modal ] start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Salary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= base_url('dashboard/generateSalary') ?>" method="post">
      	<div class="form-group fill">
	        <input type="date" class="form-control" placeholder="date" name="date" required="">
	    </div>
	    <center>
        	<button type="submit" class="btn btn-primary">Submit</button>
	    </center>
		</form>
      </div>
    </div>
  </div>
</div>
<!-- [ Modal ] end -->


