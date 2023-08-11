<body ng-app="myProject">
  <style>
    .notification-dropdown {
  display: none;
  position: absolute;
  top: 30px;
  right: 0;
  padding: 10px;
  background-color: #ffffff;
  border: 1px solid #ababab;
  border-radius: 4px;
}

.bell-icon:hover .notification-dropdown {
  display: block;
}
  </style>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
    function checkOrderStatus() {
      var normalStatusIcon = $(".normal-status");
      var statusChangedIcon = $(".status-changed");
      var bellIconStatus = localStorage.getItem("bellIconStatus");

      $.ajax({
        url: "{{ route('checkOrderStatus') }}", 
        method: "GET",
        success: function(response) {
          var orderStatus = response.status;
          if (orderStatus === "changed" || bellIconStatus === "status-changed") {
            statusChangedIcon.show();
            normalStatusIcon.hide();

            var dropdownMenu = $("#nofi_dropdown");
            var message = '<a href="{{URL::to('/order')}}" class="dropdown-item">' +
            '<i class="fas fa-envelope mr-2"></i>' +
            ' Order updated! CLick to view!s ' +
            '</a>';
            dropdownMenu.html(message);
            statusChangedIcon.click(function() {
            normalStatusIcon.show();
            statusChangedIcon.hide();
            $('#nofi_dropdown').toggleClass('show');
            localStorage.setItem("bellIconStatus", "normal");
            });
            localStorage.setItem("bellIconStatus", "status-changed");

          } else {
            statusChangedIcon.hide();
            normalStatusIcon.show();
            localStorage.setItem("bellIconStatus", "normal");
          }
        },
        error: function(xhr, status, error) {
          console.log(error); 
        }
      });
    }
  
    setInterval(function() {
      checkOrderStatus();
    }, 1000);
  });
 </script>

<header>
  <div  class="offer-container">
      <div class="discount-name">Use code: HAPPYMon & <span class="discount-value"> GET 30% OFF</span></div>
  </div>
  <div class="main-header-container">
      <div class="logo-container">
          <a href="{{URL::to('/home')}}">
              <img src="{{ asset('fontend/Image/logo.png') }}" alt="logo" id="logo" height="55px" width="auto">
              <div id="logo-name"><span style="font-weight: 700">MARU</span> Dry Fruits</div>
          </a>
      </div>
      <form class="d-flex">
          <input class="px-2 search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn0" type="submit"><i class="fa-solid fa-magnifying-glass" id="search"></i></button>
      </form>
      
      <div  class="icon" style="width: 200px">
        <div  class="notificate">
          <!-- Notifications Dropdown Menu -->
          <div class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i style="display: none;" class="fa-solid fa-envelope fa-2xl normal-status" style="color: #ababab;"></i>
              <i style="display: none;"  class="fa-solid fa-envelope fa-beat-fade fa-2xl status-changed" style="color: #ebf0ef;"></i>
              <span class="badge badge-warning navbar-badge"></span>
            </a>
            <div id="nofi_dropdown" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> No message
              </a>
            </div>
          </div>
          </div>
          <div class="cart"  >
            {{-- @if($cart && $cart->items->count() > 0)

            <a href="{{ URL::to('/cart') }}"><i class="fa-solid fa-cart-shopping fa-bounce fa-2xl" style="color: #cc4214;"></i></a>
              
            @elseif(!$cart || $cart->items->count() == 0)
            <a href="{{ URL::to('/cart') }}"><i class="fa-solid fa-basket-shopping" id="cart"></i></a>
            @endif --}}
        </div>
        <div  class="user">
          @if(!$user)
            <a href="{{ URL::to('/login') }}">
              <i class="fa-solid fa-user" id="user"></i>
            </a>
          @else
            <div class="dropdown">
              <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('upload/' . $user->avatar) }}" alt="avatar" id="avatar" height="40px" width="40px">
                
              </a>
              <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ URL::to('/offers') }}">Userdetail</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ URL::to('/logout') }}"><i class="fa-solid fa-sign-out-alt"></i>LOGOUT</a></li>
              </ul>
            </div>
          @endif
        </div>
  </div>
  </div>
</header>
<nav>
  <ul class="nav-links" id="nav-bar">
      <li><a href="{{URL::to('/home')}}">HOME</a></li>
      <!-- <li><a href="#!products">PRODUCTS<i class="fa-solid fa-chevron-down"></i></a></li> -->
      <div class="pro">
        <a href="{{URL::to('/allproducts')}}">PRODUCTS<i class="fa-solid fa-chevron-down"></i></a>
        <div class="drop-content">
          <div class="link-list">
            <a href="{{ URL::to('/allproducts') }}" class="active">Products</a><br>
            {{-- @foreach($categories as $category)
                @if($category->products->count() > 0)
                    <a href="{{ URL::to('/category/' . $category->id ) }}" name="cat">{{ $category->name }}</a><br>
                @endif
            @endforeach --}}
        </div>
        </div>
        </div>
      <li><a href="{{URL::to('/order')}}">Order-History</a></li>
      <li><a href="{{URL::to('/about')}}">ABOUT</a></li>
      <li><a href="{{URL::to('/contact')}}">CONTACT</a></li>
      <li><a href="{{URL::to('/admin')}}">ADMIN</a></li>
  </ul>
</nav>

<script src="backend/js/adminlte.js"></script>
<script src="backend/js/pages/dashboard3.js"></script>
 <script src="backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- AdminLTE -->
<script src="backend/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="backend/plugins/chart.js/Chart.min.js"></script>