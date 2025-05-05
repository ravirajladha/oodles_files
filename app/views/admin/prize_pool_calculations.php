<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<?php $adminMod = new admins; ?>
<!-- start page content -->
<style>
    @media (max-width: 767px) {
  .table-responsive {
    overflow-x: scroll;
  }
}

</style>
<div class="page-content-wrapper">
    <div class="page-content mt-5">
        <div class="row">
     
            <div class="col-sm-12" style="overflow-x: scroll;">
                <div class="card-box pb-4 px-4">
                    <div class="card-head">
                        <!-- <header>Contest Prize Pool Calculations</header> -->

                    </div>
                    <!-- ================================= prize calculation ======================================= -->


                    <h4 class="text-primary fw-bold text-center display-5">All Contest Prize Pool Calculations
                    <ol class="breadcrumb pull-right" >
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin/index"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin/quizes/1/0">Quizes</a></li>
                                <li class="breadcrumb-item active">Prize Pool</li>
                            </ol>
                            </h4>
                        <div class="table-responsive" style="width:100%;">
                            <table id="example1" class="display" style="width:100%;font-size:9px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No of participants</th>
                                <th>Entry fee</th>
                                <th>Total amount collected</th>
                                <th>Expenses</th>
                                <th>Total expenses</th>
                                <th>Prize pool amount</th>
                                <th>No of winners percentage</th>
                                <th>Total no of winners</th>
                                <th>Total no of levels</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Utilized (count)</th>
                                <th>View</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($data['all_contest_prize_calculations'] as $prize_calc) { ?>
                                <tr>

                                    <td><?php echo $prize_calc->id; ?></td>
                                    <td><?php echo $prize_calc->no_of_participants; ?></td>
                                    <td><?php echo $prize_calc->entry_fee; ?></td>
                                    <td><?php echo $prize_calc->total_amount_collected; ?></td>
                                    <td><?php echo $prize_calc->expenses; ?></td>
                                    <td><?php echo $prize_calc->total_expenses; ?></td>
                                    <td><?php echo $prize_calc->prize_pool_amount; ?></td>
                                    <td><?php echo $prize_calc->no_of_winners_percentage; ?></td>
                                    <td><?php echo $prize_calc->total_no_of_winners; ?></td>
                                    <td class="">
                                        <?php echo $prize_calc->total_no_of_levels; ?>
                                    </td>
                                    <td class="">
                                        <?php echo $prize_calc->created_at; ?>
                                    </td>
                                    <td class="">
                                        <?php echo 'Admin' ?>
                                    </td>
                                    <td class="">
                                      <?php $get_contest_pool_used = $adminMod->get_contest_pool_used($prize_calc->id); 
                                      $count_of_pool_used = count($get_contest_pool_used);
                                      echo $count_of_pool_used;
                                      ?>
                                    </td>
                                    <td class="">
                                     
                                        <a  href="<?php echo URLROOT ?>/admin/contest_prize_view/<?php echo  $prize_calc->id; ?>" class="ms-4 btn btn-info btn-sm">View</a>
                                    </td>

                                    <td>
                                        <!-- <button class="btn btn-primary btn-sm">edit</button> -->
                                        <?php if($count_of_pool_used==0){ ?>
                                        <a  href="<?php echo URLROOT ?>/admin/edit_contest_pool/<?php echo  $prize_calc->id; ?>" class="ms-4 btn btn-info btn-sm">Edit</a>
<?php }else{ ?>
    <a  href="" class="ms-4 btn btn-white btn-sm" disabled><strike>Edit</strike></a>
    <?php } ?>
                                    </td>

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                    <!-- ================================== prize calculation ====================================== -->


                </div>
            </div>
        </div>
    </div>
</div>
<!-- C:\xampp\htdocs\oodlesin\app\views\admin\prize_pool_calculations.php -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script src="<?php echo URLROOT ;?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo URLROOT ;?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo URLROOT ;?>/assets/js/pages/table/table_data.js"></script>

