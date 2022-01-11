@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Search Users</h1>
        {{ Form::open() }}
        <div class="form-group">
            <input class="form-control" type="search" placeholder="search for a contact or client">
        </div>
        <p></p>
        <button class="btn btn-primary" type="submit" name="submit">Search</button>
        <p></p>
        <div class="search">
            @if(count($clients) > 1)
                @foreach($clients as $client)
                    <p>{{ $client->name }}</p>
                    <a class="btn btn-primary" href="/view-client/{{ $client->id }}">View Client</a>
                    <a class="btn btn-primary" href="/manage-client/{{ $client->id }}">Manage Client</a>
                    <hr>
                @endforeach
            @endif
            @if(count($contacts) > 1)
                @foreach($contacts as $contact)
                    <p>{{ $contact->name }}</p>
                    <a class="btn btn-primary" href="/view-contact/{{ $contact->id }}">View Contact</a>
                    <a class="btn btn-primary" href="/manage-contact/{{ $contact->id }}">Manage Contact</a>
                    <hr>
                @endforeach
            @endif
        </div>
    </div>
</body>
@include('admin.layout.footer')
