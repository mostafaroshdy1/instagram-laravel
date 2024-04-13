<div class="btn-group ">
    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
        <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297" xml:space="preserve">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g>
                    <g>
                        <g>
                            <path
                                d="M42.352,106.148C18.999,106.148,0,125.147,0,148.5c0,23.353,18.999,42.352,42.352,42.352 c23.353,0,42.352-18.999,42.352-42.352C84.704,125.147,65.705,106.148,42.352,106.148z">
                            </path>
                            <path
                                d="M148.5,106.148c-23.353,0-42.352,18.999-42.352,42.352c0,23.353,18.999,42.352,42.352,42.352 s42.352-18.999,42.352-42.352C190.852,125.147,171.853,106.148,148.5,106.148z">
                            </path>
                            <path
                                d="M254.648,106.148c-23.353,0-42.352,18.999-42.352,42.352c0,23.353,18.999,42.352,42.352,42.352S297,171.853,297,148.5 C297,125.147,278.001,106.148,254.648,106.148z">
                            </path>
                        </g>
                    </g>
                </g>
            </g>
        </svg></button>
    <ul class="dropdown-menu dropdown-menu-end ">
        <li>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item ">Delete</button>
            </form>

            </button>
        </li>

    </ul>
</div>
