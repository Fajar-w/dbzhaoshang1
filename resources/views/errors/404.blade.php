@extends('pc.frontend')
@section('headlibs')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>未找到页面-招商创业网</title>
    <meta name="keywords" content="未找到页面">
	<meta name="description" content="招商创业网'未找到页面'">
@stop
@section('main_content')
   
</head>

	<section class="container">

		<div class="f404">
			<img src="http://www.imnotdoubi.test/wp-content/themes/cycms/img/404.png">
			<h1>404 . Not Found</h1>
			<h2>沒有找到你要的内容！</h2>
			<p>
				<a class="btn btn-primary" href="http://www.imnotdoubi.test">返回招商创业网首页</a>
			</p>
		</div>
	
	</section>

		<style type="text/css">
		.btn-primary {
    background-color: #45b6f7;
    border-color: #45b6f7;
}
.btn {
    border-radius: 2px;
    padding: 6px 15px;
}
		.container {
    position: relative;
    margin: 0 auto;
    max-width: 1200px;
    padding: 0;
}
	.f404 {
    text-align: center;
    margin: 100px 0;
    }	
.f404 h1 {
    font-size: 60px;
    margin: 40px 0 20px;
    }
    .f404 h2 {
    font-size: 16px;
    margin-bottom: 20px;
}
</style>
@stop