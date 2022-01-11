@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Manage Client {{$clients->first()->client()->first()->user()->first()->name}}</h1>
        <p>Name: {{ $clients->first()->client()->first()->user()->first()->name }}</p>
        <p>E-mail address: {{ $clients->first()->client()->first()->user()->first()->email }}</p>
        <p>Address: {{ $clients->first()->client()->first()->address }}</p>
        <p>Post Code: {{ $clients->first()->client()->first()->post_code }}</p>
        <p>Contact Number: {{ $clients->first()->client()->first()->contact_number }}</p>
        <p>Last updated: {{ $clients->first()->client()->first()->updated_at }}</p>
        <a href="/manage-client/{{ $clients->first()->client()->first()->id }}"><button>Manage Client</button></a>
        @foreach($clients as $client)
            <hr>
            <p> {{$client->contact()->first()->user()->first()->name}}</p>
            <a href="/view-contact/{{ $client->contact()->first()->id }}"><button>View Contact</button></a>
        @endforeach
    </div>
</body>
@include('admin.layout.footer')
