@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Manage Client {{$clients->first()->client->user->name}}</h1>
        <p>Name: {{ $clients->first()->client->user->name }}</p>
        <p>E-mail address: {{ $clients->first()->client->user->email }}</p>
        <p>Address: {{ $clients->first()->client->address }}</p>
        <p>Post Code: {{ $clients->first()->client()->first()->post_code }}</p>
        <p>Contact Number: {{ $clients->first()->client->contact_number }}</p>
        <p>Last updated: {{ $clients->first()->client->updated_at }}</p>
        <a class="btn btn-primary" href="/manage-client/{{ $clients->first()->client()->first()->id }}">Manage Client</a>
        @foreach($clients as $client)
            <hr>
            <p> {{$client->contact->user->name}}</p>
            <a class="btn btn-primary" href="/view-contact/{{ $client->contact->id }}">View Contact</a>
        @endforeach
    </div>
</body>
@include('admin.layout.footer')
