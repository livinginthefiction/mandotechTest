<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Reports</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->            
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-users f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Employee Below 30</h6>
                                <h2 class="m-b-0"><?= (!empty($employeeAgeGroupList['below30'])) ? $employeeAgeGroupList['below30'] : 0 ; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-users f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Employee Between 30-40</h6>
                                <h2 class="m-b-0"><?= (!empty($employeeAgeGroupList['bet3040'])) ? $employeeAgeGroupList['bet3040'] : 0 ; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-users f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Employee Above 40</h6>
                                <h2 class="m-b-0"><?= (!empty($employeeAgeGroupList['above40'])) ? $employeeAgeGroupList['above40'] : 0 ; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="feather icon-file-text f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Yearly Salary</h6>
                                <h2 class="m-b-0"><?= (!empty($employeeAgeGroupList['yearlySalary'])) ? $employeeAgeGroupList['yearlySalary']-$employeeAgeGroupList['yearlydeducts'] : 0 ; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="feather icon-file-text f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Yearly Deducts</h6>
                                <h2 class="m-b-0"><?= (!empty($employeeAgeGroupList['yearlydeducts'])) ? $employeeAgeGroupList['yearlydeducts'] : 0 ; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- Zero config table start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Monthly Salary Report</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Total Salary</th>
                                        <th>Deductions</th>
                                        <th>Effective Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($monthlysalary as $key => $value) { ?>
                                    <tr>
                                        <th><?= $value['Month'] ?></th>
                                        <th><?= $value['salary'] ?></th>
                                        <th><?= $value['deductions'] ?></th>
                                        <th><?= $value['salary']-$value['deductions'] ?></th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                     <tr>
                                        <th>Month</th>
                                        <th>Total Salary</th>
                                        <th>Deductions</th>
                                        <th>Effective Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero config table end -->
 <!-- Zero config table start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Monthly Deductions Report</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable2" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Deductions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($monthlydeduct as $key => $value) { ?>
                                    <tr>
                                        <th><?= $value['Month'] ?></th>
                                        <th><?= $value['deducts'] ?></th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                     <tr>
                                        <th>Month</th>
                                        <th>Deductions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero config table end -->
    <!-- [ Main Content ] end -->

</div>