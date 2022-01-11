@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div id="app">
        <view-contacts></view-contacts>
    </div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
@include('admin.layout.footer')
