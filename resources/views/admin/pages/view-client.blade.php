@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div id="app">
        <view-clients></view-clients>
    </div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
@include('admin.layout.footer')
