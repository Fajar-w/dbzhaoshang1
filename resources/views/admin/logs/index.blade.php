@extends('admin.layouts.admin_app')
@section('title')系统配置@stop
@section('head')
    <link href="/adminlte/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminlte//plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <!--<link href="/adminlte/plugins/summernote/summernote-bs3.css" rel="stylesheet">-->
    <link href="/adminlte/dist/css/fileinput.min.css" rel="stylesheet">
    
@stop
@section('content')
    {!! $content !!}
@stop

@section('libs')


