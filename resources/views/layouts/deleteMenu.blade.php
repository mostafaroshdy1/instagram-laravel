<div class="modal fade" id="postMenuModal-{{ $post->id }}" tabindex="-1" aria-labelledby="postsMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header d-flex justify-content-center"> 
                           <form action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="modal-title fs-2 deletePostBtn" style="color: red;">Delete</button>
                            </form>
                       
                    </div>
                    <div class="modal-footer d-flex justify-content-center"> 
                        <h1 class="modal-title fs-2 myHov" id="menuModalLabel2" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">Cancel</h1>
                    </div>
                </div>
            </div>
        </div>