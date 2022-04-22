
       
    
    <div class="d-flex align-items-center justify-content-between "> 
        
        @if (Route::has('login'))
        <div class="login-buttons-sm login-buttons mx-auto text-center d-flex justify-content-around" style="font-family: Times New Roman">
                @auth
                    
                    <form method="POST" action="/logout" class="mb-0">
                    @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            Logout
                        </button>
                    </form>
                @else
                <div class="searchBarIcon d-flex mx-3">
                    <a href="{{ route('login') }}" class=" btn btn-outline-primary text-center" >
                       Login
                    </a>
                </div>
                @endauth
            </div>
        @endif
    </div>

