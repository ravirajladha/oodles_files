<?php require APPROOT . '/views/inc_admin/header.php';

$array = $data['sss'];
$array2 = $data['ids'];
// echo $no_of_participants = $array[0]['no_of_participants'];
?>


<div class="page-content-wrapper">
    <div class="page-content">

        <div class="row mt-5">
            <div class=" col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Prize Pool Calculations</header>
                    </div>

			<table class="table table-bordered table-hover" id="example4">
				<thead>
					<tr>

						<th>id</th>
						<th>no of participants</th>
						<th>entry fee</th>
						<th>total amount</th>
						<th>expenses</th>
						<th>diburse as prize</th>
						<th>prize pool amount</th>
						<th>no of winners</th>
						<th>total no of winners</th>



					</tr>
				</thead>

				<tbody>


					<?php $i = 0;
					foreach ($array as $itemm) {
					?>


						<tr class="">

							<td class="left"><?php echo $array2[$i]->id; ?></td>

							<td class="left"><?php echo $itemm['no_of_participants']  ?></td>
							<td class="left"><?php echo $itemm['entry_fee']  ?></td>
							<td class="left"><?php echo $itemm['total_amount']  ?></td>
							<td class="left"><?php echo $itemm['expenses']  ?></td>
							<td class="left"><?php echo $itemm['diburse_as_prize']  ?></td>
							<td class="left"><?php echo $itemm['prize_pool_amount']  ?></td>
							<td class="left"><?php echo $itemm['no_of_winners']  ?></td>
							<td class="left"><?php echo $itemm['total_no_of_winners']  ?></td>

						</tr>

					<?php $i++;
					}
					?>
				</tbody>
			</table>


		</div>
		</div>
	</div>
</div>

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>