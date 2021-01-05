<article class="card mb-4">
   <div class="card-body mx-4 mt-3">
       <img class="" width="426" src="{{ $post->image_url }}" alt="{{ $post->title }}">


       <h2 class="card-title mt-3">{{ $post->title }}</h2>
       <p class="card-text">{{ $post->description }}</p>
   </div>
   
   <div class="card-footer text-muted">
    <a class="btn btn-outline-secondary float-right" href="{{ url('delete', $post->id) }}" role="button">
        Supprimer
    </a>
    <a class="btn btn-outline-secondary float-right" href="{{ url('deactivate', $post->id) }}" role="button">
        Dépublier
    </a>
    <a class="btn btn-outline-secondary float-right" href="{{ url('activate', $post->id) }}" role="button">
        Publier
    </a>
    <a class="btn btn-outline-secondary float-right" href="{{ url('edit', $post->id) }}" role="button">
        Edit Post
    </a>
       <div class="mx-4">
           Posted on January 1, 2020 by

           <a href="#">Start Bootstrap</a>
           
       </div>
   </div>
</article>
