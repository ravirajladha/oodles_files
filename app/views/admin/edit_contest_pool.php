<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php
$contest=$data['contests'];
$levels=$data['levels'];
?>
<!-- =========================================Header End======================================================== -->
<div class="page-content-wrapper">
    <div class="page-content">

        <div class="row mt-5">
            <div class=" col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Prize Pool Calculator</header>
                        <ol class="breadcrumb pull-right" >
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin/index"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin/prize_pool_calculations">Prize pool</a></li>
                                <li class="breadcrumb-item active">Create Prize Pool</li>
                            </ol>
                    </div> 

                    <form method="POST" action="<?php echo URLROOT; ?>/admin/update_contest_pool/<?php echo $contest->id; ?>" enctype="multipart/form-data" autocomplete="OFF">

                        <div class="card-body row">
<!-- #input1m input2, input4,input6 has been made readonly by Ravi
as on getting edited , it is not showing  changes in the bottom, so the above card is a sepearete function and thhe levels is in different function. both are not linked right now. -->
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">No. of Participants</label>
                                <input type="number" name="no_of_participants" class="form-control" id="input1" placeholder="Enter No. of Participants" value="<?php echo $contest->no_of_participants; ?>" >
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Entry Fee</label>
                                <input type="number" name="entry_fee" class="form-control" id="input2" placeholder="Enter Entry Fee" step="any" value="<?php echo $contest->entry_fee; ?>"   >
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Total Amount collected</label>
                                <input type="number" name="total_amount_collected" class="form-control" id="input3" readonly value="<?php echo $contest->total_amount_collected; ?>">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Expenses in %</label>
                                <input type="number" name="expenses" class="form-control" id="input4" placeholder="Enter Expenses in %" step="any" value="<?php echo $contest->expenses; ?>"  >
                            </div>

                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Total Expenses</label>
                                <input type="number" name="total_expenses" class="form-control" id="input5" readonly value="<?php echo $contest->total_expenses; ?>">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Prize Pool Amount [ Amount to diburse as prize ]</label>
                                <input type="number" name="prize_pool_amount" class="form-control" id="input8" readonly value="<?php echo $contest->prize_pool_amount; ?>">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Number of Winners %</label>
                                <input type="number" name="no_of_winners_percentage" class="form-control" id="input6" placeholder="Enter" step="any" value="<?php echo $contest->no_of_winners_percentage; ?>" >
                            </div>

                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Total Number of Winners</label>
                                <input type="number" name="total_no_of_winners" class="form-control" id="input7" readonly value="<?php echo $contest->total_no_of_winners; ?>">
                            </div>


                            <!-- =========================================LEVELS================================================ -->

                            <div class="mt-5">
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
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
                                            <?php $count = 0; foreach($levels as $level) { ?>
                                                <tr id='multiply<?php echo $count; ?>'>
                                                    <td><label></label>
                                                        <input readonly type="number" name='level_no<?php echo $count; ?>' value="<?php echo $level->level_no; ?>" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <input type="number" name='lv_no_of_winners<?php echo $count; ?>' onkeyup="multiply(<?php echo $count; ?>)" class="form-control" value="<?php echo $level->no_of_winners; ?>"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" readonly name='lv_winners_percentage<?php echo $count; ?>' class="form-control" value="<?php echo $level->winners_percentage; ?>"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" name='lv_individual_amount<?php echo $count; ?>' onkeyup="multiply(<?php echo $count; ?>)" class="form-control" value="<?php echo $level->individual_amount; ?>"/>
                                                    </td>

                                                    <td>
                                                        <input type="number" name='lv_total_amount<?php echo $count; ?>' readonly class="form-control" value="<?php echo $level->total_amount; ?>"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" name='lv_prize_amount_percentage<?php echo $count; ?>' readonly class="form-control" value="<?php echo $level->prize_amount_percentage; ?>"/>
                                                    </td>

                                                </tr>
                                                <?php $count++; 
                                            } ?>
                                                
                                                <tr id='multiply1'></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if($contest->publish==0){ ?>

<button type="submit" class="btn btn-success" style="float: right;" id="submit">Update & Preview</button>
<?php }else{ ?>
    <button type="submit" class="btn btn-success" style="float: right;" id="submit">Update</button>
    <?php } ?>
                                <!-- <a id="add_row" class="btn btn-default pull-right">Add Row</a> -->
                                <div class="fixed-bottom" style="padding-left:255px;">

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
                                                <input type="number" id="total_no_of_levels" name="total_no_of_levels" class="form-control" readonly value="<?php echo $contest->total_no_of_levels; ?>"/>
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

                            <!-- <div class="row mb-5 mt-5">
                                <div class="col-lg-6 col-lg-6">
<?php if($contest->publish==0){ ?>

                                    <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Update & Preview</button>
                                    <?php }else{ ?>
                                        <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Update</button>
                                        <?php } ?>
                                </div>
                            </div> -->
                            <div class="row mb-5 mt-5">
                                <div class="col-lg-6 col-lg-6">
<!-- <?php if($contest->publish==0){ ?>

                                    <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Update & Preview</button>
                                    <?php }else{ ?>
                                        <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Update</button>
                                        <?php } ?> -->
                                </div>
                            </div>

                    </form>


                </div>
            </div>
        </div>

    </div>

</div>


<?php require APPROOT . '/views/inc_admin/footer.php'; ?>



<!-- ============================= SCRIPT =========================================== -->
<script>
    var multiply_count = <?php echo $count; ?>;
    // console.log(multiply_count);
    $(document).ready(function() {
        multiply(0);
  
// for(let i=0; i<4; i++){
//     multiply_count++;
    // multiply(i);
// }
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
    // multiply_count = $('#tab_logic tr').length - 1;
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

        // $('#total_no_of_levels').val(multiply_count);

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