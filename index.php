<?php

//遍历目录函数，只读取最外层
function readDirectory($path) {
	$handle = opendir($path);
	$arr = array();
	while (($item = readdir($handle)) != false) {
		if ($item != '.' && $item != ".." && $item != ".git") {
			if (is_dir($path.'/'.$item)) {
				$arr['dir'][] = $item;
			}
		}
	}
	closedir($handle);
	return $arr;
}

$path='.';

$info = readDirectory($path);



date_default_timezone_set('PRC');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<title>书籍列表</title>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
<script type="text/javascript">		
$(document).ready( function () {
	$('#table_gitbooks').DataTable( {		
		"language": {
			"info": "第_PAGE_页, 共_PAGES_页",
			"infoEmpty": "第0页, 共0页",
			"zeroRecords": "搜索不到信息",
			"emptyTable": "没有任何书籍",
			"search": "搜索: ",
			"lengthMenu": "每页 _MENU_ 条",
			"paginate": {"first":"首页", "last":"末页", "next":"下一页", "previous":"上一页"} 
		},
	});
} );
</script>
</head>
<body>


<div id="main">
<h1>书籍列表</h1>
<table id="table_gitbooks" class="display" style="text-align:center;">
<thead>
<tr>
	<th>编号</th>
	<th>书名</th>
	<th>时间</th>
</tr>
</thead>
<tbody>
<?php
	if ($info != NULL && $info['dir']) {
		$i = 1;
		foreach ($info['dir'] as $val) {
			$fullpath = $path.'/'.$val;
			$url = $val.'/_book';
?>

<tr>
	<td><?php echo $i; ?></td>
	<td><a href="<?php echo $url; ?>"><?php echo $val; ?></a></td>
	<td><?php echo date('Y-m-d H:i:s', filemtime($fullpath)); ?></td>
</tr>
	<?php 
	 $i++;
		}
	}
	?>
</tbody>
</table>
</div>
</body>
