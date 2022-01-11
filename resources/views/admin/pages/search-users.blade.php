@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Search Users</h1>
        {{ Form::open() }}
        <input type="search" placeholder="search for a contact or client">
        <button type="submit" name="submit">Search</button>
        @if(count($clients) > 1)
            @foreach($clients as $client)

                <a href="/view-client/{{ $client->id }}">
                    <p>{{ $client->name }}</p>
                </a>
            @endforeach
        @endif
        @if(count($contacts) > 1)
            @foreach($contacts as $contact)
                <a href="/view-contact/{{ $contact->id }}">
                    <p>{{ $contact->name }}</p>
                </a>
            @endforeach
        @endif
    </div>
</body>
@include('admin.layout.footer')
