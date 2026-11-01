@foreach ($clients as $client)
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-33">
        <div class="client-logo-wrapper mb-3">
            <img
                class="client-logo-img"
                src="{{ url('image/show/' . $client->image_id) }}"
                alt="{{ $client->name }}"
                loading="lazy"
            >
        </div>
    </div>
@endforeach
