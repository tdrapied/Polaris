<article class="card mb-4">
   <div class="card-body mx-4 mt-3">
       <img class="" width="426" src="{{ $post->image_url }}" alt="{{ $post->title }}">
       <h2 class="card-title mt-3">{{ $post->title }}</h2>
       <p class="card-text">{{ $post->description }}</p>
   </div>
   <div class="card-footer text-muted">
        <div class="mx-4">
            Ajoutée le {{ date('d-m-Y', strtotime($post->created_at)) }} par
            <strong>{{ $post->username }}</strong>

            @php($user = isset($_SESSION['user']) ? $_SESSION['user'] : null)

            @if ($user && ( $user->role != "" || $user->id == $post->user_id ))

               <div class="text-end float-right">
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-paragraph" viewBox="0 0 16 16">
                               <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('post_edit', [ 'id' => $post->id ]) }}">Editer</a>
                            <a class="dropdown-item" href="{{ route('post_delete', [ 'id' => $post->id ]) }}">Supprimer</a>
                        </div>
                    </div>
                </div>

            @endif

        </div>
   </div>
</article>
