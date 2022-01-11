<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <link href="{{ mix('/css/my-styles.css') }}" rel="stylesheet"/>
    @component('general.layout.title')
        {{ $page_title }}
    @endcomponent
</head>
<body>
    <nav>
        <div class="header">
            <h1>Fictitious Limited</h1>
            <img src="/images/fict.JPG" alt="logo" height="100px">
        </div>
    </nav>
