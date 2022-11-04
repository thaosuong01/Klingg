<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $data['bill'] ?></h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo _WEB_ROOT . '/bill/list_bill' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo $data['product'] ?></h3>

                <p>All Product</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo _WEB_ROOT . '/product/list_product' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo $data['user'] ?></h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo _WEB_ROOT . '/user/list_user' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>$<?php echo number_format($data['totalBill'], 2) ?></h3>

                <p>Total revenue</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo _WEB_ROOT . '/bill/list_bill' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">

            <div class="card-body">
                <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart_cate" data-number='<?php echo $data['data_chart_cate'] ?>' data-chart='<?php echo $data["chart_cate"] ?>'></div>
                    <canvas id="myChart" style="max-width: 500px;"></canvas>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->


            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!--/.direct-chat -->

        <!-- TO DO List -->
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

        <!-- Calendar -->
        <div class="card bg-gradient-success">
            <div class="card-header border-0">

                <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a href="#" class="dropdown-item">Add new event</a>
                            <a href="#" class="dropdown-item">Clear events</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">View calendar</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- Map card -->
        <div class="card bg-gradient-primary">

            <div class="card-body">
            </div>

        </div>
        <!-- /.card -->

        <!-- solid sales graph -->
        <div class="card bg-gradient-info">
            <div class="card-header border-0">

            </div>
            <div class="card-body">

            </div>
        </div>
        <!-- /.card -->


        <!-- /.card -->
    </section>
    <!-- right col -->
</div>