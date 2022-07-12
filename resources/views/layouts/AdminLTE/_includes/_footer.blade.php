<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<?php
			$data = date('D');
			$mes = date('M');
			$dia = date('d');
			$ano = date('Y');

			$semana = array(
				'Sun' => 'Chủ nhật',
				'Mon' => 'Thứ hai',
				'Tue' => 'Thứ ba',
				'Wed' => 'Thứ tư',
				'Thu' => 'Thứ năm',
				'Fri' => 'Thứ 6',
				'Sat' => 'Thứ 7'
			);

			$mes_extenso = array(
				'Jan' => 'Tháng 1',
				'Feb' => 'Tháng 2',
				'Mar' => 'Tháng 3',
				'Apr' => 'Tháng 4',
				'May' => 'Tháng 5',
				'Jun' => 'Tháng 6',
				'Jul' => 'Tháng 7',
				'Aug' => 'Tháng 8',
				'Nov' => 'Tháng 9',
				'Sep' => 'Tháng 10',
				'Oct' => 'Tháng 11',
				'Dec' => 'Tháng 12'
			);
            ?>
	</div>
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">{!! \App\Models\Config::find(1)->app_name !!}</a></strong>.
</footer>

<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>
