<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    .form-control{
        height: 30px;
    }
    @media(max-width:640px) {
        .fixed-bottom{
            padding-left: 0 !important;
        }
    }
</style>
<!-- =========================================Header End======================================================== -->
<div class="page-content-wrapper">
    <div class="page-content">

        <div class="row mt-5">
            <div class=" col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Prize Pool Calculator



                        </header>
                        
                        <ol class="breadcrumb pull-right" >
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin/index"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin/prize_pool_calculations">Prize pool</a></li>
                                <li class="breadcrumb-item active">Create Prize Pool</li>
                            </ol>
                       <!-- <a href="<?php echo URLROOT; ?>/admin/prize_pool_calculations"> <button type="button" class="btn btn-primary" style="float:right;">View All</button></a> -->
                    </div>

                    <form method="POST" action="<?php echo URLROOT; ?>/admin/contest_pool_amount_store" enctype="multipart/form-data" autocomplete="OFF">

                        <div class="card-body row">

                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">No. of Participants</label>
                                <input type="number" name="no_of_participants" class="form-control" id="input1" placeholder="Enter No. of Participants">
                            </div>
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">Entry Fee</label>
                                <input type="number" name="entry_fee" class="form-control" id="input2" placeholder="Enter Entry Fee" step="any">
                            </div>
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">Total Amount collected</label>
                                <input type="number" name="total_amount_collected" class="form-control" id="input3" readonly>
                            </div>
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">Expenses in %</label>
                                <input type="number" name="expenses" class="form-control" id="input4" placeholder="Enter Expenses in %" step="any">
                            </div>

                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">Total Expenses</label>
                                <input type="number" name="total_expenses" class="form-control" id="input5" readonly>
                            </div>
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">Prize Pool Amount [ Amount to disburse as prize ]</label>
                                <input type="number" name="prize_pool_amount" class="form-control" id="input8" readonly>
                            </div>
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">Number of Winners %</label>
                                <input type="number" name="no_of_winners_percentage" class="form-control" id="input6" placeholder="Enter" step="any">
                            </div>

                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="" class="form-label">Total Number of Winners</label>
                                <input type="number" name="total_no_of_winners" class="form-control" id="input7" readonly>
                            </div>


                            <!-- =========================================LEVELS================================================ -->

                            <div class="mt-5">
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        Levels
                                                    </th>

                                                    <th class="text-center">
                                                        No of Winners
                                                    </th>
                                                    <th class="text-center">
                                                        Winners %
                                                    </th>
                                                    <th class="text-center">
                                                        Individual Amount
                                                    </th>
                                                    <th class="text-center">
                                                        Total Amount
                                                    </th>
                                                    <th class="text-center">
                                                        Prize Amount %
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id='multiply0'>
                                                    <td>
                                                        <input readonly type="number" name='level_no0' value="1" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <input type="number" name='lv_no_of_winners0' onkeyup="multiply(0)" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <input type="number" readonly name='lv_winners_percentage0' class="form-control" />
                                                    </td>
                                                    <td>
                                                        <input type="number" name='lv_individual_amount0' onkeyup="multiply(0)" class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="number" name='lv_total_amount0' readonly class="form-control" />
                                                    </td>
                                                    <td>
                                                        <input type="number" name='lv_prize_amount_percentage0' readonly class="form-control" />
                                                    </td>

                                                </tr>
                                                <tr id='multiply1'></tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="float: left;" id="submit">Submit & Preview</button>  <a id="add_row" class="btn btn-default pull-right">Add Row</a>
                                <div class="fixed-bottom" style="padding-left:255px;">
                                <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="tab_logic" style="margin-top:50px">
                                    <thead>
                                        <tr style="background-color:#6673fc;color:white;">
                                            <th class="text-center">
                                                Totals
                                            </th>
                                            <th class="text-center">Total / Used</th>
                                            <th class="text-center">Total Winners %</th>
                                            <th class="text-center">Total Individual Amount</th>
                                            <th class="text-center">Total / Used Amount</th>
                                            <th class="text-center">Total Prize Amount %</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id='multiply0'>
                                            <!-- <td>
                                                Totals
                                            </td> -->
                                            <td>
                                                <input type="number" id="total_no_of_levels" name="total_no_of_levels" class="form-control" readonly />
                                            </td>
                                            <td>
                                                <input type="number" id="lv_no_of_winners_total" class="form-control text-success" readonly />
                                                <input type="text" id="lv_no_of_winners_remain" class="form-control text-danger" readonly />
                                            </td>
                                            <td>
                                                <input type="number" id="lv_winners_percentage_total" class="form-control" readonly />
                                            </td>
                                            <td>
                                                <input type="number" id="lv_individual_amount_total" class="form-control" readonly />
                                            </td>
                                            <td>
                                                <input type="number" id="lv_total_amount_total" class="form-control text-success" readonly />
                                                <input type="number" id="lv_total_amount_remain" class="form-control text-danger" readonly />
                                            </td>
                                            <td>
                                                <input type="number" id='lv_prize_amount_percentage_total' readonly class="form-control" />
                                            </td>
                                        </tr>
                                        <tr id='multiply1'></tr>
                                    </tbody>
                                </table>
                                </div>
</div>
                            </div>

                            <div class="row mb-5 mt-5">
                                <div class="col-lg-6 col-lg-6">
                                    <!-- <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Add Pool Prize</button> -->
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                    </form>


                </div>
            </div>
        </div>

    </div>

</div>



<?php require APPROOT . '/views/inc_admin/footer.php'; ?>



<!-- ============================= SCRIPT =========================================== -->
<script>
    var multiply_count = 1;
    $(document).ready(function() {
        var i = 1;
        var l = 2;
        $("#add_row").click(function() {
            $('#multiply' + i).html("<td><input readonly name='level_no" + i + "' type='number' value='" + l + "' class='form-control input-md'</td><td><input name='lv_no_of_winners" + i + "' type='number' onkeyup='multiply(" + i + ")' class='form-control input-md'></td><td><input readonly name='lv_winners_percentage" + i + "' type='number' class='form-control input-md' /> </td><td><input name='lv_individual_amount" + i + "' onkeyup='multiply(" + i + ")' type='number'  class='form-control input-md'></td><td><input readonly name='lv_total_amount" + i + "' type='number'  class='form-control input-md'></td><td><input readonly name='lv_prize_amount_percentage" + i + "' type='number' class='form-control input-md' /> </td>");

            $('#tab_logic').append('<tr id="multiply' + (i + 1) + '"></tr>');
            i++;
            l++;
            multiply_count++;
        });


    });

    $("#input1, #input2, #input3, #input4, #input5, #input6").on("input", function() {
  calculate2();
  multiply();
});

    function calculate2() {
        var no_of_participants = $("#input1").val();
        var entry_fee = $("#input2").val() || 0;

        var total_amount_collected = no_of_participants * entry_fee;
        $("#input3").val(total_amount_collected);

        var expenses = $("#input4").val() || 0;

        var total_expenses = ((expenses * total_amount_collected) / 100);
        $("#input5").val(total_expenses);

        $("#input8").val(total_amount_collected - total_expenses);

        var no_of_winners_percentage = $("#input6").val() || 0;

        var total_no_of_winners = ((no_of_winners_percentage / 100) * no_of_participants);
        $("#input7").val(parseInt(total_no_of_winners));
    }


    function multiply(id) {


        var lv_no_of_winners = $("input[name=lv_no_of_winners" + id + "]").val();
        var total_no_of_winners = $("input[name=total_no_of_winners]").val();

        var lv_winners_percentage = ((lv_no_of_winners / total_no_of_winners) * 100);
        $("input[name=lv_winners_percentage" + id + "]").val(lv_winners_percentage); // 02

        var lv_individual_amount = $("input[name=lv_individual_amount" + id + "]").val();
        var lv_total_amount = (lv_individual_amount * lv_no_of_winners);
        $("input[name=lv_total_amount" + id + "]").val(lv_total_amount); // 04

        var prize_pool_amount = $("input[name=prize_pool_amount]").val();
        var lv_prize_amount_percentage = ((lv_total_amount / prize_pool_amount) * 100);
        $("input[name=lv_prize_amount_percentage" + id + "]").val(lv_prize_amount_percentage); // 05


        var lv_winners_percentage_total = 0;
        var lv_no_of_winners_total = 0;
        var lv_individual_amount_total = 0;
        var lv_total_amount_total = 0;
        var lv_prize_amount_percentage_total = 0;

        for (var i = 0; i < multiply_count; i++) {

            lv_no_of_winners_total = lv_no_of_winners_total + Number($("input[name=lv_no_of_winners" + i + "]").val());
            lv_winners_percentage_total = lv_winners_percentage_total + Number($("input[name=lv_winners_percentage" + i + "]").val());
            lv_individual_amount_total = lv_individual_amount_total + Number($("input[name=lv_individual_amount" + i + "]").val());
            lv_total_amount_total = lv_total_amount_total + Number($("input[name=lv_total_amount" + i + "]").val());
            lv_prize_amount_percentage_total = lv_prize_amount_percentage_total + Number($("input[name=lv_prize_amount_percentage" + i + "]").val());
        }
        var lv_no_of_winners_remain = (total_no_of_winners - lv_no_of_winners_total);
        var lv_total_amount_remain = (prize_pool_amount - lv_total_amount_total);

        $('#total_no_of_levels').val(multiply_count);

        $('#lv_no_of_winners_total').val(lv_no_of_winners_total);
        $('#lv_no_of_winners_remain').val(lv_no_of_winners_remain);

        $('#lv_winners_percentage_total').val(lv_winners_percentage_total);

        $('#lv_individual_amount_total').val(lv_individual_amount_total);

        $('#lv_total_amount_total').val(lv_total_amount_total);
        $('#lv_total_amount_remain').val(lv_total_amount_remain);

        $('#lv_prize_amount_percentage_total').val(lv_prize_amount_percentage_total);


    }
</script>
<!-- // if (lv_no_of_winners == 1) {
        //     $("input[name=lv_ranks" + id + "]").val(lv_no_of_winners);// 06
        // } else {
        //    lv_no_of_winners = "1 - " + lv_no_of_winners;
        //     $("input[name=lv_ranks" + id + "]").val(lv_no_of_winners);// 06
        // } -->
<!-- ============================= SCRIPT =========================================== -->
<script>
 
window.addEventListener('keydown', function(e) {
    if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
}, true);
</script>

