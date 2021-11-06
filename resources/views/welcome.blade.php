<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Task - Course Listing</title>
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/ps-icon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  </head>
  <body class="ps-loading">
    <div class="header--sidebar"></div>
  
    <main class="ps-main">
        <div class="ps-products-wrap pt-80 pb-80">
          <div class="ps-products" data-mh="product-listing">
              <div class="ps-product-action">
                  <div class="ps-product__filter">
                      <form class="ps-search--header">
                          <input name="search" class="form-control" type="text" placeholder="Search Product…">
                          <button type="button" id="search_submit"><i class="ps-icon-search"></i></button>
                      </form>
                  </div>
              
              </div>
              <div class="ps-product__columns">
                  @foreach ($courses as $course)
                    <div class="ps-product__column">
                        <div class="ps-shoe mb-30">
                          <div class="ps-shoe__thumbnail">
                            <div class="ps-badge"><span>{{$course->category->name}} </span></div>
                            <img src="{{asset('assets')}}/images/1.jpg" alt=""><a class="ps-shoe__overlay" href="#"></a>
                          </div>
                          <div class="ps-shoe__content">
                            <div class="ps-shoe__variants">
                                <div class="br-wrapper br-theme-fontawesome-stars">
                                    <p>Level : {{$course->levels}}</p>
                                    <p>Hours : {{$course->hours}}</p>
                                    <p>rating : {{$course->rating}}</p>
                                  </div>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">{{$course->name}}</a>
                                  <p>{{$course->description}}</p>
                            </div>
                          </div>
                        </div>
                    </div>
                  @endforeach
              </div>
          </div>
          <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--category">
              <div class="ps-widget__header">
                <h3>Category</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--checked">
                  @foreach ($categories as $category)
                  <li><input class="filter" name="category" type="checkbox" onclick="return myFun(this,'category')" value="{{$category->id}}"> {{$category->name}}</li>
                  @endforeach
                </ul>
              </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
              <div class="ps-widget__header">
                <h3>Course Rating</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--checked">
                  <li><input class="filter" name="rating" type="checkbox" onclick="return myFun(this,'rating')" value="1"> 1 </li>
                  <li><input class="filter" name="rating" type="checkbox" onclick="return myFun(this,'rating')" value="2"> 2</li>
                  <li><input class="filter" name="rating" type="checkbox" onclick="return myFun(this,'rating')" value="3"> 3</li>
                  <li><input class="filter" name="rating" type="checkbox" onclick="return myFun(this,'rating')" value="4"> 4</li>
                  <li><input class="filter" name="rating" type="checkbox" onclick="return myFun(this,'rating')" value="5"> 5</li>
                </ul>
              </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
              <div class="ps-widget__header">
                <h3>Level</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--checked">
                @foreach ($levels as $level)
                  <li><input class="filter" name="levels" type="checkbox" onclick="return myFun(this,'levels')" value="{{$level}}"> {{$level}}</li>
                @endforeach
                </ul>
              </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
              <div class="ps-widget__header">
                <h3>Time</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--checked">
                  <li><input  class="filter" name="hours" type="checkbox" onclick="return myFun(this,'hours')" value="1"> Less Than 4</li>
                  <li><input  class="filter" name="hours" type="checkbox" onclick="return myFun(this,'hours')" value="2"> Less Than 8</li>
                  <li><input  class="filter" name="hours" type="checkbox" onclick="return myFun(this,'hours')" value="3"> More Than 8</li>
                </ul>
              </div>
            </aside>
           
          </div>
        </div>
    </main>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.filter').on('change',function(){
          $.blockUI();
          applyFilter();
        });
        $('#search_submit').on('click',function(){
          $.blockUI();
          applyFilter();
        });
        function applyFilter()
        {
          data = getFilterData();
          $.ajax({
            type: "GET",
            url: "{{route('filter')}}",
            data: data,
            success: function(data){
              $.unblockUI();
              updateView(data);

            }
          });
        }
        function getFilterData()
        {
          return {
            search      : $('input[name="search"]').val(),
            category_id : $('input[name="category"]:checked').val(), 
            levels      : $('input[name="levels"]:checked').val(),
            rating      : $('input[name="rating"]:checked').val(), 
            hours       : $('input[name="hours"]:checked').val(),
            _token      : "{{csrf_token()}}"
          }
        }
        function updateView(data)
        {
          newData ="";
          $('.ps-product__columns').html(""); 
          for(var i=0; i< data.length;i++)
          {
            newData += '<div class="ps-product__column"> <div class="ps-shoe mb-30"> <div class="ps-shoe__thumbnail"> <div class="ps-badge"><span>'+data[i]['category']['name']+' </span></div><img src="{{asset("assets")}}/images/1.jpg" alt=""><a class="ps-shoe__overlay" href="#"></a></div><div class="ps-shoe__content"><div class="ps-shoe__variants"><div class="br-wrapper br-theme-fontawesome-stars">';
            newData += '<p>Level : '+data[i]['levels']+'</p><p>Hours : '+data[i]['hours']+'</p><p>rating : '+data[i]['rating']+'</p>'
            newData += '</div></div><div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">'+data[i]['name']+'</a><p>'+data[i]['description']+'</p></div></div></div></div>';
          }
          $('.ps-product__columns').html(newData);
        }
    </script>
    <script>
      function myFun(checkbox,name) {
        var checkboxes = document.getElementsByName(name)
        checkboxes.forEach((item) => {
          if (item !== checkbox) item.checked =  false
        });
      }
    </script>
  </body>
</html>