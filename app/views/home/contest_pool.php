<?php require APPROOT . "/views/inc_home/header.php"; ?>
<style>
    .portfolio__img:before {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        content: "";
        border-radius: 20px;
        background-image: -moz-linear-gradient(90deg, rgb(17, 29, 50) 0%, rgba(17, 29, 50, 0) 20%);
        background-image: -webkit-linear-gradient(90deg, rgb(17, 29, 50) 0%, rgba(17, 29, 50, 0) 20%);
        background-image: -ms-linear-gradient(90deg, rgb(17, 29, 50) 0%, rgba(17, 29, 50, 0) 20%);
        transform: scale(1, 0);
        transition: transform 500ms ease;
        transform-origin: top center;
        z-index: 1;
    }
</style>
<?php

$adminMod = new Admins; ?>

<?php $prize_pool_calculation = $data['contest_prize_calculation']; ?>
<!--Main Slider Start-->



<!--Similar Portfolio Start-->
<!-- <div class="d-flex "> -->
<!-- <div class="container text-center"> -->
<section class="similar-portfolio">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <div class="section-title-shape-1">
                    <img src="assets/images/shapes/section-title-shape-1.png" alt="">
                </div>
                <div class="section-title-shape-2">
                    <img src="assets/images/shapes/section-title-shape-2.png" alt="">
                </div>
            </div>
            <h2 class="section-title__title">PRIZE POOL <br> LEVEL WISE</h2>
        </div>
        <div class="row">
            <!--Portfolio Single Start-->
            <div class="col-xl-3 col-lg-3"></div>
            <div class="col-xl-6 col-lg-6">
            <div class="portfolio__single mx-auto">
                    <div class="portfolio__img">
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                    <th scope="col" class="ps-4">Rank</th>
                                    <th scope="col" class="text-end">Winnings</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                $count = 0;
                                $level = 0;
                                $contest_prize_data = json_decode($prize_pool_calculation->levels_data);
                               
                                ?>

                                <?php
                                $range_start = 1;
                                $range_end = 0;

                                foreach ($contest_prize_data as $prize_pool_cal) {

                                    // Check if this is the first three rows
                                    if ($prize_pool_cal->level_no <= 3) {
                                        $range_start = $range_end + 1;
                                        $range_end = $range_start;
                                        $class = 'table-danger'; // Add a different color to the first three rows
                                    } else {
                                        $range_start = $range_end + 1;
                                        $range_end = $range_start + $prize_pool_cal->no_of_winners - 1;
                                        $class = '';
                                    }
                                ?>

                                    <tr>
                                        <td class="<?php echo $class; ?> h5" style="height: 60px;"># <?php echo $range_start; ?><?php if ($range_start != $range_end) { ?> - <?php echo $range_end;
                                                                                                                    } ?></td>
                                        <td style="text-align: end; height: 50px;" class="<?php echo $class; ?> h5">Rs. <?php echo $prize_pool_cal->individual_amount; ?></td>
                                    </tr>

                                <?php
                                }
                                ?>


                                <tr>
                                    <td class="h5" style="height: 50px;">Total Prize Amount</td>

                                    <td style="text-align: end; height: 50px;" class="h5">Rs. <?php echo  $prize_pool_calculation->prize_pool_amount; ?></td>


                                </tr>
                             

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <!--Portfolio Single End-->

        </div>
    </div>
</section>
<!--Similar Portfolio End-->









<!-- filter end -->

<?php require APPROOT . "/views/inc_home/footer.php"; ?>