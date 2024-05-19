

    <div class="clients-area bg-theme default-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="clients-items owl-carousel owl-theme text-center">
               
              @foreach($clients as $client)
            <div class="single-item">
                @if (isset($client->media))
                 @foreach ($client->media as $media)
                     
                 <a href="#"
                   ><img src="{{ getImage($media->path) }}" alt="Clients"
                 /></a>
                 @endforeach
                    
                @endif
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>